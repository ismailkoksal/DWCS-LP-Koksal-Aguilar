<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\DoctrineProgrammeDeCinemas")
 * @UniqueEntity(
 *  fields={"cinema","film"},
 *  errorPath="film",
 *  message="Film already presents in listFilmsAAFiche for this cinema."
 * )
 */
class FilmAAffiche
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cinema")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cinema;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups("filmsAAFiche")
     */
    private $film;

    public function __construct(Cinema $cinema, Film $film) 
    {
        $this->cinema = $cinema;
        $this->film = $film;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCinema(): ?Cinema
    {
        return $this->cinema;
    }

    public function setCinema(?Cinema $cinema): self
    {
        $this->cinema = $cinema;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }
}
