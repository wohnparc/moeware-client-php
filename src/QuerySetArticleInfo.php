<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\SetArticle;
use Wohnparc\Moeware\Data\SetArticleRef;

final class QuerySetArticleInfo extends Query
{
    /**
     * GetSetArticleInfo constructor.
     *
     * @param string $status
     * @param string|null $message
     * @param SetArticle[] $setArticles
     * @param SetArticle[] $invalidSetArticles
     */
    public function __construct(
        private string $status,
        private ?string $message,
        private array $setArticles,
        private array $invalidSetArticles
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return SetArticle[]
     */
    public function getSetArticles(): array
    {
        return $this->setArticles;
    }

    /**
     * @return SetArticle[]
     */
    public function getInvalidSetArticles(): array
    {
        return $this->invalidSetArticles;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     setArticleInfo: array{
     *         status: string,
     *         message: ?string,
     *         setArticles: array{
     *             set: array{
     *                 baseID: int,
     *                 variantID: int,
     *             },
     *             items: array{
     *                 article: array{
     *                     baseID: int,
     *                     variantID: int,
     *                 },
     *                 numberOfPieces: int,
     *             }[],
     *             calculatedInventoryPrice: ?int,
     *         }[],
     *         invalidSetArticles: array{
     *             set: array{
     *                 baseID: int,
     *                 variantID: int,
     *             },
     *             items: array{
     *                 article: array{
     *                     baseID: int,
     *                     variantID: int,
     *                 },
     *                 numberOfPieces: int,
     *             }[],
     *             calculatedInventoryPrice: ?int,
     *         }[],
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        $data = $data['setArticleInfo'];

        return new self(
            (string)($data['status']),
            (
                $data['message']
                    ? (string)$data['message']
                    : null
            ),
            array_map([SetArticle::class, 'fromArray'], $data['setArticles']),
            array_map([SetArticle::class, 'fromArray'], $data['invalidSetArticles']),
        );
    }

    /**
     * @return string
     */
    public static function query(): string
    {
        return <<<'GQL'
        query querySetArticleInfo($refs: [InputSetArticleRef!]!) {
          setArticleInfo(refs: $refs) {
            status
            message
            setArticles {
                set {
                    baseID
                    variantID
                }
                items {
                    article {
                        baseID
                        variantID
                    }
                    numberOfPieces
                }
                calculatedInventoryPrice
            }
            invalidSetArticles {
                set {
                    baseID
                    variantID
                }
                items {
                    article {
                        baseID
                        variantID
                    }
                    numberOfPieces
                }
                calculatedInventoryPrice
            }
          }
        }
        GQL;
    }

    /**
     * @param SetArticleRef[] $refs
     *
     * @return array{
     *     refs: array{
     *         set: array{
     *             baseID: int,
     *             variantID: int,
     *         },
     *         items: array{
     *             article: array{
     *                 baseID: int,
     *                 variantID: int,
     *             },
     *             numberOfPieces: int,
     *         }[],
     *     }[],
     * }
     */
    public static function variables(array $refs): array
    {
        return [
            'refs' => array_map(SetArticleRef::mapToArray(), $refs),
        ];
    }
}
