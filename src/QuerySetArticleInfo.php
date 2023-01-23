<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\SetArticle;
use Wohnparc\Moeware\Data\SetArticleRef;

final class QuerySetArticleInfo extends Query {

    /**
     * GetSetArticleInfo constructor.
     *
     * @param string $status
     * @param string $message
     * @param SetArticle[] $setArticles
     * @param SetArticle[] $invalidSetArticles
     */
    public function __construct(
        private string $status,
        private string $message,
        private array $setArticles,
        private array $invalidSetArticles
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
     * @return SetArticle[]
     */
    public function getSetArticles(): array {
        return $this->setArticles;
    }

    /**
     * @return SetArticle[]
     */
    public function getInvalidSetArticles(): array {
        return $this->invalidSetArticles;
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
        $data = $data['setArticleInfo'];

        return new self(
            (string)($data['status'] ?? ''),
            (string)($data['message'] ?? ''),
            array_map(SetArticle::mapFromArray(), $data['setArticles'] ?? []),
            array_map(SetArticle::mapFromArray(), $data['invalidSetArticles'] ?? []),
        );
    }

    /**
     * @return string
     */
    public static function query(): string {
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
     * @return array<string, mixed>
     */
    public static function variables(array $refs): array {
        return [
            'refs' => array_map(SetArticleRef::mapToArray(), $refs),
        ];
    }

}
