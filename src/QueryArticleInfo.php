<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use DateTimeInterface;
use Wohnparc\Moeware\Data\Article;
use Wohnparc\Moeware\Data\ArticleRef;

final class QueryArticleInfo extends Query {

    /**
     * GetArticleInfo constructor.
     *
     * @param string $status
     * @param string $message
     * @param Article[] $articles
     * @param ArticleRef[] $unknownArticles
     */
    public function __construct(
        private string $status,
        private string $message,
        private array $articles,
        private array $unknownArticles
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
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * @return Article[]
     */
    public function getArticles(): array {
        return $this->articles;
    }

    /**
     * @return ArticleRef[]
     */
    public function getUnknownArticles(): array {
        return $this->unknownArticles;
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
        $data = $data['articleInfo'];

        return new self(
            (string)($data['status'] ?? ''),
            (string)($data['message'] ?? ''),
            array_map(Article::mapFromArray(), $data['articles'] ?? []),
            array_map(ArticleRef::mapFromArray(), $data['unknownArticles'] ?? []),
        );
    }

    /**
     * @return string
     */
    public static function query(): string {
        return <<<'GQL'
        query queryArticleInfo($refs: [InputArticleRef!]!) {
          articleInfo(refs: $refs) {
            status
            message
            articles {
                id
                ref {
                    baseID
                    variantID
                }
                title
                description
                stock {
                    location {
                        code
                        number
                    }
                    quantity
                    expectedAt
                }
                calculatedInventoryPrice
            }
            unknownArticles {
                baseID
                variantID
            }
          }
        }
        GQL;
    }

    /**
     * @param ArticleRef[] $refs
     *
     * @return array<string, mixed>
     */
    public static function variables(array $refs): array {
        return [
            'refs' => array_map(ArticleRef::mapToArray(), $refs),
        ];
    }

}
