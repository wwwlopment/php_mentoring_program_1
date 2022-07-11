<?php

namespace App\Controller;

use App\Components\Paginator;
use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{

    /** @var ClientRepository $clientRepository */
    private $clientRepository;
    private $em;

    public function __construct(ClientRepository $clientRepository, ManagerRegistry $doctrine)
    {
        $this->clientRepository = $clientRepository;
        $this->em = $doctrine->getManager();
    }

    /**
     * @Route("/clients", name="app_clients")
     */
    public function index(Request $request, Paginator $paginator): Response
    {

       $paginator->setCurrentPage($request->query->get('page', 1))
       ->setRepository($this->clientRepository)->setLimit(3)->paginate();

        return $this->render('clients/index.html.twig', [
            'paginator' => $paginator,
        ]);
    }

    /**
     * @Route("/clients/{id}", name="clients_show")
     */
    public function show(Client $client, Request $request)
    {
        $client = $this->clientRepository->findOneBy(['id' => $request->get('id')]);
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        $form->remove('save');

        return $this->render('clients/show.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/client/new", name="new_client")
     */
    public function addClient(Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($client);
            $this->em->flush();

            return $this->redirectToRoute('app_clients');
        }
        return $this->render('clients/new.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/clients/{id}/edit", name="clients_edit")
     */
    public function editClient(Client $client, Request $request)
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('clients_show', [
                'id' => $client->getId(),
            ]);
        }

        return $this->render('clients/edit.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/clients/{id}/delete", name="clients_delete")
     */
    public function deleteClient(Client $client)
    {
        $this->em->remove($client);
        $this->em->flush();

        return $this->redirectToRoute('app_clients');
    }

    /**
     * @Route("/search", name="clients_search")
     */
    public function searchClient(Request $request)
    {
            $query = $request->query->get('q');
        $clients = $this->clientRepository->searchByQuery($query);

        return $this->render('clients/search.html.twig', [
            'clients' => $clients
        ]);

    }
}
