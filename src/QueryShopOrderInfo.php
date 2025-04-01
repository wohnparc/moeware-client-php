<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\ShopOrderData;

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
     * @param array{
     *     status: string,
     *     message: string | null,
     *     data: array{
     *         head: array{
     *             orderID: int,
     *             customerID: int,
     *             dateOfContract: string,
     *             billingAddress: array{
     *                 name: string,
     *                 email: string,
     *                 country: string,
     *                 postCode: string,
     *                 city: string,
     *                 street: string,
     *                 houseNumber: string,
     *                 floor: string,
     *             },
     *             deliveryAddress: array{
     *                 name: string,
     *                 email: string,
     *                 country: string,
     *                 postCode: string,
     *                 city: string,
     *                 street: string,
     *                 houseNumber: string,
     *                 floor: string,
     *             } | null,
     *             delivery: string | null,
     *             deliveryDate: string,
     *             deliveryCode: string,
     *             typeOfDelivery: string | null,
     *             deliveryBlock: string | null,
     *             deliveryDayTimeCode: string | null,
     *             deliveryTimeRange: string | null,
     *             complaintCode: string | null,
     *             status: string,
     *             invoiceAmount: int,
     *             payment: string,
     *         },
     *         parts: array{
     *             title: string,
     *             price: int,
     *             deliveryDate: string,
     *             positions: array{
     *              positionNumber: int,
     *              uniquePositionNumber: int,
     *              baseID: int,
     *              variantID: int,
     *              quantity: int,
     *              unitPrice: int | null,
     *              status: string,
     *              date: string | null,
     *              dateOfStatus: string | null,
     *              dateOfGoodsReturnedFromCustomer: string | null,
     *              invoiceNumber: string,
     *              dateOfComplaint: string | null,
     *              deliveryNotification: int,
     *              typeOfDelivery: string | null,
     *              deliveryCode: string,
     *              partialDeliveryCode: int,
     *              planningCode: string,
     *              deliveryDateOfContractOfSale: string | null,
     *              itemText1: string,
     *              itemText2: string,
     *              itemText3: string,
     *              itemTextShop1: string,
     *              itemTextShop2: string,
     *              itemTextShop3: string,
     *              positionText123: string,
     *              trackingNumber1: string | null,
     *              trackingNumber2: string | null,
     *              trackingURL: string | null,
     *          }[],
     *         }[],
     *     } | null,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (string)$data['status'],
            isset($data['message']) ? (string)$data['message'] : null,
            isset($data['data']) ? ShopOrderData::fromArray($data['data']) : null
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
