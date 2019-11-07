<?php


namespace App;


use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * Test pour s'assurer que les multiples de 3 retourne 'Fizz'.
     */
    public function test_multiple_de_3_retourne_fizz()
    {
        // On créer une partie de FizzBuzz
        $partie = new FizzBuzz();

        // On test pour tous les multiples de 3 entre 0 et 100
        for ($i = 0; $i <= 100; $i++) {
            if ($i % 3 == 0) {
                $this->assertSame('Fizz', $partie->retourne_fizz_pour_les_multiples_de_3($i));
            }
        }
    }

    /**
     * Test pour s'assurer que les multiples de 5 retourne 'Buzz'.
     */
    public function test_multiple_de_5_retourne_buzz()
    {
        // On créer une partie de FizzBuzz
        $partie = new FizzBuzz();

        // On test pour tous les multiples de 5 entre 0 et 100
        for ($i = 0; $i <= 100; $i++) {
            if ($i % 5 == 0) {
                $this->assertSame('Buzz', $partie->retourne_fizz_pour_les_multiples_de_5($i));
            }
        }
    }

    /**
     * Test pour s'assurer que les multiples de 3 et de 5 retourne 'FizzBuzz'.
     */
    public function test_multiple_de_15_retourne_fizzbuzz()
    {
        // On créer une partie de FizzBuzz
        $partie = new FizzBuzz();

        // On test pour tous les multiples de 3 et de 5 entre 0 et 100
        for ($i = 0; $i <= 100; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $this->assertSame('FizzBuzz', $partie->retourne_fizz_pour_les_multiples_de_3_et_de_5($i));
            }
        }
    }

    /**
     * Test pour s'assurer que les multiples de 3 et de 5 retourne 'FizzBuzz'.
     */
    public function test_nombre_pas_multiple_de_3_et_de_5_retourne_nombre()
    {
        // On créer une partie de FizzBuzz
        $partie = new FizzBuzz();

        // On test pour tous les nombres qui ne sont ni multiples de 3 et ni multiples de de 5 entre 0 et 100
        for ($i = 0; $i <= 100; $i++) {
            if ($i % 3 != 0 && $i % 5 != 0) {
                $this->assertSame($i, $partie->retourne_nombre_si_pas_multiples_de_3_et_de_5($i));
            }
        }
    }
}
