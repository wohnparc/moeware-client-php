<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

final class ProductLinkRelationStatus {

  /**
   * ProductLinkRelationStatus constructor.
   *
   * @param ?int $stockWarehouse
   * @param ?int $stockWithInbound
   * @param bool $stockSyncActive
   * @param ?DateTimeImmutable $stockUpdatedAt
   * @param ?DateTimeImmutable $stockSyncedAt
   * @param ?int $suggestedPrice
   * @param ?DateTimeImmutable $suggestedPriceUpdatedAt
   * @param ?DateTimeImmutable $suggestedPriceSyncedAt
   * @param ?string $moewareURL
   * @param bool $shopSyncActive
   * @param ?DateTimeImmutable $shopSyncedAt
   * @param ProductLinkInfo $info
   * @param ?Article $article
   * @param ?Set $set
   * @param ProductLinkRelationStatusChannel[] $otherChannels
   */
  public function __construct(
    private ?int $stockWarehouse,
    private ?int $stockWithInbound,
    private bool $stockSyncActive,
    private ?DateTimeImmutable $stockUpdatedAt,
    private ?DateTimeImmutable $stockSyncedAt,
    private ?int $suggestedPrice,
    private ?DateTimeImmutable $suggestedPriceUpdatedAt,
    private ?DateTimeImmutable $suggestedPriceSyncedAt,
    private ?string $moewareURL,
    private bool $shopSyncActive,
    private ?DateTimeImmutable $shopSyncedAt,
    private ProductLinkInfo $info,
    private ?Article $article,
    private ?Set $set,
    private array $otherChannels,
  ) {}

  //
  // -- GETTER
  //

  /**
   * @return ?int
   */
  public function getStockWarehouse(): ?int {
    return $this->stockWarehouse;
  }

  /**
   * @return ?int
   */
  public function getStockWithInbound(): ?int {
    return $this->stockWithInbound;
  }

  /**
   * @return bool
   */
  public function isStockSyncActive(): bool {
    return $this->stockSyncActive;
  }

  /**
   * @return ?DateTimeImmutable
   */
  public function getStockUpdatedAt(): ?DateTimeImmutable {
    return $this->stockUpdatedAt;
  }

  /**
   * @return ?DateTimeImmutable
   */
  public function getStockSyncedAt(): ?DateTimeImmutable {
    return $this->stockSyncedAt;
  }

  /**
   * @return ?int
   */
  public function getSuggestedPrice(): ?int {
    return $this->suggestedPrice;
  }

  /**
   * @return ?DateTimeImmutable
   */
  public function getSuggestedPriceUpdatedAt(): ?DateTimeImmutable {
    return $this->suggestedPriceUpdatedAt;
  }

  /**
   * @return ?DateTimeImmutable
   */
  public function getSuggestedPriceSyncedAt(): ?DateTimeImmutable {
    return $this->suggestedPriceSyncedAt;
  }

  /**
   * @return ?string
   */
  public function getMoewareURL(): ?string {
    return $this->moewareURL;
  }

  /**
   * @return bool
   */
  public function isShopSyncActive(): bool {
    return $this->shopSyncActive;
  }

  /**
   * @return ?DateTimeImmutable
   */
  public function getShopSyncedAt(): ?DateTimeImmutable {
    return $this->shopSyncedAt;
  }

  /**
   * @return ProductLinkInfo
   */
  public function getInfo(): ProductLinkInfo {
    return $this->info;
  }

  /**
   * @return ?Article
   */
  public function getArticle(): ?Article {
    return $this->article;
  }

  /**
   * @return ?Set
   */
  public function getSet(): ?Set {
    return $this->set;
  }

  /**
   * @return ProductLinkRelationStatusChannel[]
   */
  public function getOtherChannels(): array {
    return $this->otherChannels;
  }

  //
  // -- HELPER
  //

  /**
   * @param array{
   *     stockWarehouse: int | null,
   *     stockWithInbound: int| null,
   *     stockSyncActive: bool,
   *     stockUpdatedAt: string| null,
   *     stockSyncedAt: string| null,
   *     suggestedPrice: int| null,
   *     suggestedPriceUpdatedAt: string| null,
   *     suggestedPriceSyncedAt: string| null,
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
   *             lang: string,
   *             value: string,
   *         },
   *         title2: array{
   *             lang: string,
   *             value: string,
   *         },
   *         title3: array{
   *             lang: string,
   *             value: string,
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
   *         title1: array{
   *             lang: string,
   *             value: string,
   *         },
   *         title2: array{
   *             lang: string,
   *             value: string,
   *         },
   *         title3: array{
   *             lang: string,
   *             value: string,
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
  public static function fromArray(array $data): self {
    return new self(
      $data['stockWarehouse'] ?? NULL,
      $data['stockWithInbound'] ?? NULL,
      ((bool) $data['stockSyncActive']),
      DateTimeImmutable::createFromFormat(
        DateTimeInterface::RFC3339,
        $data['stockUpdatedAt'] ?? '',
        new DateTimeZone('UTC'),
      ) ?: NULL,
      DateTimeImmutable::createFromFormat(
        DateTimeInterface::RFC3339,
        $data['stockSyncedAt'] ?? '',
        new DateTimeZone('UTC'),
      ) ?: NULL,
      $data['suggestedPrice'],
      DateTimeImmutable::createFromFormat(
        DateTimeInterface::RFC3339,
        $data['suggestedPriceUpdatedAt'] ?? '',
        new DateTimeZone('UTC'),
      ) ?: NULL,
      DateTimeImmutable::createFromFormat(
        DateTimeInterface::RFC3339,
        $data['suggestedPriceSyncedAt'] ?? '',
        new DateTimeZone('UTC'),
      ) ?: NULL,
      $data['moewareURL'] ?? NULL,
      ((bool) $data['shopSyncActive']),
      DateTimeImmutable::createFromFormat(
        DateTimeInterface::RFC3339,
        $data['shopSyncedAt'] ?? '',
        new DateTimeZone('UTC'),
      ) ?: NULL,
      ProductLinkInfo::fromArray($data['info']),
      $data['article'] ? Article::fromArray($data['article']) : NULL,
      $data['set'] ? Set::fromArray($data['set']) : NULL,
      array_map(
        [ProductLinkRelationStatusChannel::class, 'fromArray'],
        $data['otherChannels']
      )
    );
  }

}
