<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use DateTimeInterface;
use Wohnparc\Moeware\Data\SetRef;
use Wohnparc\Moeware\Util\Util;

final class QueryUpdatedSetRefs extends Query {

    /**
     * @var SetRef[]
     */
    private array $setRefs;

    /**
     * QueryUpdatedSetRefs constructor.
     *
     * @param SetRef[] $setRefs
     */
    public function __construct(array $setRefs)
    {
        parent::__construct([]);

        $this->setRefs = $setRefs;
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
     * @return SetRef[]
     */
    final public function getSetRefs(): array {
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
        $data = $data['queryUpdatedSetRefs'];

        return new self(
            array_map(SetRef::mapFromArray(), $data['updatedSetRefs'] ?? [])
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
     * @return array<string, mixed>
     */
    public static function variables(DateTime $since): array {
        return [
            'since' => Util::toRawDate($since),
        ];
    }

}
