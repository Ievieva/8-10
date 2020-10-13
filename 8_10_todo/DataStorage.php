<?php declare(strict_types=1);

class DataStorage
{
    private $resource;
    private array $todos;

    public function __construct()
    {
        $this->resource = fopen('todos.csv', 'r+');
        $this->loadTodos();
    }

    private function loadTodos(): void
    {
        while (!feof($this->resource)) {
            $data = (array)fgetcsv($this->resource);
            if ($data[0]) {
                $this->todos[] = $data[0];
            }
        }
    }

    public function getTodos(): ?array
    {
        return $this->todos;
    }

    public function removeTodo(int $id): void
    {
        unset($this->todos[$id]);

        $resource = fopen("todos.csv", "w+");
        foreach ($this->todos as $todo) {
            if ($todo) {
                fputcsv($resource, [$todo]);
            }
        }
        fclose($resource);
    }
}
