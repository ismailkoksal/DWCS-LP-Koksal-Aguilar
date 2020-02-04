<?php

namespace App\Controller;

use App\Entity\Cinema;
use App\Domain\Query\ListeCinemasHandler;
use App\Domain\Query\ListeCinemasQuery;
use App\Domain\Query\ProgrammationCinemaHandler;
use App\Domain\Query\ProgrammationCinemaQuery;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCinemaAdminController extends AbstractController
{
    /**
     * @Route("/api/cinema/admin", name="api_cinema_admin")
     */
    public function index()
    {
        return $this->render('api_cinema_admin/index.html.twig', [
            'controller_name' => 'ApiCinemaAdminController',
        ]);
    }

    /**
     * @Route("/api/cinemas", name="api_cinemas", methods={"GET"})
     */
    public function listeCinemas(ListeCinemasHandler $handler, SerializerInterface $serializer) {
        $query = new ListeCinemasQuery();
        $listeCinemas = $handler->handle($query);

        $listeCinemasJson = $serializer->serialize($listeCinemas, 'json');

        $view = View::create($listeCinemasJson);
        $view->setFormat('json');

        return $view;
    }

    /**
     * @Route("/api/cinemas/{cinema}", name="api_detail_cinema", methods={"GET"})
     */
    public function detailCinema(
        Cinema $cinema,
        ProgrammationCinemaHandler $programmationCinemaHandler,
        SerializerInterface $serializer
    ) {
        $programmeQuery = new ProgrammationCinemaQuery($cinema);
        $filmsAAffiche = $programmationCinemaHandler->handle($programmeQuery);

        $filmsAAfficheJson = $serializer->serialize($filmsAAffiche, 'json');

        return new JsonResponse($filmsAAfficheJson, 200, [], true);
    }

    /**
     * @Route("/api/cinemas", name="api_add_cinema", methods={"POST"})
    */
    public function addCinema(Request $request, SerializerInterface $serializer) {
        $data = $request->getContent();
        $cinema = $serializer->deserialize($data, Cinema::class, 'json');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cinema);
        $entityManager->flush();

        return new JsonResponse('', Response::HTTP_CREATED, [], true);
    }

    /**
     * @Route("/api/cinemas/{cinema}", name="api_update_cinema", methods={"PUT"})
     */
    public function updateCinema(
        Cinema $cinema,
        Request $request,
        SerializerInterface $serializer
    ) {
        $data = $request->getContent();
        $serializer->deserialize($data, Cinema::class, 'json', ['object_to_populate'=>$cinema]);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cinema);
        $entityManager->flush();

        return new JsonResponse('', Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/api/cinemas/{cinema}", name="api_delete_cinema", methods={"DELETE"})
     */
    public function deleteCinema(Cinema $cinema, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($cinema);
        $entityManager->flush();

        return new JsonResponse('', Response::HTTP_OK, [], true);
    }
}
