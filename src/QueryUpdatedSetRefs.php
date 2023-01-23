<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use DateTimeInterface;
use Wohnparc\Moeware\Data\SetRef;
use Wohnparc\Moeware\Util\Util;

final class QueryUpdatedSetRefs extends Query {

    /**
     * QueryUpdatedSetRefs constructor.
     *
     * @param SetRef[] $setRefs
     */
    public function __construct(
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
        $self = new self([]);

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    //
    // -- GETTER
    //

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
     *     queryUpdatedSetRefs: array{
     *         updatedSetRefs: array{
     *             baseID: int,
     *             variantID: int,
     *         }[],
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        $data = $data['queryUpdatedSetRefs'];

        return new self(
            array_map([SetRef::class, 'fromArray'], $data['updatedSetRefs'])
        );
    }

    /**
     * @return string
     */
    public static function query(): string {
        return <<<'GQL'
        query queryUpdatedSetRefs($since: Time!) {
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
