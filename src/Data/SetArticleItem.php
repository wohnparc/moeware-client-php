<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class SetArticleItem
{
    /**
     * SetArticleItem constructor.
     *
     * @param ArticleRef $article
     * @param int $numberOfPieces
     */
    public function __construct(
        private ArticleRef $article,
        private int $numberOfPieces,
    ) {
    }

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
     * @return array{
     *     article: array{
     *         baseID: int,
     *         variantID: int,
     *     },
     *     numberOfPieces: int,
     * }
     */
    public function toArray(): array
    {
        return [
            'article' => $this->article->toArray(),
            'numberOfPieces' => $this->numberOfPieces,
        ];
    }

    /**
     * @param array{
     *     article: array{
     *         baseID: int,
     *         variantID: int,
     *     },
     *     numberOfPieces: int,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            ArticleRef::fromArray($data['article']),
            (int)($data['numberOfPieces']),
        );
    }

    /**
     * @return callable(static): array{
     *     article: array{
     *         baseID: int,
     *         variantID: int,
     *     },
     *     numberOfPieces: int,
     * }
     */
    public static function mapToArray(): callable
    {
        return static function (self $self): array {
            return $self->toArray();
        };
    }
}
