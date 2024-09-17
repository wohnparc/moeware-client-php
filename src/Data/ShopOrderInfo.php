<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ShopOrderInfo extends Query
{
    /**
     * ShopOrderInfo constructor.
     *
     * @param Status $status
     * @param ?string $message
     * @param ?ShopOrderData $data
     */
    public function __construct(
        private Status $status,
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
        $self = new self(Status::ERROR);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
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
     *                 salutation: string | null,
     *                 title: string | null,
     *                 firstName: string,
     *                 lastName: string,
     *                 additionalName: string,
     *                 email: string,
     *                 country: string,
     *                 postCode: string,
     *                 city: string,
     *                 street: string,
     *                 houseNumber: string,
     *                 floor: string,
     *             },
     *             deliveryAddress: array{
     *                 salutation: string | null,
     *                 title: string | null,
     *                 firstName: string,
     *                 lastName: string,
     *                 additionalName: string,
     *                 email: string,
     *                 country: string,
     *                 postCode: string,
     *                 city: string,
     *                 street: string,
     *                 houseNumber: string,
     *                 floor: string,
     *             } | null,
     *             delivery: string,
     *             deliveryDate: string | null,
     *             deliveryYear: int | null,
     *             deliveryWeek: int | null,
     *             deliveryCode: string,
     *             typeOfDelivery: string,
     *             deliveryBlock: string | null,
     *             deliveryBeginningDate: string | null,
     *             deliveryEndDate: string | null,
     *             deliveryDayTimeCode: string | null,
     *             deliveryTimeFrom: int | null,
     *             deliveryTimeUntil: int | null,
     *             complaintCode: string | null,
     *             status: string,
     *         },
     *         positions: array{
     *             positionNumber: int,
     *             uniquePositionNumber: int,
     *             baseID: int,
     *             variantID: int,
     *             quantity: int,
     *             unitPrice: int,
     *             status: string,
     *             dateOfStatus: string | null,
     *             dateOfContract: string | null,
     *             dateOfDispatch: string | null,
     *             dateOfExpectedDelivery: string | null,
     *             timeOfExpectedDelivery: string | null,
     *             dateOfExpectedDeliveryAccording: string | null,
     *             dateOfGoodsReturnedFromCustomer: string | null,
     *             dateOfPickup: string | null,
     *             timeOfPickup: int,
     *             invoiceNumber: string,
     *             dateOfComplaint: string | null,
     *             deliveryNotification: int,
     *             typeOfDelivery: string,
     *             deliveryCode: string,
     *             partialDeliveryCode: int,
     *             planningCode: string,
     *             deliveryDateOfContractOfSale: string | null,
     *             dateOfReceipt: string | null,
     *             scheduledDeliveryDate: string | null,
     *             itemText1: string,
     *             itemText2: string,
     *             itemText3: string,
     *             itemTextShop1: string,
     *             itemTextShop2: string,
     *             itemTextShop3: string,
     *             positionText123: string,
     *             trackingNumber1: string | null,
     *             trackingNumber2: string | null,
     *             trackingURL: string | null,
     *         }[],
     *     } | null,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            Status::from($data['status']),
            $data['message'] ?? null,
            $data['data'] ? ShopOrderData::fromArray($data['data']) : null
        );
    }
}
