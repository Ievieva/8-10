<?php declare(strict_types=1);

class Person
{
    private string $name;
    private string $surname;
    private string $number;
    private string $address;

    public function __construct(
        string $name,
        string $surname,
        string $number,
        string $address
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->number = $number;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'number' => $this->getNumber(),
            'address' => $this->getAddress()
        ];
    }
}
