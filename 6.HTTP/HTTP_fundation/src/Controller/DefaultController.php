<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/fileuploadhandler", name="fileuploadhandler")
     */
    public function fileUploadHandler(Request $request) {
        $output = [
            'uploaded' => false
        ];
        $file = $request->files->get('file');
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
        $uploadDir = $this->getParameter('images_directory');
        if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
            mkdir($uploadDir, 077, true);
        }
        if ($file->move($uploadDir, $fileName)) {
            $output = [
                'uploaded' => true,
                'fileName' => $fileName,
                'originalFileName' => $file->getClientOriginalName()
            ];
        };

        return new JsonResponse($output);
    }

    /**
     * @Route("/deletefileresource", name="deleteFileResource")
     */
    public function deleteResource(Request $request){
        $output = [
            'deleted' => false,
            'error' => false
        ];
        $fileName = $request->get('fileName');
        if ($fileName) {
            $output['deleted'] = unlink($this->getParameter('images_directory') . $fileName);
        } else {
            $output['error'] = 'Missing/Incorrect FileName';
        }
        return new JsonResponse($output);
    }

}
