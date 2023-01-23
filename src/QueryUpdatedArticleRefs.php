<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use DateTimeInterface;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Util\Util;

final class QueryUpdatedArticleRefs extends Query {

    /**
     * @param ArticleRef[] $articleRefs
     */
    public function __construct(
        private array $articleRefs
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

    //
    // -- HELPER
    //

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        $data = $data['queryUpdatedArticleRefs'];

        return new self(
            array_map(ArticleRef::mapFromArray(), $data['updatedArticleRefs'] ?? [])
        );
    }

    /**
     * @return string
     */
    public static function query(): string {
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
     * @return array<string, mixed>
     */
    public static function variables(DateTime $since): array {
        return [
            'since' => Util::toRawDate($since),
        ];
    }

}
