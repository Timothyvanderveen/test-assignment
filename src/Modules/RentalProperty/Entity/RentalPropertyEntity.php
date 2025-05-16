<?php

namespace App\Modules\RentalProperty\Entity;

use App\Modules\Base\Entity\BaseEntity;
use App\Modules\Base\Entity\BaseEntityCollection;
use App\Modules\RentalProperty\Enum\DeliveryLevel;
use App\Modules\RentalProperty\Enum\HouseType;
use App\Modules\RentalProperty\Enum\RentalStatus;
use App\Modules\RentalProperty\Enum\State;
use App\Modules\RentalProperty\Enum\Type;

class RentalPropertyEntity extends BaseEntity
{
    private string $id;
    private State $state;
    private string $housing_url;
    private Type $type;
    private int $price;
    private string $street;
    private string $postcode;
    private string $city;
    private string $province;
    private DeliveryLevel $delivery_level;
    private RentalStatus $rental_status;
    private ?int $rooms_total;
    private ?int $surface_living;
    private bool $garden;
    private bool $garage;
    private bool $parking;
    private bool $balcony;
    private bool $storage;
    private HouseType $house_type;
    private \DateTimeImmutable $created_at;
    private ImageEntityCollection $images;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getState(): State
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = State::from($state);
    }

    public function getHousingUrl(): string
    {
        return $this->housing_url;
    }

    public function setHousingUrl(string $housing_url): void
    {
        $this->housing_url = $housing_url;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = Type::from($type);
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getPostcode(): string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): void
    {
        $this->postcode = $postcode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    public function getDeliveryLevel(): DeliveryLevel
    {
        return $this->delivery_level;
    }

    public function setDeliveryLevel(string $delivery_level): void
    {
        $this->delivery_level = DeliveryLevel::from($delivery_level);
    }

    public function getRentalStatus(): RentalStatus
    {
        return $this->rental_status;
    }

    public function setRentalStatus(string $rental_status): void
    {
        $this->rental_status = RentalStatus::from($rental_status);
    }

    public function getRoomsTotal(): ?int
    {
        return $this->rooms_total;
    }

    public function setRoomsTotal(?int $rooms_total): void
    {
        $this->rooms_total = $rooms_total;
    }

    public function getSurfaceLiving(): ?int
    {
        return $this->surface_living;
    }

    public function setSurfaceLiving(?int $surface_living): void
    {
        $this->surface_living = $surface_living;
    }

    public function isGarden(): bool
    {
        return $this->garden;
    }

    public function setGarden(?bool $garden): void
    {
        $this->garden = (bool) $garden;
    }

    public function isGarage(): bool
    {
        return $this->garage;
    }

    public function setGarage(?bool $garage): void
    {
        $this->garage = (bool) $garage;
    }

    public function isParking(): bool
    {
        return $this->parking;
    }

    public function setParking(?bool $parking): void
    {
        $this->parking = (bool) $parking;
    }

    public function isBalcony(): bool
    {
        return $this->balcony;
    }

    public function setBalcony(?bool $balcony): void
    {
        $this->balcony = (bool) $balcony;
    }

    public function isStorage(): bool
    {
        return $this->storage;
    }

    public function setStorage(?bool $storage): void
    {
        $this->storage = (bool) $storage;
    }

    public function getHouseType(): HouseType
    {
        return $this->house_type;
    }

    public function setHouseType(string $house_type): void
    {
        $this->house_type = HouseType::from($house_type);
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->created_at;
    }

    /**
     * @throws \Exception
     */
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = new \DateTimeImmutable($created_at);
    }

    /**
     * @return BaseEntityCollection<ImageEntity>
     */
    public function getImages(): BaseEntityCollection
    {
        return $this->images;
    }

    /**
     * @param mixed[][] $images
     */
    public function setImages(array $images): void
    {
        /** @var ImageEntity[] $imagesNew */
        $imagesNew = [];
        foreach ($images as $image) {
            $imagesNew[] = ImageEntity::create($image);
        }

        $this->images = ImageEntityCollection::create($imagesNew);
    }

    public function getCoverImageUrl(): ?string
    {
        $image = $this->images->getData()[0] ?? null;

        return $image instanceof ImageEntity ? $image->getUrl() : null;
    }

    public function isHouseTypeFree(): bool
    {
        return HouseType::FREE === $this->getHouseType();
    }
}
