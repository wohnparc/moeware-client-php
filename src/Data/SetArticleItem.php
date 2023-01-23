<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticleItem {

    /**
     * SetArticleItem constructor.
     *
     * @param ArticleRef $article
     * @param int $numberOfPieces
     */
    public function __construct(
        private ArticleRef $article,
        private int $numberOfPieces,
    ) {}

    //
    // -- GETTER
    //

    /**
     * Returns the article reference for this item.
     *
     * @return ArticleRef
     */
    public function getArticle(): ArticleRef
    {
        return $this->article;
    }

    /**
     * Returns the required number of pieces for this item.
     *
     * @return int
     */
    public function getNumberOfPieces(): int
    {
        return $this->numberOfPieces;
    }

    //
    // -- HELPER
    //

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array {
        return [
            'article' => $this->article->toArray(),
            'numberOfPieces' => $this->numberOfPieces,
        ];
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            ArticleRef::fromArray($data['article'] ?? []),
            (int)($data['numberOfPieces'] ?? 0),
        );
    }

    /**
     * @return callable
     */
    public static function mapToArray(): callable {
        return static function(self $self): array {
            return $self->toArray();
        };
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
