<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

/**
 * @phpstan-type ShopOrderAddressPayload array{
 *     name: string | null,
 *     email: string| null,
 *     country: string| null,
 *     postCode: string| null,
 *     city: string| null,
 *     street: string| null,
 *     houseNumber: string| null,
 *     floor: string| null
 * }
 */
final class ShopOrderAddress
{
    /**
     * @param string $name
     * @param string $email
     * @param string $country
     * @param string $postCode
     * @param string $city
     * @param string $street
     * @param string $houseNumber
     * @param string $floor
     */
    public function __construct(
        private string $name,
        private string $email,
        private string $country,
        private string $postCode,
        private string $city,
        private string $street,
        private string $houseNumber,
        private string $floor
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * @return string
     */
    public function getFloor(): string
    {
        return $this->floor;
    }


    /**
     * @phpstan-param ShopOrderAddressPayload $data
     * @param mixed $data
     */
    public static function fromArray($data): self
    {
        return new self(
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['country'] ?? '',
            $data['postCode'] ?? '',
            $data['city'] ?? '',
            $data['street'] ?? '',
            $data['houseNumber'] ?? '',
            $data['floor'] ?? ''
        );
    }
}
