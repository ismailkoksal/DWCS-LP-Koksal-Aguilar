<?php


namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Domain\ProgrammeDeCinema;
use App\Entity\Cinema;
use App\Domain\Commands\DefinirProgrammationCinemaCommand;
use App\Domain\Commands\DefinirProgrammationCinemaHandler;

class CinemaAdminControllerTest extends WebTestCase
{
    /** @var Cinema */
    private $unCinema;
    /** @var Film */
    private $unFilm;
    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();

        $container = self::$container;
        $this->unCinema = $container->get("App\Domain\AnnuaireDeCinemas")->tousLesCinemas()[0];
        $this->unFilm = $container->get("App\Domain\CatalogueDeFilms")->tousLesFilms()[0];
    }

    public function test_page_cinemas_est_disponible()
    {
        $this->client->request('GET', '/admin/cinemas/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function test_la_liste_des_cinemas_affiche_les_cinemas()
    {
        $crawler=$this->client->request('GET', '/admin/cinemas/');

        // Il faut vérifier que la contenu de la page contient une liste de cinémas.
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("MegaCGR")')->count()
        );
    }

    public function test_page_films_est_disponible() {
        $this->client->request('GET', '/admin/films/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function test_la_liste_des_films_affiche_les_films() {

        $crawler=$this->client->request('GET', '/admin/films/');

        // Il faut vérifier que la contenu de la page contient une liste de cinémas.
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Interstelar")')->count()
        );
    }

    public function test_page_description_film_est_disponible() {
        $idFilm = $this->unFilm->getId();
        $this->client->request('GET', '/admin/films/'.$idFilm);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function test_page_cinema_est_disponible() 
    {
        $idCinema=$this->unCinema->getId();
        $this->client->request('GET', '/admin/cinemas/'.$idCinema);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function test_la_page_d’un_cinema_affiche_les_films_a_l’affiche()
    {
        $idCinema=$this->unCinema->getId();
        $titreFilm=$this->unFilm->getTitre();

        $crawler=$this->client->request('GET', '/admin/cinemas/'.$idCinema);

        // Il faut vérifier que la contenu de la page contient le titre du film.
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("'.$titreFilm.'")')->count()
        );
    }

    public function test_page_edition_programmation_est_disponible()
    {
        $idCinema=$this->unCinema->getId();
        $crawler=$this->client->request('GET', '/admin/cinemas/programmation/'.$idCinema);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function test_page_edition_programmation_est_disponible_et_affiche_le_formulaire()
    {
        $idCinema=$this->unCinema->getId();
        $crawler=$this->client->request('GET', '/admin/cinemas/programmation/'.$idCinema);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertGreaterThan(
            0,
            $crawler->filter('form.programmation')->count()
        );
    }

    public function test_definir_la_programmation_vide_les_films_a_l’affiche(){
        // Arrange
        $cinema=$this->createMock(Cinema::class);
        $programmeDeCinema = $this->createMock(ProgrammeDeCinema::class);
        $handler=new DefinirProgrammationCinemaHandler($programmeDeCinema);
        $command=new DefinirProgrammationCinemaCommand([],$cinema);
    
        // Assert
        $programmeDeCinema->expects($this->once())->method("videProgrammation")->with($cinema);
    
        // Act
        $handler->handle($command);
    }
}