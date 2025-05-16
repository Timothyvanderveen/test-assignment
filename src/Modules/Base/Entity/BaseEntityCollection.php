<?php

namespace App\Modules\Base\Entity;

use App\Modules\Base\Enum\SortDirection;

/**
 * @template T of BaseEntity
 */
abstract class BaseEntityCollection
{
    final public function __construct()
    {
    }

    /**
     * @return class-string<T>
     */
    abstract public static function getEntityClass(): string;

    public static function getDataJsonPath(): ?string
    {
        return null;
    }

    /**
     * @param T[]|null $data
     *
     * @return $this
     */
    public static function create(?array $data): static
    {
        /** @var static<T> $collectionNew */
        $collectionNew = new static();

        return $collectionNew->setData($data);
    }

    /**
     * @return $this
     */
    public static function createFromJson(): static
    {
        /** @var T[] $data */
        $data = [];
        $dataPath = __DIR__.'/../../../..'.static::getDataJsonPath();
        $dataJson = file_get_contents($dataPath);
        $entityClass = static::getEntityClass();

        if (!$dataJson) {
            throw new \LogicException(sprintf('Invalid JSON path: %s', $dataPath));
        }

        $dataJsonDecoded = json_decode($dataJson, true);
        $dataArrayRaw = is_array($dataJsonDecoded) ? $dataJsonDecoded : [];

        foreach ($dataArrayRaw as $dataRaw) {
            if (!is_array($dataRaw)) {
                continue;
            }

            $data[] = $entityClass::create($dataRaw);
        }

        return static::create($data);
    }

    public function getTotal(): int
    {
        return count($this->getFilteredData());
    }

    /** @var T[] */
    private array $data = [];

    /** @var T[] */
    private array $filteredData = [];

    /**
     * @return T[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param T[] $data
     *
     * @return $this
     */
    private function setData(?array $data): static
    {
        $this->data = $data ?? [];

        return $this->setFilteredData($this->data);
    }

    /**
     * @return T[]
     */
    public function getFilteredData(): array
    {
        return $this->filteredData;
    }

    /**
     * @param T[] $filteredData
     *
     * @return $this
     */
    public function setFilteredData(?array $filteredData): static
    {
        $this->filteredData = $filteredData ?? [];

        return $this;
    }

    /**
     * @return $this
     */
    public function resetFilter(): static
    {
        return $this->setFilteredData($this->getData());
    }

    /**
     * @return $this
     */
    private function filter(string $property, mixed $value, callable $cb): self
    {
        if (is_null($value)) {
            return $this;
        }

        $dataToFilter = $this->getFilteredData();

        foreach ($dataToFilter as $key => $filteredItem) {
            if (!$cb($filteredItem->get($property))) {
                unset($dataToFilter[$key]);
            }
        }

        return $this->setFilteredData(array_values($dataToFilter));
    }

    /**
     * @return $this
     */
    public function greaterThanOrEquals(string $property, ?int $value): static
    {
        return $this->filter($property, $value, function ($item) use ($value) {
            return $item >= $value;
        });
    }

    /**
     * @return $this
     */
    public function lessThanOrEquals(string $property, ?int $value): static
    {
        return $this->filter($property, $value, function ($item) use ($value) {
            return $item <= $value;
        });
    }

    /**
     * @return $this
     */
    public function equals(string $property, mixed $value): static
    {
        return $this->filter($property, $value, function ($item) use ($value) {
            if (is_string($item) && is_string($value)) {
                return strtolower($item) === strtolower($value);
            }

            return $item === $value;
        });
    }

    /**
     * @return $this
     */
    public function sortBy(string $property, SortDirection $sortDirection): static
    {
        usort($this->filteredData, function ($a, $b) use ($property, $sortDirection) {
            $aValue = $a->get($property);
            $bValue = $b->get($property);

            if ($aValue == $bValue) {
                return 0;
            }

            $direction = SortDirection::ASC === $sortDirection ? 1 : -1;

            return ($aValue < $bValue) ? -1 * $direction : $direction;
        });

        return $this;
    }
}
