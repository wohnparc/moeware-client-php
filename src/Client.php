<?php

declare(strict_types=1);

namespace Wohnparc\Moeware;

use Composer\InstalledVersions;
use DateTime;
use GuzzleHttp\RequestOptions;
use Softonic\GraphQL\ClientBuilder;
use Softonic\GraphQL\Client as GQLClient;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetArticleRef;

class Client
{
    /**
     * @var GQLClient
     */
    private GQLClient $client;

    /**
     * Client constructor.
     *
     * @param string $endpoint
     * @param string $key
     * @param string $secret
     */
    public function __construct(string $endpoint, string $key, string $secret)
    {
        $package = InstalledVersions::getRootPackage();
        $version = $package['version'];

        $this->client = ClientBuilder::build($endpoint, [
            RequestOptions::TIMEOUT => 0,
            RequestOptions::HEADERS => [
                'X-API-Key' => $key,
                'Authorization' => "BEARER $secret",
                'User-Agent' => "Moeware PHP Client v$version",
            ],
        ]);
    }

    /**
     * @param DateTime $since
     *
     * @return QueryUpdatedArticleRefs|null
     */
    final public function queryUpdatedArticleRefs(DateTime $since): ?QueryUpdatedArticleRefs
    {
        $response = $this->client->query(
            QueryUpdatedArticleRefs::query(),
            QueryUpdatedArticleRefs::variables($since),
        );

        if ($response->hasErrors()) {
            return QueryUpdatedArticleRefs::withErrors($response->getErrors());
        }

        /**
         * @var array{
         *     updatedArticleRefs: array{
         *         baseID: int,
         *         variantID: int,
         *     }[],
         * } $data
         */
        $data = $response->getData();

        return QueryUpdatedArticleRefs::fromArray($data);
    }

    /**
     * NOTE: This does currently not work correctly for the GACO domain,
     * due to deleted main set articles in Moeve.
     *
     * @param DateTime $since
     *
     * @return QueryUpdatedSetRefs|null
     */
    final public function queryUpdatedSetRefs(DateTime $since): ?QueryUpdatedSetRefs
    {
        $response = $this->client->query(
            QueryUpdatedSetRefs::query(),
            QueryUpdatedSetRefs::variables($since),
        );

        if ($response->hasErrors()) {
            return QueryUpdatedSetRefs::withErrors($response->getErrors());
        }

        /**
         * @var array{
         *     updatedSetRefs: array{
         *         baseID: int,
         *         variantID: int,
         *     }[],
         * } $data
         */
        $data = $response->getData();

        return QueryUpdatedSetRefs::fromArray($data);
    }

    /**
     * @param DateTime $since
     *
     * @return QueryUpdatedArticleAndSetRefs|null
     *
     * @deprecated updated set refs does not work correctly for GACO. Please use
     * updated article refs via the queryUpdatedArticleRefs call instead.
     */
    final public function queryUpdatedArticleAndSetRefs(DateTime $since): ?QueryUpdatedArticleAndSetRefs
    {
        $response = $this->client->query(
            QueryUpdatedArticleAndSetRefs::query(),
            QueryUpdatedArticleAndSetRefs::variables($since),
        );

        if ($response->hasErrors()) {
            return QueryUpdatedArticleAndSetRefs::withErrors($response->getErrors());
        }

        /**
         * @var array{
         *     updatedArticleRefs: array{
         *         baseID: int,
         *         variantID: int,
         *     }[],
         *     updatedSetRefs: array{
         *         baseID: int,
         *         variantID: int,
         *     }[],
         * } $data
         */
        $data = $response->getData();

        return QueryUpdatedArticleAndSetRefs::fromArray($data);
    }

