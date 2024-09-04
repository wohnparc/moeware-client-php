<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Set {

  public function getItems(): SetArticleItem {
    return $this->items;
  }

  public function setItems(SetArticleItem $items): void {
    $this->items = $items;
  }

  /**
   * Set constructor.
   *
   * @param string $id
   * @param SetRef $ref
   * @param LocalizedText $title1
   * @param LocalizedText $title2
   * @param LocalizedText $title3
   * @param string $manufacturer
   * @param bool $pseudoStockEnabled
   * @param int $pseudoStockCount
   * @param SetArticleItem $items
   */
  public function __construct(
    private string $id,
    private SetRef $ref,
    private LocalizedText $title1,
    private LocalizedText $title2,
    private LocalizedText $title3,
    private string $manufacturer,
    private bool $pseudoStockEnabled,
    private int $pseudoStockCount,
    private SetArticleItem $items,

  ) {}

  //
  // -- GETTER
  //

  /**
   * @return string
   */
  public function getId(): string {
    return $this->id;
  }

  /**
   * @return SetRef
   */
  public function getRef(): SetRef {
    return $this->ref;
  }

  /**
   * @return LocalizedText
   */
  public function getTitle1(): LocalizedText {
    return $this->title1;
  }

  /**
   * @return LocalizedText
   */
  public function getTitle2(): LocalizedText {
    return $this->title2;
  }

  /**
   * @return LocalizedText
   */
  public function getTitle3(): LocalizedText {
    return $this->title3;
  }

  /**
   * @return string
   */
  public function getManufacturer(): string {
    return $this->manufacturer;
  }

  /**
   * @return bool
   */
  public function getPseudoStockEnabled(): bool {
    return $this->pseudoStockEnabled;
  }

  /**
   * @return int
   */
  public function getPseudoStockCount(): int {
    return $this->pseudoStockCount;
  }

  //
  // -- HELPER
  //

  /**
   * @param array{
   *     id: string,
   *     ref: array{
   *         baseID: int,
   *         variantID: int,
   *     },
   *     title1: array{
   *         lang: string,
   *         value: string,
   *     },
   *     title2: array{
   *         lang: string,
   *         value: string,
   *     },
   *     title3: array{
   *         lang: string,
   *         value: string,
   *     },
   *     manufacturer: string,
   *     pseudoStockEnabled: bool,
   *     pseudoStockCount: int,
   *   items: array{
   *   article: array{
   *   baseID: int,
   *   variantID: int,
   *   },
   *   numberOfQuantity: int,
   *    },
   * } $data
   *
   * @return static
   */
  public static function fromArray(array $data): self {
    return new self(
      (string) $data['id'],
      SetRef::fromArray($data['ref']),
      LocalizedText::fromArray($data['title1']),
      LocalizedText::fromArray($data['title2']),
      LocalizedText::fromArray($data['title3']),
      (string) $data['manufacturer'],
      (bool) $data['pseudoStockEnabled'],
      (int) $data['pseudoStockCount'],
      SetArticleItem::fromArray($data['items']),
    );
  }

}
