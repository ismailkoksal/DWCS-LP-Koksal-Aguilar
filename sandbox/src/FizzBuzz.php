<?php


namespace App;


class FizzBuzz
{
    public function compte($i)
    {
        if ($i % 15 == 0) return 'FizzBuzz';
        if ($i % 3 == 0) return 'Fizz';
        if ($i % 5 == 0) return 'Buzz';
        return $i;
    }
}