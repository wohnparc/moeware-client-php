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
     * @param array<string, mixed> $errors
     *
     * @return static
     */
    public static function withErrors(array $errors): self {
        $self = self::fromArray([]);

        $self->errors = array_map(GraphQLError::mapFromArray(), $errors);

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
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            array_map(ArticleRef::mapFromArray(), $data['updatedArticleRefs'] ?? []),
            array_map(SetRef::mapFromArray(), $data['updatedSetRefs'] ?? []),
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
     * @return array<string, mixed>
     */
    public static function variables(DateTime $since): array {
        return [
            'since' => Util::toRawDate($since),
        ];
    }

}
