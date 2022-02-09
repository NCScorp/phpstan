<?php declare(strict_types = 1);

class HelloWord{
    public function sayHello(DateTimeImmutable $date): void
    {
        echo 'Hello, ' . $date->format('j. n. Y');
    }
}