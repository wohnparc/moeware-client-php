<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Wohnparc\Moeware\Data\ShopMoeveAvailability;

final class QueryShopCheckMoeveAvailability extends Query
{
    /**
     * @param ShopMoeveAvailability $availability
     */
    public function __construct(
        private ShopMoeveAvailability $availability
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
        $self = new self(ShopMoeveAvailability::fromArray([
            'available' => false,
            'unavailabilityReason' => null,
            'activeDowntime' => null,
        ]));

        $self->errors = array_map([GraphQLError::class, 'fromArray'], $errors);

        return $self;
    }

    //
    // -- GETTER
    //

    /**
     * @return ShopMoeveAvailability
     */
    public function getAvailability(): ShopMoeveAvailability
    {
        return $this->availability;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     shopCheckMoeveAvailability: array{
     *         available: bool,
     *         unavailabilityReason: string|null,
     *         activeDowntime: array{
     *             id: string,
     *             type: string,
     *             startedAt: string,
     *             endsAt: string,
     *         }|null,
     *     },
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            ShopMoeveAvailability::fromArray($data['shopCheckMoeveAvailability']),
        );
    }

    /**
     * @return string
     */
    public static function query(): string
    {
        return <<<'GQL'
        query shopCheckMoeveAvailability {
          shopCheckMoeveAvailability {
            available
            unavailabilityReason
            activeDowntime {
              id
              type
              startedAt
              endsAt
            }
          }
        }
        GQL;
    }
}
