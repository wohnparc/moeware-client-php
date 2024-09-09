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
        $self = new self(null);

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
     *         externalID: string,
     *         stockWarehouse: int|null,
     *         stockWithInbound: int|null,
     *         stockSyncActive: bool,
     *         stockUpdatedAt: string|null,
     *         stockSyncedAt: string|null,
     *         priceWatch: array{
     *             enabled: bool,
     *             externalID: string|null,
     *             externalURL: string|null,
     *             enabledAt: string|null,
     *             disabledAt: string|null,
     *             suggestedPrice: int|null,
     *             suggestedPriceUpdatedAt: string|null,
     *             suggestedPriceSyncedAt: string|null
     *         },
     *         moewareURL: string|null,
     *         shopSyncActive: bool,
     *         shopSyncedAt: string|null,
     *         info: array{
     *             productNotFound: bool,
     *             productDisabled: bool,
     *             invalidSetConfig: bool,
     *             invalidSetItems: bool
     *         },
     *         article: array{
     *             id: string,
     *             ref: array{
     *                 baseID: int,
     *                 variantID: int
     *             },
     *             title1: array{
     *              array{
     *                lang: string,
     *                value: string,
     *              },
     *             },
     *             title2: array{
     *               array{
     *                 lang: string,
     *                 value: string,
     *               },
     *             },
     *             title3: array{
     *               array{
     *                 lang: string,
     *                 value: string,
     *               },
     *             },
     *             manufacturer: string,
     *             pseudoStockEnabled: bool,
     *             pseudoStockCount: int,
     *             stock: array{
     *                 location: array{
     *                     code: string,
     *                     number: int
     *                 },
     *                 quantity: int,
     *                 expectedAt: ?string
     *             }[],
     *             prices: array{
     *                 recommendedRetailPrice: ?int,
     *                 advertisingPrice: ?int,
     *                 calculationPrice: ?int
     *             }
     *         }|null,
     *         set: array{
     *             id: string,
     *             ref: array{
     *                 baseID: int,
     *                 variantID: int
     *             },
     *             items: array{
     *                 article: array{
     *                     baseID: int,
     *                     variantID: int
     *                 },
     *                 numberOfPieces: int
     *             }[],
     *             title1: array{
     *              array{
     *                lang: string,
     *                value: string,
     *              },
     *             },
     *             title2: array{
     *               array{
     *                 lang: string,
     *                 value: string,
     *               },
     *             },
     *             title3: array{
     *               array{
     *                 lang: string,
     *                 value: string,
     *               },
     *             },
     *             manufacturer: string,
     *             pseudoStockEnabled: bool,
     *             pseudoStockCount: int
     *         }|null,
     *         otherChannels: array{
     *             channelID: string,
     *             domainIconURL: string,
     *             platformIconURL: string
     *         }[]
     *     }|null
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
            externalID
            stockWarehouse
            stockWithInbound
            stockSyncActive
            stockUpdatedAt
            stockSyncedAt
            priceWatch {
              enabled
              externalID
              externalURL
              enabledAt
              disabledAt
              suggestedPrice
              suggestedPriceUpdatedAt
              suggestedPriceSyncedAt
            }          
            moewareURL
            shopSyncActive
            shopSyncedAt
            info {
              productNotFound
              productDisabled
              invalidSetConfig
              invalidSetItems
            }
            article {
              id
              ref {
                baseID
                variantID
              }
              title1 {
                lang
                value
              }
              title2 {
                lang
                value
              }
              title3 {
                lang
                value
              }
              manufacturer
              pseudoStockEnabled
              pseudoStockCount
              stock {
                location {
                  code
                  number
                }
                quantity
                expectedAt
              }
              prices {
                recommendedRetailPrice
                advertisingPrice
                calculationPrice
              }
            }
            set {
              id
              ref {
                baseID
                variantID
              }
              items {
                article {
                  baseID
                  variantID
                }
                numberOfPieces
              }
              title1 {
                lang
                value
              }
              title2 {
                lang
                value
              }
              title3 {
                lang
                value
              }
              manufacturer
              pseudoStockEnabled
              pseudoStockCount
            }
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
