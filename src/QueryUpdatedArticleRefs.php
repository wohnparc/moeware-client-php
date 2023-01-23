<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Util\Util;

final class QueryUpdatedArticleRefs extends Query
{
    /**
     * @param ArticleRef[] $articleRefs
     */
    public function __construct(
        private array $articleRefs
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
        $self = new self([]);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    //
    // -- GETTER
    //

    /**
     * @return ArticleRef[]
     */
    public function getArticleRefs(): array
    {
        return $this->articleRefs;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     queryUpdatedArticleRefs: array{
     *         updatedArticleRefs: array{
     *             baseID: int,
     *             variantID: int,
     *         },
     *     }[],
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        $data = $data['queryUpdatedArticleRefs'];

        return new self(
            array_map([ArticleRef::class, 'fromArray'], $data['updatedArticleRefs'])
        );
    }

    /**
     * @return string
     */
    public static function query(): string
    {
        return <<<'GQL'
        query queryUpdatedArticleRefs($since: Time!) {
          updatedArticleRefs(since: $since) {
            baseID
            variantID
          }
        }
        GQL;
    }

    /**
     * @param DateTime $since
     *
     * @return array{
     *     since: string,
     * }
     */
    public static function variables(DateTime $since): array
    {
        return [
            'since' => Util::toRawDate($since),
        ];
    }
}
