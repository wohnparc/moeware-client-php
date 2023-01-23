<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use DateTimeInterface;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetRef;
use Wohnparc\Moeware\Util\Util;

final class QueryUpdatedArticleAndSetRefs extends Query {

    /**
     * QueryUpdatedArticleAndSetRefs constructor.
     *
     * @param ArticleRef[] $articleRefs
     * @param SetRef[] $setRefs
     */
    public function __construct(
        private array $articleRefs,
        private array $setRefs
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
    public static function withErrors(array $errors): self {
        $self = new self([], []);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    //
    // -- GETTER
    //

    /**
     * @return ArticleRef[]
     */
    public function getArticleRefs(): array {
        return $this->articleRefs;
    }

    /**
     * @return SetRef[]
     */
    public function getSetRefs(): array {
        return $this->setRefs;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     updatedArticleRefs: array{
     *         baseID: int,
     *         variantID: int,
     *     }[],
     *     updatedSetRefs: array{
     *         baseID: int,
     *         variantID: int,
     *     }[],
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            array_map([ArticleRef::class, 'fromArray'], $data['updatedArticleRefs']),
            array_map([SetRef::class, 'fromArray'], $data['updatedSetRefs']),
        );
    }

    /**
     * @return string
     */
    public static function query(): string {
        return <<<'GQL'
        query queryUpdatedArticleAndSetRefs($since: Time!) {
          updatedArticleRefs(since: $since) {
            baseID
            variantID
          }
          updatedSetRefs(since: $since) {
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
    public static function variables(DateTime $since): array {
        return [
            'since' => Util::toRawDate($since),
        ];
    }

}
