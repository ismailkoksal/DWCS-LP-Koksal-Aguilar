<?php


namespace App;


use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function test_fizzbuzz_retourne_fizzbuzz()
    {
        $partie = new FizzBuzz();
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 15 == 0) {
                $this->assertSame('FizzBuzz', $partie->compte($i));
            }
        }
    }

    public function test_fizzbuzz_retourne_fizz()
    {
        $partie = new FizzBuzz();
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 3 == 0 && $i % 15 != 0) {
                $this->assertSame('Fizz', $partie->compte($i));
            }
        }
    }

    public function test_fizzbuzz_retourne_buzz()
    {
        $partie = new FizzBuzz();
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 5 == 0 && $i % 15 != 0) {
                $this->assertSame('Buzz', $partie->compte($i));
            }
        }
    }

    public function test_fizzbuzz_retourne_nombre()
    {
        $partie = new FizzBuzz();
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 15 != 0 && $i % 3 != 0 && $i % 5 != 0) {
                $this->assertSame($i, $partie->compte($i));
            }
        }
    }
}
