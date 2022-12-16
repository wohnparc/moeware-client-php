<?php

namespace Wohnparc\Moeware;

use DateTime;
use DateTimeInterface;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetRef;
use Wohnparc\Moeware\Util\Util;

class QueryUpdatedArticleAndSetRefs extends Query {

    /**
     * @var ArticleRef[]
     */
    private array $articleRefs;

    /**
     * @var SetRef[]
     */
    private array $setRefs;

    /**
     * QueryUpdatedArticleAndSetRefs constructor.
     *
     * @param ArticleRef[] $articleRefs
     * @param SetRef[] $setRefs
     */
    public function __construct(
        array $articleRefs,
        array $setRefs
    )
    {
        parent::__construct([]);

        $this->articleRefs = $articleRefs;
        $this->setRefs = $setRefs;
    }

    /**
     * @param array $errors
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
    final public function getArticleRefs(): array {
        return $this->articleRefs;
    }

    /**
     * @return SetRef[]
     */
    final public function getSetRefs(): array {
        return $this->setRefs;
    }

    //
    // -- HELPER
    //

    /**
     * @param array $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        $data = $data['queryUpdatedArticleAndSetRefs'];

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
     * @return array
     */
    public static function variables(DateTime $since): array {
        return [
            'since' => Util::toRawDate($since),
        ];
    }

}
