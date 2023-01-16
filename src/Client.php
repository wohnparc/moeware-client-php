<?php declare(strict_types=1);

namespace Wohnparc\Moeware;

use DateTime;
use Softonic\GraphQL\ClientBuilder;
use Softonic\GraphQL\Client as GQLClient;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetArticleRef;

class Client {

    /**
     * @var GQLClient
     */
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

    /**
     * @param DateTime $since
     *
     * @return QueryUpdatedArticleRefs|null
     */
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

    /**
     * @param DateTime $since
     *
     * @return QueryUpdatedSetRefs|null
     */
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

    /**
     * @param DateTime $since
     *
     * @return QueryUpdatedArticleAndSetRefs|null
     */
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
     * Executes a QueryArticleInfo request to the GraphQL API and returns a mapped object.
     *
     * Note: It automatically splits the ArticleRef array input into chunks
     * and performs multiple requests if necessary to prevent the response
     * from being too big. The result will still be a single QueryArticleInfo
     * object which contains the data from all the requests.
     *
     * @param ArticleRef[] $refs
     *
     * @return QueryArticleInfo
     */
    final public function queryArticleInfo(array $refs): ?QueryArticleInfo {
        $chunks = array_chunk($refs,1000);

        /** @var QueryArticleInfo $lastResponse */
        $lastResponse = [];

        $articles = [];
        $unknownArticles = [];

        foreach ($chunks as $chunk) {
            $response = $this->client->query(
                QueryArticleInfo::query(),
                QueryArticleInfo::variables($chunk),
            );

            if ($response->hasErrors()) {
                return QueryArticleInfo::withErrors($response->getErrors());
            }

            $lastResponse = QueryArticleInfo::fromArray($response->getData());

            $articles[] = $lastResponse->getArticles();
            $unknownArticles[] = $lastResponse->getUnknownArticles();
        }

        return new QueryArticleInfo(
            $lastResponse->getStatus(),
            $lastResponse->getMessage(),
            array_merge(...$articles),
            array_merge(...$unknownArticles),
        );
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
