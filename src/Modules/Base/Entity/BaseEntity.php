<?php

namespace App\Modules\Base\Entity;

class BaseEntity
{
    final public function __construct()
    {
    }

    /**
     * @param mixed[] $data
     */
    public function setData(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function set(string $property, mixed $value): void
    {
        $property = str_replace('_', ' ', $property);
        $property = ucwords($property);
        $property = str_replace(' ', '', $property);
        $method = 'set'.ucfirst($property);
        $this->$method($value);
    }

    public function get(string $property): mixed
    {
        $key = str_replace('_', ' ', $property);
        $key = ucwords($key);
        $key = str_replace(' ', '', $key);
        $method = 'get'.ucfirst($key);

        return $this->$method();
    }

    /**
     * @param mixed[] $data
     */
    public static function create(array $data): static
    {
        $newEntity = new static();
        $newEntity->setData($data);

        return $newEntity;
    }
}
