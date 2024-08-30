<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\ProductLinkRelationStatus;

final class QueryProductLinkRelationStatus extends Query
{
    /**
     * QueryProductLinkRelationStatus constructor.
     *
     * @param ?ProductLinkRelationStatus $status
     */
    public function __construct(
        private ?ProductLinkRelationStatus $status = null,
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
        $self = new self('', null, [], []);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    //
    // -- GETTER
    //

    /**
     * @return ?ProductLinkRelationStatus
     */
    public function getStatus(): ?ProductLinkRelationStatus
    {
        return $this->status;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     productLinkRelationStatus: array{
     *         stockWarehouse: int | null,
     *         stockWithInbound: int| null,
     *         stockSyncActive: bool,
     *         stockUpdatedAt: string| null,
     *         stockSyncedAt: string| null,
     *         suggestedPrice: int| null,
     *         suggestedPriceUpdatedAt: string| null,
     *         suggestedPriceSyncedAt: string| null,
     *         moewareURL: string| null,
     *         otherChannels: array{
     *             channelID: string,
     *             domainIconURL: string,
     *             platformIconURL: string,
     *         },
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['productLinkRelationStatus'])
                ? ProductLinkRelationStatus::fromArray($data['productLinkRelationStatus'])
                : null,
        );
    }

    /**
     * @return string
     */
    public static function query(): string
    {
        return <<<'GQL'
        query queryProductLinkRelationStatus($externalProductRef: String!) {
          productLinkRelationStatus(externalProductRef: $externalProductRef) {
            stockWarehouse
            stockWithInbound
            stockSyncActive
            stockUpdatedAt
            stockSyncedAt
            suggestedPrice
            suggestedPriceUpdatedAt
            suggestedPriceSyncedAt
            moewareURL
            otherChannels {
              channelID
              domainIconURL
              platformIconURL
            }
          }
        }
        GQL;
    }

    /**
     * @param string $externalProductRef
     *
     * @return array{
     *     externalProductRef: string,
     * }
     */
    public static function variables(string $externalProductRef): array
    {
        return [
            'externalProductRef' => $externalProductRef,
        ];
    }
}
