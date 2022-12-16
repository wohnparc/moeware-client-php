<?php

namespace Wohnparc\Moeware\Data;

class Location {

    /**
     * @var string
     */
    private string $code;

    /**
     * @var int
     */
    private int $number;

    public function __construct(string $code, int $number) {
        $this->code = $code;
        $this->number = $number;
    }

    /**
     * @return string
     */
    final public function getCode(): string {
        return $this->code;
    }

    /**
     * @return int
     */
    final public function getNumber(): int {
        return $this->number;
    }

    public static function fromArray(array $data): self {
        return new self(
            (string)($data['code'] ?? ""),
            (int)($data['number'] ?? 0)
        );
    }

    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
