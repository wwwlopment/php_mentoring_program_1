<?php

namespace App\Controller;

use App\Entity\AnalizedText;
use App\models\ExportData;
use App\models\Text;
use App\Services\Import\ExportFactory;
use App\Services\Import\ImportFactory;
use App\Services\Statistic\GlobalStaistic;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {

    protected $text;
    protected $session;
    protected $entityManager;
    protected $lastResults;

    public function __construct(ManagerRegistry $doctrine) {
        $this->session = new Session();
        if ($this->session->has('text')) {
            $this->text = $this->session->get('text');
        }
        $this->entityManager = $doctrine->getManager();
        $this->getCurrentSessionResults();
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request) {
        $inputSelected = null;
        if($request->get('calculated-text')) {
            $this->getStoredResult($request->get('calculated-text'));
            $inputSelected = 'text';
        } else {
            if($request->get('url')) {
                $text = (new ImportFactory())->getFactory('url')->setPath($request->get('url'))->getText();
                $this->getStoredResult($text);
                $inputSelected = 'url';
            } elseif ($request->files->get('file-to-upload')) {
                $file = $request->files->get('file-to-upload');
                $text = (new ImportFactory())->getFactory($file->getClientOriginalExtension())->setPath($file->getPathName())->getText();
                $this->getStoredResult($text);
                $inputSelected = 'file';
            }
        }
        if ($this->text) {
            $this->session->set('text', $this->text);
        }

        return $this->render('pages/main.html.twig', [
            'text' => $this->text,
            'lastResults' => !empty($this->lastResults),
            'input_selected' => $inputSelected,
        ]);
    }

    /**
     * @Route("/last-results/{id}", name="last_results")
     */
    public function lastResults(int $id = null)
    {
        if (empty($this->lastResults)){
            return $this->redirectToRoute('index');
        }
        if (!empty($id)) {
            $filteredResult = array_filter($this->lastResults, function ($item) use ($id){
                return $id === $item->getId();
            });
        }
        $currentResult = !empty($filteredResult) ? array_values($filteredResult)[0] : $this->lastResults[0];

        return $this->render('pages/lastResults.html.twig', [
            'text' => $currentResult->getResult(),
            'lastResults' => $this->lastResults,
            'currentResult' => $currentResult,
        ]);
    }

    /**
     * @Route("/export-file", name="export_file")
     */
    public function exportFile(Request $request) {
        if($request->get('type')) {
            $exportData = (new ExportData($this->text))->get();
            $content = (new ExportFactory())->getFactory($request->get('type'))->export($exportData);
            $response = new Response($content, Response::HTTP_OK);
            $response->headers->set('Content-Encoding', 'UTF-8');
            $response->headers->set('Content-Type', 'text/'.$request->get('type').'; charset=UTF-8');
            $filename = 'export.' . $request->get('type');
            $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
            return $response;
        }
        return new JsonResponse('Bad request', 400);
    }

    /**
     * @Route("/global-statistic", name="global_statistic")
     */
    public function globalStatistic()
    {
        $statistic = new GlobalStaistic($this->text, $this->entityManager);
        return $this->render('pages/globalStatistic.html.twig', [
            'statistic' => $statistic->get(),
        ]);
    }

    protected function storeResult() {
        $analizedText = new AnalizedText();
        $analizedText->setHash($this->text->getHash());
        $analizedText->setSessionId($this->session->getId());
        $analizedText->setResult($this->text);
        $analizedText->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('+0300')));

        $this->entityManager->persist($analizedText);
        $this->entityManager->flush();
    }

    protected function getStoredResult($text) {
        $hash = Text::makeHash($text);
        $storedResult = $this->entityManager
            ->getRepository(AnalizedText::class)
            ->findOneBy(['hash' => $hash]);

        if ($storedResult) {
            $this->text = $storedResult->getResult();
        } else {
            $this->text = new Text($text);
            $this->storeResult();
        }
        (new GlobalStaistic($this->text, $this->entityManager))->store();

    }

    protected function getCurrentSessionResults() {
        $this->lastResults = $this->entityManager
            ->getRepository(AnalizedText::class)
            ->findBy(['session_id' => $this->session->getId()], ['created_at' => 'DESC'], 10);
    }
}