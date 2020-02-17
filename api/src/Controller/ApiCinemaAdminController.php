<?php

namespace App\Controller;

use App\Entity\Cinema;
use App\Domain\AnnuaireDeCinemas;
use App\Domain\Query\ListeCinemasHandler;
use App\Domain\Query\ListeCinemasQuery;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCinemaAdminController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/cinemas", name="api_cinemas")
     */
    public function listeCinemas(ListeCinemasHandler $handler) {
        $query = new ListeCinemasQuery();
        $listeCinemas = $handler->handle($query);
        return $listeCinemas;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/api/cinemas")
     */
    public function addCinema(Request $request, SerializerInterface $serializer) 
    {
        $data = $request->getContent();
        $cinema = $serializer->deserialize($data, Cinema::class, 'json');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cinema);
        $entityManager->flush();
        return $cinema;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/cinemas/{id}")
     */
    public function getCinema(int $id, AnnuaireDeCinemas $annuaire) {
        $cinema = $annuaire->obtenirCinemaParId($id);
        return $cinema;
    }
}
