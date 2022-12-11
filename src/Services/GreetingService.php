<?php

namespace App\Services;

class GreetingService {

    private const MESSAGES = [
        "Geia",
        "Salām",
        "Hello",
        "Bonjur",
        "Привет",
        "Buna",
        "Dobryj Den"
    ];

    public function getMessage(): string
    {
        $number = $this->getRandomIndex();
        return self::MESSAGES[$number];
    }

    private function getRandomIndex(): int
    {
        return array_rand(self::MESSAGES);
    }
}