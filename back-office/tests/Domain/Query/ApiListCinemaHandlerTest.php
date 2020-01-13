<?php 
namespace App\Tests\Domain\Query;
use App\Domain\AnnuaireDeCinemas;
use App\Repository\ApiAnnuaireDeCinema;
use App\Domain\Query\ListeCinemasHandler;
use App\Domain\Query\ListeCinemasQuery;
use PHPUnit\Framework\TestCase;

class ApiListeCinemasHandlerTest extends TestCase
{
    public function test_obtenir_la_liste_de_cinemas_interroge_l_annuaire(){
          // Arrange
        $requete=new ListeCinemasQuery();
        $annuaire = $this->createMock(ApiAnnuaireDeCinema::class);;
        $handler=new ListeCinemasHandler($annuaire);

        //Assert
        $annuaire->expects($this->once())->method("tousLesCinemas");

        // Act
        $listeDeCinemas=$handler->handle($requete);
    }
}