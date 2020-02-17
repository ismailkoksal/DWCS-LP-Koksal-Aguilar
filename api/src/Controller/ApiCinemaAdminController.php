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
use Symfony\Component\Validator\Validator\ValidatorInterface;
use FOS\RestBundle\View\View;

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
     * @Rest\View()
     * @Rest\Post("/api/cinemas")
     */
    public function addCinema(Request $request, SerializerInterface $serializer, ValidatorInterface $validator) 
    {
        $data = $request->getContent();
        $cinema = $serializer->deserialize($data, Cinema::class, 'json');

        $errors = $validator->validate($cinema);
        if (count($errors))
            return View::create($errors, Response::HTTP_BAD_REQUEST);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cinema);
        $entityManager->flush();
        return View::create(["message" => "Cinema created"], Response::HTTP_CREATED);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/cinemas/{id}")
     */
    public function getCinema(int $id, AnnuaireDeCinemas $annuaire) {
        $cinema = $annuaire->obtenirCinemaParId($id);
        return $cinema;
    }

    /**
     * @Rest\View()
     * @Rest\Delete("/api/cinemas/{id}")
     */
    public function deleteCinema(int $id, AnnuaireDeCinemas $annuaire)
    {
        if ($annuaire->supprimerCinemaParId($id)) {
            return View::create(["messafe" => "Cinema deleted"], Response::HTTP_OK);
        }
        return View::create(["message" => "Cinema with id ".$id." doesn't exist"], Response::HTTP_BAD_REQUEST);
    }
}
