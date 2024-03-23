<?php

class Member
{
    public string $forename;
    public string $surname;

    public function getFullName(): string
    {
        return $this->forename . ' ' . $this->surname;
    }
}
