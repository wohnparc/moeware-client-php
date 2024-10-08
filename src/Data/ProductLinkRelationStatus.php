<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Wohnparc\Moeware\Util\Util;

final class ProductLinkRelationStatus
{
    /**
     * ProductLinkRelationStatus constructor.
     *
     * @paramt string $externalID
     * @param ?int $stockWarehouse
     * @param ?int $stockWithInbound
     * @param bool $stockSyncActive
     * @param ?DateTimeImmutable $stockUpdatedAt
     * @param ?DateTimeImmutable $stockSyncedAt
     * @param ?PriceWatch $priceWatch
     * @param ?string $moewareURL
     * @param bool $shopSyncActive
     * @param ?DateTimeImmutable $shopSyncedAt
     * @param ProductLinkInfo $info
     * @param ?Article $article
     * @param ?Set $set
     * @param ProductLinkRelationStatusChannel[] $otherChannels
     */
    public function __construct(
        private string $externalID,
        private ?int $stockWarehouse,
        private ?int $stockWithInbound,
        private bool $stockSyncActive,
        private ?DateTimeImmutable $stockUpdatedAt,
        private ?DateTimeImmutable $stockSyncedAt,
        private ?PriceWatch $priceWatch,
        private ?string $moewareURL,
        private bool $shopSyncActive,
        private ?DateTimeImmutable $shopSyncedAt,
        private ProductLinkInfo $info,
        private ?Article $article,
        private ?Set $set,
        private array $otherChannels,
    ) {
    }



    //
    // -- GETTER
    //

    /**
     * @return string
     */
    public function getExternalID(): string
    {
        return $this->externalID;
    }

    /**
     * @return ?int
     */
    public function getStockWarehouse(): ?int
    {
        return $this->stockWarehouse;
    }

    /**
     * @return ?int
     */
    public function getStockWithInbound(): ?int
    {
        return $this->stockWithInbound;
    }

    /**
     * @return bool
     */
    public function isStockSyncActive(): bool
    {
        return $this->stockSyncActive;
    }

    /**
     * @return ?DateTimeImmutable
     */
    public function getStockUpdatedAt(): ?DateTimeImmutable
    {
        return $this->stockUpdatedAt;
    }

    /**
     * @return ?DateTimeImmutable
     */
    public function getStockSyncedAt(): ?DateTimeImmutable
    {
        return $this->stockSyncedAt;
    }

    /**
     * @return ?PriceWatch
     */
    public function getPriceWatch(): ?PriceWatch
    {
        return $this->priceWatch;
    }

    /**
     * @return ?string
     */
    public function getMoewareURL(): ?string
    {
        return $this->moewareURL;
    }

    /**
     * @return bool
     */
    public function isShopSyncActive(): bool
    {
        return $this->shopSyncActive;
    }

    /**
     * @return ?DateTimeImmutable
     */
    public function getShopSyncedAt(): ?DateTimeImmutable
    {
        return $this->shopSyncedAt;
    }

    /**
     * @return ProductLinkInfo
     */
    public function getInfo(): ProductLinkInfo
    {
        return $this->info;
    }

    /**
     * @return ?Article
     */
    public function getArticle(): ?Article
    {
        return $this->article;
    }

    /**
     * @return ?Set
     */
    public function getSet(): ?Set
    {
        return $this->set;
    }

    /**
     * @return ProductLinkRelationStatusChannel[]
     */
    public function getOtherChannels(): array
    {
        return $this->otherChannels;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     externalID: string,
     *     stockWarehouse: int | null,
     *     stockWithInbound: int| null,
     *     stockSyncActive: bool,
     *     stockUpdatedAt: string| null,
     *     stockSyncedAt: string| null,
     *     priceWatch: array{
     *      enabled: bool,
     *      externalID: string|null,
     *      externalURL: string|null,
     *      enabledAt: string|null,
     *      disabledAt: string|null,
     *      suggestedPrice: int| null,
     *      suggestedPriceUpdatedAt: string| null,
     *      suggestedPriceSyncedAt: string| null,
     *     }| null,
     *     moewareURL: string| null,
     *     shopSyncActive: bool,
     *     shopSyncedAt: string | null,
     *     info: array{
     *         productNotFound: bool,
     *         productDisabled: bool,
     *         invalidSetConfig: bool,
     *         invalidSetItems: bool,
     *     },
     *     article: array{
     *         id: string,
     *         ref: array{
     *             baseID: int,
     *             variantID: int,
     *         },
     *         title1: array{
     *          array{
     *            lang: string,
     *            value: string,
     *          },
     *         },
     *         title2: array{
     *           array{
     *             lang: string,
     *             value: string,
     *           },
     *         },
     *         title3: array{
     *           array{
     *             lang: string,
     *             value: string,
     *            },
     *         },
     *         manufacturer: string,
     *         pseudoStockEnabled: bool,
     *         pseudoStockCount: int,
     *         stock: array{
     *             location: array{
     *                 code: string,
     *                 number: int,
     *             },
     *             quantity: int,
     *             expectedAt: ?string,
     *         }[],
     *         prices: array{
     *             recommendedRetailPrice: ?int,
     *             advertisingPrice: ?int,
     *             calculationPrice: ?int,
     *         },
     *     } | null,
     *     set: array{
     *         id: string,
     *         ref: array{
     *             baseID: int,
     *             variantID: int,
     *         },
     *         items: array{
     *           article: array{
     *             baseID: int,
     *             variantID: int,
     *           },
     *           numberOfPieces: int,
     *         }[],
     *          title1: array{
     *             array{
     *               lang: string,
     *             value: string,
     *             },
     *        },
     *        title2: array{
     *          array{
     *            lang: string,
     *            value: string,
     *          },
     *         },
     *         title3: array{
     *          array{
     *            lang: string,
     *            value: string,
     *           },
     *         },
     *         manufacturer: string,
     *         pseudoStockEnabled: bool,
     *         pseudoStockCount: int,
     *     } | null,
     *     otherChannels: array{
     *         channelID: string,
     *         domainIconURL: string,
     *         platformIconURL: string,
     *     }[],
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['externalID'],
            $data['stockWarehouse'] ?? null,
            $data['stockWithInbound'] ?? null,
            ((bool) $data['stockSyncActive']),
            Util::fromRawDate($data['stockUpdatedAt'] ?? ''),
            Util::fromRawDate($data['stockSyncedAt'] ?? ''),
            $data['priceWatch'] ? PriceWatch::fromArray($data['priceWatch']) : null,
            $data['moewareURL'] ?? null,
            ((bool) $data['shopSyncActive']),
            Util::fromRawDate($data['shopSyncedAt'] ?? ''),
            ProductLinkInfo::fromArray($data['info']),
            $data['article'] ? Article::fromArray($data['article']) : null,
            $data['set'] ? Set::fromArray($data['set']) : null,
            array_map(
                [ProductLinkRelationStatusChannel::class, 'fromArray'],
                $data['otherChannels']
            )
        );
    }

}
