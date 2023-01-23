<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

final class GraphQLError {

    /**
     * Error constructor.
     *
     * @param string $message
     * @param string[] $path
     */
    public function __construct(
        private string $message,
        private array $path
    ) {}

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string[]
     */
    public function getPath(): array
    {
        return $this->path;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     message: string,
     *     path: string[],
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self {
        return new self(
            (string)($data['message']),
            array_map(
                static function ($data): string {
                    return (string)$data;
                },
                $data['path'],
            )
        );
    }

}
