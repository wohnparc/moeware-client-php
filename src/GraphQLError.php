<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

final class GraphQLError {

    /**
     * @var string
     */
    private string $message;

    /**
     * @var string[]
     */
    private array $path;

    /**
     * Error constructor.
     *
     * @param string $message
     * @param string[] $path
     */
    public function __construct(
        string $message,
        array $path
    )
    {
        $this->message = $message;
        $this->path = $path;
    }

    /**
     * @return string
     */
    final public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string[]
     */
    final public function getPath(): array
    {
        return $this->path;
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
        return new self(
            (string)($data['message'] ?? ''),
            array_map(
                static function ($data): string {
                    return (string)$data;
                },
                $data['path'] ?? [],
            )
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
