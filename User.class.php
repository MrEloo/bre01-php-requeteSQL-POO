<?php

class User
{
    private ?int $id = null;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID(int $id)
    {
        return $this->id = $id;
    }

    public function hydrate(array $usersData): void
    {
        if (isset($usersData['first_name'])) {
            $this->firstName = (string) $usersData['first_name'];
        }

        if (isset($usersData['last_name'])) {
            $this->lastName = (string) $usersData['last_name'];
        }

        if (isset($usersData['email'])) {
            $this->email = (string) $usersData['email'];
        }

        if (isset($usersData['id'])) {
            $this->id = (int) $usersData['id'];
        }
    }

    public function save(object $db): void
    {
        $insQuery = $db->prepare('INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)');
        $parameters = [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
        ];
        $insQuery->execute($parameters);
    }
}
