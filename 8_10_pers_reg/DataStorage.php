<?php declare(strict_types=1);

class DataStorage
{
    private $resource;
    private array $persons;

    public function __construct()
    {
        $this->resource = fopen('personData.csv', 'rw+');
        $this->loadPersons();
    }

    public function loadPersons(): void
    {
        while (!feof($this->resource)) {
            $personData = (array)fgetcsv($this->resource);

            $this->persons[] = new Person(
                (string)$personData[0],
                (string)$personData[1],
                (string)$personData[2],
                (string)$personData[3]
            );
        }
    }

    public function addPersonToCSV(Person $person): void
    {
        $add = true;
        foreach ($this->persons as $personCSV) {
            /** @var Person $personCSV */
            if ($person->getNumber() == $personCSV->getNumber()) {
                $add = false;
            }
        }
        if ($add) {
            fputcsv($this->resource, $person->toArray());
        }
    }

    public function getByNumber(string $number): ?Person
    {
        foreach ($this->persons as $person) {
            /** @var Person $person */
            if ($number == $person->getNumber()) {
                return $person;
            }
        }
        return null;
    }
}