    /**
     * Executes a QueryArticleInfo request to the GraphQL API and returns a
     * mapped object.
     *
     * Note: It automatically splits the ArticleRef array input into chunks
     * and performs multiple requests if necessary to prevent the response
     * from being too big. The result will still be a single QueryArticleInfo
     * object which contains the data from all the requests.
     *
     * @param ArticleRef[] $refs
     *
     * @return QueryArticleInfo|null
     */
    final public function queryArticleInfo(array $refs): ?QueryArticleInfo
    {
        $chunks = [$refs];

        if (count($refs) > 1000) {
            $chunks = array_chunk($refs, 1000);
        }

        /** @var QueryArticleInfo|null $lastResponse */
        $lastResponse = null;

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

            /**
             * @var array{
             *     articleInfo: array{
             *         status: string,
             *         message: ?string,
             *         articles: array{
             *             id: string,
             *             ref: array{
             *                 baseID: int,
             *                 variantID: int,
             *             },
             *             title1: array{
             *              array{
             *                lang: string,
             *                value: string,
             *              },
             *             },
             *             title2: array{
             *               array{
             *                 lang: string,
             *                 value: string,
             *               },
             *             },
             *             title3: array{
             *               array{
             *                 lang: string,
             *                 value: string,
             *               },
             *             },
             *             manufacturer: string,
             *             pseudoStockEnabled: bool,
             *             pseudoStockCount: int,
             *             stock: array{
             *                 location: array{
             *                     code: string,
             *                     number: int,
             *                 },
             *                 quantity: int,
             *                 expectedAt: ?string,
             *             }[],
             *             prices: array{
             *                 recommendedRetailPrice: ?int,
             *                 advertisingPrice: ?int,
             *                 calculationPrice: ?int,
             *             },
             *         }[],
             *         unknownArticles: array{
             *             baseID: int,
             *             variantID: int,
             *         }[],
             *     },
             * } $data
             */
            $data = $response->getData();

            $lastResponse = QueryArticleInfo::fromArray($data);

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
     * Executes a QuerySetArticleInfo request to the GraphQL API and returns a
     * mapped object.
     *
     * Note: It automatically splits the SetArticleRef array input into chunks
     * and performs multiple requests if necessary to prevent the response
     * from being too big. The result will still be a single QuerySetArticleInfo
     * object which contains the data from all the requests.
     *
     * @param SetArticleRef[] $refs
     *
     * @return QuerySetArticleInfo|null
     */
    final public function querySetArticleInfo(array $refs): ?QuerySetArticleInfo
    {
        $chunks = [$refs];

        if (count($refs) > 1000) {
            $chunks = array_chunk($refs, 1000);
        }

        /** @var QuerySetArticleInfo|null $lastResponse */
        $lastResponse = null;

        $setArticles = [];
        $invalidSetArticles = [];

        foreach ($chunks as $chunk) {
            $response = $this->client->query(
                QuerySetArticleInfo::query(),
                QuerySetArticleInfo::variables($chunk),
            );

            if ($response->hasErrors()) {
                return QuerySetArticleInfo::withErrors($response->getErrors());
            }

            /**
             * @var array{
             *     setArticleInfo: array{
             *         status: string,
             *         message: ?string,
             *         setArticles: array{
             *             set: array{
             *                 baseID: int,
             *                 variantID: int,
             *             },
             *             items: array{
             *                 article: array{
             *                     baseID: int,
             *                     variantID: int,
             *                 },
             *                 numberOfPieces: int,
             *             }[],
             *             prices: array{
             *                 recommendedRetailPrice: ?int,
             *                 advertisingPrice: ?int,
             *                 calculationPrice: ?int,
             *             },
             *         }[],
             *         invalidSetArticles: array{
             *             set: array{
             *                 baseID: int,
             *                 variantID: int,
             *             },
             *             items: array{
             *                 article: array{
             *                     baseID: int,
             *                     variantID: int,
             *                 },
             *                 numberOfPieces: int,
             *             }[],
             *         }[],
             *     },
             * } $data
             */
            $data = $response->getData();

            $lastResponse = QuerySetArticleInfo::fromArray($data);

            $setArticles[] = $lastResponse->getSetArticles();
            $invalidSetArticles[] = $lastResponse->getInvalidSetArticles();
        }

        return new QuerySetArticleInfo(
            $lastResponse->getStatus(),
            $lastResponse->getMessage(),
            array_merge(...$setArticles),
            array_merge(...$invalidSetArticles),
        );
    }

    final public function queryIsMoeveAvailable(): ?QueryIsMoeveAvailable
    {
        $response = $this->client->query(
            QueryIsMoeveAvailable::query(),
            QueryIsMoeveAvailable::variables(),
        );

        if ($response->hasErrors()) {
            return QueryIsMoeveAvailable::withErrors($response->getErrors());
        }

        /**
         * @var array{
         *     isMoeveAvailable: bool,
         * } $data
         */
        $data = $response->getData();

        return QueryIsMoeveAvailable::fromArray($data);
    }

    final public function queryProductLinkRelationStatus(string $externalProductRef): ?QueryProductLinkRelationStatus
    {
        $response = $this->client->query(
            QueryProductLinkRelationStatus::query(),
            QueryProductLinkRelationStatus::variables($externalProductRef),
        );

        if ($response->hasErrors()) {
            return QueryProductLinkRelationStatus::withErrors($response->getErrors());
        }

        /**
         * @var array{
         *     productLinkRelationStatus: array{
         *         externalID: string,
         *         stockWarehouse: int | null,
         *         stockWithInbound: int| null,
         *         stockSyncActive: bool,
         *         stockUpdatedAt: string| null,
         *         stockSyncedAt: string| null,
         *         priceWatch: array{
         *          enabled: bool,
         *          externalID: string|null,
         *          suggestedPrice: int| null,
         *          suggestedPriceUpdatedAt: string| null,
         *          suggestedPriceSyncedAt: string| null,
         *         },
         *         moewareURL: string| null,
         *         shopSyncActive: bool,
         *         shopSyncedAt: string | null,
         *         info: array{
         *             productNotFound: bool,
         *             productDisabled: bool,
         *             invalidSetConfig: bool,
         *             invalidSetItems: bool,
         *         },
         *         article: array{
         *             id: string,
         *             ref: array{
         *                 baseID: int,
         *                 variantID: int,
         *             },
         *             title1: array{
         *              array{
         *                lang: string,
         *                value: string,
         *              },
         *             },
         *             title2: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *             },
         *             title3: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *             },
         *             manufacturer: string,
         *             pseudoStockEnabled: bool,
         *             pseudoStockCount: int,
         *             stock: array{
         *                 location: array{
         *                     code: string,
         *                     number: int,
         *                 },
         *                 quantity: int,
         *                 expectedAt: ?string,
         *             }[],
         *             prices: array{
         *                 recommendedRetailPrice: ?int,
         *                 advertisingPrice: ?int,
         *                 calculationPrice: ?int,
         *             },
         *         } | null,
         *         set: array{
         *             id: string,
         *             ref: array{
         *                 baseID: int,
         *                 variantID: int,
         *             },
         *          items: array{
         *            article: array{
         *              baseID: int,
         *              variantID: int,
         *          },
         *          numberOfPieces: int,
         *          }[],
         *             title1: array{
         *              array{
         *                lang: string,
         *                value: string,
         *              },
         *             },
         *             title2: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *             },
         *             title3: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *             },
         *             manufacturer: string,
         *             pseudoStockEnabled: bool,
         *             pseudoStockCount: int,
         *         } | null,
         *         otherChannels: array{
         *             channelID: string,
         *             domainIconURL: string,
         *             platformIconURL: string,
         *         }[],
         *     } | null,
         * } $data
         */
        $data = $response->getData();

        return QueryProductLinkRelationStatus::fromArray($data);
    }

    final public function queryProductLinkRelationStatuses(string $externalParentProductRef): ?QueryProductLinkRelationStatuses
    {
        $response = $this->client->query(
            QueryProductLinkRelationStatuses::query(),
            QueryProductLinkRelationStatuses::variables($externalParentProductRef),
        );

        if ($response->hasErrors()) {
            return QueryProductLinkRelationStatuses::withErrors($response->getErrors());
        }

        /**
         * @var array{
         *     productLinkRelationStatuses: array{
         *         externalID: string,
         *         stockWarehouse: int | null,
         *         stockWithInbound: int| null,
         *         stockSyncActive: bool,
         *         stockUpdatedAt: string| null,
         *         stockSyncedAt: string| null,
         *          priceWatch: array{
         *            enabled: bool,
         *         externalID: string|null,
         *      suggestedPrice: int| null,
         *   suggestedPriceUpdatedAt: string| null,
         *   suggestedPriceSyncedAt: string| null,
         *          },
         *         moewareURL: string| null,
         *         shopSyncActive: bool,
         *         shopSyncedAt: string | null,
         *         info: array{
         *             productNotFound: bool,
         *             productDisabled: bool,
         *             invalidSetConfig: bool,
         *             invalidSetItems: bool,
         *         },
         *         article: array{
         *             id: string,
         *             ref: array{
         *                 baseID: int,
         *                 variantID: int,
         *             },
         *             title1: array{
         *              array{
         *                lang: string,
         *                value: string,
         *              },
         *             },
         *             title2: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *             },
         *             title3: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *             },
         *             manufacturer: string,
         *             pseudoStockEnabled: bool,
         *             pseudoStockCount: int,
         *             stock: array{
         *                 location: array{
         *                     code: string,
         *                     number: int,
         *                 },
         *                 quantity: int,
         *                 expectedAt: ?string,
         *             }[],
         *             prices: array{
         *                 recommendedRetailPrice: ?int,
         *                 advertisingPrice: ?int,
         *                 calculationPrice: ?int,
         *             },
         *         } | null,
         *         set: array{
         *             id: string,
         *             ref: array{
         *                 baseID: int,
         *                 variantID: int,
         *             },
         *          items: array{
         *            article: array{
         *              baseID: int,
         *              variantID: int,
         *            },
         *            numberOfPieces: int,
         *          }[],
         *         title1: array{
         *            array{
         *              lang: string,
         *               value: string,
         *             },
         *            },
         *            title2: array{
         *              array{
         *                lang: string,
         *                value: string,
         *               },
         *             },
         *             title3: array{
         *               array{
         *                 lang: string,
         *                 value: string,
         *               },
         *              },
         *             manufacturer: string,
         *             pseudoStockEnabled: bool,
         *             pseudoStockCount: int,
         *         } | null,
         *         otherChannels: array{
         *             channelID: string,
         *             domainIconURL: string,
         *             platformIconURL: string,
         *         }[],
         *     }[],
         * } $data
         */
        $data = $response->getData();

        return QueryProductLinkRelationStatuses::fromArray($data);
    }

}
