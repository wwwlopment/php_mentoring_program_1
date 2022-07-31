<?php
namespace App\Controller;

use App\Factory\CatsFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 */
class HomeController extends AbstractController {

    const STORE_SETTINGS_KEY = 'settings';

    /**
     * @var
     */
    protected $repository;
    /**
     * @var
     */
    protected $cachePool;
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var array
     */
    private $config = [
        'online' => true,
        'caching' => false,
        'logging' => false,
    ];

    public function __construct() {
        $this->session = new Session();
        $this->restoreConfig();
        $this->getData();
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $photos = $this->repository->getByParameters();
        return $this->render('home/index.html.twig', [
            'photos' => $photos,
            'nextPage' => $this->repository->getNextPageNumber(),
            'settings' => $this->config,
        ]);
    }

    /**
     * @Route("load_more", name="loadMore")
     */
    public function loadMoreAction(Request $request) {
        $photos = $this->repository->page($request->query->get('page'))->getByParameters();

        return $this->render('home/photo_list.html.twig', [
            'photos' => $photos,
            'nextPage' => $this->repository->getNextPageNumber(),
        ]);
    }

    /**
     * @Route("settings_update", name="settingsUpdate")
     */
    public function settingsUpdateAction(Request $request) {
        $param = $request->request->get('data');
        $this->config[$param['id']] = $param['val'] === 'true';
        $this->storeConfig();
        return $this->json(['success' => true]);
    }

    /**
     * @return void
     */
    private function restoreConfig() {
        if ($this->session->has(self::STORE_SETTINGS_KEY)) {
            $this->config = $this->session->get(self::STORE_SETTINGS_KEY);
        }
    }

    /**
     * @return void
     */
    private function storeConfig() {
        $this->session->set(self::STORE_SETTINGS_KEY, $this->config);
        $this->getData();

    }

    /**
     * @return void
     */
    private function getData() {
        $this->repository = CatsFactory::build($this->config);
    }


}