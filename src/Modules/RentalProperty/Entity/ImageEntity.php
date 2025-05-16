<?php

namespace App\Modules\RentalProperty\Entity;

use App\Modules\Base\Entity\BaseEntity;

class ImageEntity extends BaseEntity
{
    private string $id;
    private string $url;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
