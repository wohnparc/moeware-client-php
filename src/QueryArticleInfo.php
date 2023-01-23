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
     * @param string|null $message
     * @param Article[] $articles
     * @param ArticleRef[] $unknownArticles
     */
    public function __construct(
        private string $status,
        private ?string $message,
        private array $articles,
        private array $unknownArticles
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
        $self = new self('', null, [], []);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

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
     * @return string|null
     */
    public function getMessage(): ?string {
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
     * @param array{
     *     articleInfo: array{
     *         status: string,
     *         message: ?string,
     *         articles: array{
     *             id: string,
     *             ref: array{
     *                 baseID: int,
     *                 variantID: int,
     *             },
     *             title: string,
     *             description: string,
     *             stock: array{
     *                 location: array{
     *                     code: string,
     *                     number: int,
     *                 },
     *                 quantity: int,
     *                 expectedAt: ?string,
     *             }[],
     *             calculatedInventoryPrice: ?int,
     *         }[],
     *         unknownArticles: array{
     *             baseID: int,
     *             variantID: int,
     *         }[],
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        $data = $data['articleInfo'];

        return new self(
            (string)($data['status']),
            (
                $data['message']
                    ? (string)$data['message']
                    : null
            ),
            array_map([Article::class, 'fromArray'], $data['articles']),
            array_map([ArticleRef::class, 'fromArray'], $data['unknownArticles']),
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
     * @return array{
     *     refs: array{
     *         baseID: int,
     *         variantID: int,
     *     }[],
     * }
     */
    public static function variables(array $refs): array {
        return [
            'refs' => array_map(ArticleRef::mapToArray(), $refs),
        ];
    }

}
