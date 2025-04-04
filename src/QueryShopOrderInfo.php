<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\ShopOrderData;

/** @phpstan-import-type ShopOrderDataPayload from \Wohnparc\Moeware\Data\ShopOrderData */
/** @phpstan-import-type ShopOrderHeadPayload from \Wohnparc\Moeware\Data\ShopOrderHead */
/** @phpstan-import-type ShopOrderPartPayload from \Wohnparc\Moeware\Data\ShopOrderPart */
/** @phpstan-import-type ShopOrderPositionPayload from \Wohnparc\Moeware\Data\ShopOrderPosition */
/** @phpstan-import-type ShopOrderAddressPayload from \Wohnparc\Moeware\Data\ShopOrderAddress */
final class QueryShopOrderInfo extends Query
{
    /**
     * ShopOrderInfo constructor.
     *
     * @param string $status
     * @param ?string $message
     * @param ?ShopOrderData $data
     */
    public function __construct(
        private string $status,
        private ?string $message = null,
        private ?ShopOrderData $data = null,
    ) {
        parent::__construct([]);
    }

    /**
     * @param array<array{
     *     message: string,
     *     path: string[],
     * }> $errors
     *
     * @return static
     */
    public static function withErrors(array $errors): self
    {
        $self = new self("");

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return ?ShopOrderData
     */
    public function getData(): ?ShopOrderData
    {
        return $this->data;
    }


    /**
     * @phpstan-param array{
     *   status: string,
     *   message: string|null,
     *   data: ShopOrderData|null
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['status'],
            isset($data['message']) ? (string)$data['message'] : null,
            $data['data'] ?? null
        );
    }

    /**
     * Returns the GraphQL query string for fetching complete shop order info.
     *
     * @return string
     */
    public static function query(): string
    {
        return <<<'GQL'
        query ShopOrderInfo($orderID: Int!, $lastName: String!, $postCode: String!) {
          shopOrderInfo(orderID: $orderID, lastName: $lastName, postCode: $postCode) {
            status
            message
            data {
              head {
                orderID
                storeKey
                customerID
                dateOfContract
                billingAddress {
                  name
                  email
                  country
                  postCode
                  city
                  street
                  houseNumber
                  floor
                }
                deliveryAddress {
                  name
                  email
                  country
                  postCode
                  city
                  street
                  houseNumber
                  floor
                }
                delivery
                deliveryDate
                deliveryTimeRange
                deliveryCode
                typeOfDelivery
                deliveryBlock
                deliveryDayTimeCode
                invoiceAmount
                payment
                complaintCode
                status
              }
              parts {
                title
                price
                deliveryDate
                positions {
                    positionNumber
                    uniquePositionNumber
                    baseID
                    variantID
                    quantity
                    unitPrice
                    status
                    dateOfStatus
                    date
                    dateOfContract
                    dateOfGoodsReturnedFromCustomer
                    invoiceNumber
                    dateOfComplaint
                    deliveryNotification
                    typeOfDelivery
                    deliveryCode
                    partialDeliveryCode
                    planningCode
                    deliveryDateOfContractOfSale
                    itemText1
                    itemText2
                    itemText3
                    itemTextShop1
                    itemTextShop2
                    itemTextShop3
                    positionText123
                    trackingNumber1
                    trackingNumber2
                    trackingURL
                }
              }
            }
          }
        }
        GQL;
    }

    /**
     * @param int $orderID
     * @param string $lastName
     * @param string $postCode
     *
     * @return array{
     *     orderID: int,
     *     lastName: string,
     *     postCode: string,
     * }
     */
    public static function variables(int $orderID, string $lastName, string $postCode): array
    {
        return [
            'orderID' => $orderID,
            'lastName' => $lastName,
            'postCode' => $postCode,
        ];
    }
}
