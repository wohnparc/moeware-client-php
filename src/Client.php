<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use Softonic\GraphQL\ClientBuilder;
use Softonic\GraphQL\Client as GQLClient;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetArticleRef;

class Client {

    private GQLClient $client;

    /**
     * Client constructor.
     *
     * @param string $endpoint
     * @param string $api_key
     */
    public function __construct(string $endpoint, string $api_key) {
        $this->client = ClientBuilder::build($endpoint, [
            'timeout' => 0,
            'headers' => [
                'Authorization' => "BEARER $api_key"
            ],
        ]);
    }

    final public function queryUpdatedArticleRefs(DateTime $since): ?QueryUpdatedArticleRefs {
        $response = $this->client->query(
            QueryUpdatedArticleRefs::query(),
            QueryUpdatedArticleRefs::variables($since),
        );

        if ($response->hasErrors()) {
            return QueryUpdatedArticleRefs::withErrors($response->getErrors());
        }

        return QueryUpdatedArticleRefs::fromArray($response->getData());
    }

    final public function queryUpdatedSetRefs(DateTime $since): ?QueryUpdatedSetRefs {
        $response = $this->client->query(
            QueryUpdatedSetRefs::query(),
            QueryUpdatedSetRefs::variables($since),
        );

        if ($response->hasErrors()) {
            return QueryUpdatedSetRefs::withErrors($response->getErrors());
        }

        return QueryUpdatedSetRefs::fromArray($response->getData());
    }

    final public function queryUpdatedArticleAndSetRefs(DateTime $since): ?QueryUpdatedArticleAndSetRefs {
        $response = $this->client->query(
            QueryUpdatedArticleAndSetRefs::query(),
            QueryUpdatedArticleAndSetRefs::variables($since),
        );

        if ($response->hasErrors()) {
            return QueryUpdatedArticleAndSetRefs::withErrors($response->getErrors());
        }

        return QueryUpdatedArticleAndSetRefs::fromArray($response->getData());
    }

    /**
     * @param ArticleRef[] $refs
     *
     * @return QueryArticleInfo
     */
    final public function queryArticleInfo(array $refs): ?QueryArticleInfo {
        $response = $this->client->query(
            QueryArticleInfo::query(),
            QueryArticleInfo::variables($refs),
        );

        if ($response->hasErrors()) {
            return QueryArticleInfo::withErrors($response->getErrors());
        }

        return QueryArticleInfo::fromArray($response->getData());
    }

    /**
     * @param SetArticleRef[] $refs
     *
     * @return QuerySetArticleInfo
     */
    final public function querySetArticleInfo(array $refs): ?QuerySetArticleInfo {
        $response = $this->client->query(
            QuerySetArticleInfo::query(),
            QuerySetArticleInfo::variables($refs),
        );

        if ($response->hasErrors()) {
            return QuerySetArticleInfo::withErrors($response->getErrors());
        }

        return QuerySetArticleInfo::fromArray($response->getData());
    }

}
