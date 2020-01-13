<?php


namespace App\Controller;


use App\Domain\Query\ListeCinemasHandler;
use App\Domain\Query\ListeCinemasQuery;
use App\Domain\Query\ListeFilmsQuery;
use App\Domain\Query\ListeFilmsHandler;
use App\Domain\Query\ProgrammationCinemaHandler;
use App\Domain\Query\ProgrammationCinemaQuery;
use App\Domain\Query\UnFilmQuery;
use App\Domain\Query\UnFilmHandler;
use App\Entity\Cinema;
use App\Entity\Film;
use App\Domain\ProgrammeDeCinema;
use App\Domain\Commands\DefinirProgrammationCinemaCommand;
use App\Domain\Commands\DefinirProgrammationCinemaHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CinemaAdminController extends AbstractController
{
    /**
     * @Route("/admin/cinemas/", name="liste_cinemas")
     */
    public function listeCinemas(ListeCinemasHandler $handler){
        $query = new ListeCinemasQuery();
        $listeCinemas = $handler->handle($query);
        return $this->render('Cinema/listCinemas.html.twig',[
            'cinemas'=>$listeCinemas,
        ]);
    }

    /**
     * @Route("/admin/films/", name="liste_films")
     */
    public function listeFilms(ListeFilmsHandler $handler) {
        $query = new ListeFilmsQuery();
        $listeFilms = $handler->handle($query);
        return $this->render('Film/listFilms.html.twig', ['films' => $listeFilms,]);
    }

    /**
     * @Route("/admin/films/{idFilm}", name="film_description", requirements={"idFilm"="\d+"})
     */
    public function obtenirUnFilm(int $idFilm, UnFilmHandler $handler) {
        $query = new UnFilmQuery($idFilm);
        $film = $handler->handle($query);
        return $this->render('Film/unFilm.html.twig', ['film' => $film]);
    }

    /**
    * @Route("/admin/cinemas/{cinema}", name="detail_cinema")
    */
    public function detailCinema(Cinema $cinema, ProgrammationCinemaHandler $programmationCinemaHandler)
    {
        $programmeQuery = new ProgrammationCinemaQuery($cinema);
        $filmsAAffiche = $programmationCinemaHandler->handle($programmeQuery);
        return $this->render('Cinema/cinema.html.twig',[
            'cinema'=>$cinema,
            'filmsAAffiche'=>$filmsAAffiche,
        ]);
    }

    /**
    * @Route("/admin/cinemas/programmation/{cinema}", name="programmation_cinema")
    */
    public function programmationCinema(Request $request,Cinema $cinema, ProgrammeDeCinema $programmeDeCinema, DefinirProgrammationCinemaHandler $handler){
        $programmation = $programmeDeCinema->getFilmsPourCinema($cinema);
        $films = [];
        foreach ($programmation as $affiche) {
            array_push($films, $affiche->getFilm());
        }

        $command = new DefinirProgrammationCinemaCommand($films, $cinema);
        $form = $this->createFormBuilder($command)
        ->add('films', EntityType::class,[
            'class' => Film::class,
            'multiple'=>true,
            'expanded'=>true,
        ])
        ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $command = $form->getData();
            $handler->handle($command);

            return $this->redirectToRoute('detail_cinema',["cinema"=>$cinema->getId()]);
        }

        return $this->render('Cinema/programmationCinema.html.twig',[
            "cinema"=>$cinema,
            "form"=>$form->createView(),
        ]);
    }
}