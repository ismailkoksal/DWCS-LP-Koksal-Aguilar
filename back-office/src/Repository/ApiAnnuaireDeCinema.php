<?php

namespace App\Repository;
use App\Domain\AnnuaireDeCinemas;
use Unirest;

class ApiAnnuaireDeCinema implements AnnuaireDeCinemas
{
    public function tousLesCinemas(): iterable
    {
        $headers = ['Accept' => 'application/json'];
        $cinemaResponse = Unirest\Request::get('http://dfs-api/api/cinemas', $headers, null);
        $cinemas = $cinemaResponse->body;
        return $cinemas;
    }

    public function getCinemaById($cinemaId): Cinema
    {
        $cinemas = $this->tousLesCinemas();
        foreach ($cinemas as $cinema) 
        {
            return $cinema ? ($cinema->getId() == $cinemaId) : null;
        }
    }
}