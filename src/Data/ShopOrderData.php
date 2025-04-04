<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

use Wohnparc\Moeware\Data\ShopOrderHead;
use Wohnparc\Moeware\Data\ShopOrderPart;

/**
 * @phpstan-import-type ShopOrderHeadPayload from \Wohnparc\Moeware\Data\ShopOrderHead
 * @phpstan-import-type ShopOrderPartPayload from \Wohnparc\Moeware\Data\ShopOrderPart
 *
 * @phpstan-type ShopOrderDataPayload array{
 *     head: ShopOrderHeadPayload,
 *     parts: list<ShopOrderPartPayload>
 * }
 */
final class ShopOrderData
{
    /**
     * @param ShopOrderHead $head
     * @param ShopOrderPart[] $parts
     */
    public function __construct(
        private ShopOrderHead $head,
        private array $parts
    ) {
    }

    /**
     * @return ShopOrderHead
     */
    public function getHead(): ShopOrderHead
    {
        return $this->head;
    }

    /**
     * @return ShopOrderPart[]
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * @phpstan-param ShopOrderDataPayload $data
     * @param mixed $data
     */
    public static function fromArray($data): self
    {
        return new self(
            ShopOrderHead::fromArray($data['head']),
            array_map([ShopOrderPart::class, 'fromArray'], $data['parts'])
        );
    }
}
