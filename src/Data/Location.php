<?php declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class Location {

    /**
     * @var string
     */
    private string $code;

    /**
     * @var int
     */
    private int $number;

    /**
     * Location constructor.
     *
     * @param string $code
     * @param int $number
     */
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

    /**
     * @param array<string, mixed> $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            (string)($data['code'] ?? ""),
            (int)($data['number'] ?? 0)
        );
    }

    /**
     * @return callable
     */
    public static function mapFromArray(): callable {
        return static function(array $data): self {
            return self::fromArray($data);
        };
    }

}
