<?php


namespace App;


class FizzBuzz
{
    /**
     * Retourne 'Fizz' pour les nombres
     * qui sont des multiples de 3
     *
     * @param $i
     * @return string
     */
    public function retourne_fizz_pour_les_multiples_de_3($i)
    {
        if ($i % 3 == 0)
            return 'Fizz';
    }

    /**
     * Retourne 'Buzz' pour les nombres
     * qui sont des multiples de 5
     *
     * @param $i
     * @return string
     */
    public function retourne_fizz_pour_les_multiples_de_5($i)
    {
        if ($i % 5 == 0)
            return 'Buzz';
    }

    /**
     * Retourne 'FizzBuzz' pour les nombres
     * qui sont des multiples de 3 et de 5
     *
     * @param $i
     * @return string
     */
    public function retourne_fizz_pour_les_multiples_de_3_et_de_5($i)
    {
        if ($i % 3 == 0 && $i % 5 == 0)
            return 'FizzBuzz';
    }

    /**
     * Retourne le nombre pour les nombres
     * qui ne sont ni multiples de 3 et ni multiples de 5
     *
     * @param $i
     * @return string
     */
    public function retourne_nombre_si_pas_multiples_de_3_et_de_5($i)
    {
        if ($i % 3 != 0 && $i % 5 != 0)
            return $i;
    }
}