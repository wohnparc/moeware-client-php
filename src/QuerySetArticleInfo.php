<?php

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\SetArticle;
use Wohnparc\Moeware\Data\SetArticleRef;

class QuerySetArticleInfo extends Query {

    /**
     * @var string
     */
    private string $status;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var SetArticle[]
     */
    private array $setArticles;

    /**
     * @var SetArticle[]
     */
    private array $invalidSetArticles;

    /**
     * GetSetArticleInfo constructor.
     *
     * @param string $status
     * @param string $message
     * @param SetArticle[] $setArticles
     * @param SetArticle[] $invalidSetArticles
     */
    public function __construct(
        string $status,
        string $message,
        array $setArticles,
        array $invalidSetArticles
    )
    {
        parent::__construct([]);

        $this->status = $status;
        $this->message = $message;
        $this->setArticles = $setArticles;
        $this->invalidSetArticles = $invalidSetArticles;
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
     * @return string
     */
    final public function getStatus(): string {
        return $this->status;
    }

    /**
     * @return string
     */
    final public function getMessage(): string {
        return $this->message;
    }

    /**
     * @return array
     */
    final public function getSetArticles(): array {
        return $this->setArticles;
    }

    /**
     * @return array
     */
    final public function getInvalidSetArticles(): array {
        return $this->invalidSetArticles;
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
        $data = $data['querySetArticleInfo'];

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
        query queryArticleInfo($refs: [InputArticleRef!]!) {
          articleInfo(refs: $refs) {
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
            }
          }
        }
        GQL;
    }

    /**
     * @param SetArticleRef[] $refs
     *
     * @return array
     */
    public static function variables(array $refs): array {
        return [
            'refs' => array_map(SetArticleRef::mapToArray(), $refs),
        ];
    }

}
