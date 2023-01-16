<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Article {

    /**
     * @var string
     */
    private string $id;

    /**
     * @var ArticleRef
     */
    private ArticleRef $ref;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var Stock[]
     */
    private array $stock;

    /**
     * @var int|null
     */
    private ?int $calculatedInventoryPrice;

    /**
     * Article constructor.
     *
     * @param string $id
     * @param ArticleRef $ref
     * @param string $title
     * @param string $description
     * @param Stock[] $stock
     * @param int|null $calculatedInventoryPrice
     */
    public function __construct(
        string $id,
        ArticleRef $ref,
        string $title,
        string $description,
        array $stock,
        ?int $calculatedInventoryPrice
    )
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->title = $title;
        $this->description = $description;
        $this->stock = $stock;
        $this->calculatedInventoryPrice = $calculatedInventoryPrice;
    }


    /**
     * Returns the ID for the article.
     *
     * @return string
     */
    final public function getId(): string {
        return $this->id;
    }

    /**
     * Returns the external reference of the article.
     *
     * @return ArticleRef
     */
    final public function getRef(): ArticleRef {
        return $this->ref;
    }

    /**
     * Returns the title of the article.
     *
     * @return string
     */
    final public function getTitle(): string {
        return $this->title;
    }

    /**
     * Returns the description of the article.
     *
     * @return string
     */
    final public function getDescription(): string {
        return $this->description;
    }

    /**
     * Returns the current stock data of the article.
     *
     * @return Stock[]
     */
    final public function getStock(): array {
        return $this->stock;
    }

    /**
     * Returns the calculated inventory price for the article.
     * If no price could be calculated, null is returned.
     *
     * @return int|null
     */
    final public function getCalculatedInventoryPrice(): ?int {
        return $this->calculatedInventoryPrice;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            (string)($data['id'] ?? ""),
            ArticleRef::fromArray($data['ref'] ?? []),
            (string)($data['title'] ?? ""),
            (string)($data['description'] ?? ""),
            array_map(Stock::mapFromArray(), $data['stock'] ?? []),
            (
                isset($data['calculatedInventoryPrice'])
                    ? (int)$data['calculatedInventoryPrice']
                    : null
            ),
        );
    }

    /**
     * @return callable
     */
    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
