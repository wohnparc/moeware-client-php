<?php

declare(strict_types=1);

namespace Wohnparc\Moeware\Data;

final class ProductLinkRelationStatusChannel
{
    /**
     * ProductLinkRelationStatus constructor.
     *
     * @param string $channelID
     * @param string $domainIconURL
     * @param string $platformIconURL
     */
    public function __construct(
        private string $channelID,
        private string $domainIconURL,
        private string $platformIconURL,
    ) {}

    //
    // -- GETTER
    //

    /**
     * @return string
     */
    public function getChannelID(): string
    {
        return $this->channelID;
    }

    /**
     * @return string
     */
    public function getDomainIconURL(): string
    {
        return $this->domainIconURL;
    }

    /**
     * @return string
     */
    public function getPlatformIconURL(): string
    {
        return $this->platformIconURL;
    }

    //
    // -- HELPER
    //

    /**
     * @param array{
     *     channelID: string,
     *     domainIconURL: string,
     *     platformIconURL: string,
     * } $data
     *
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (string)($data['channelID']),
            (string)($data['domainIconURL']),
            (string)($data['platformIconURL']),
        );
    }
}
