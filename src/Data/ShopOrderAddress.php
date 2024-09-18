<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ShopOrderAddress
{
    /**
     * ShopOrderAddress constructor.
     *
     * @param ?string $salutation
     * @param ?string $title
     * @param string $firstName
     * @param string $lastName
     * @param string $additionalName
     * @param string $email
     * @param string $country
     * @param string $postCode
     * @param string $city
     * @param string $street
     * @param string $houseNumber
     * @param string $floor
     */
    public function __construct(
        private ?string $salutation,
        private ?string $title,
        private string $firstName,
        private string $lastName,
        private string $additionalName,
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
     * @return ?string
     */
    public function getSalutation(): ?string
    {
        return $this->salutation;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getAdditionalName(): string
    {
        return $this->additionalName;
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
     * @param array{
     *     salutation: string | null,
     *     title: string | null,
     *     firstName: string,
     *     lastName: string,
     *     additionalName: string,
     *     email: string,
     *     country: string,
     *     postCode: string,
     *     city: string,
     *     street: string,
     *     houseNumber: string,
     *     floor: string,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['salutation'] ?? null,
            $data['title'] ?? null,
            $data['firstName'],
            $data['lastName'],
            $data['additionalName'],
            $data['email'],
            $data['country'],
            $data['postCode'],
            $data['city'],
            $data['street'],
            $data['houseNumber'],
            $data['floor']
        );
    }
}
