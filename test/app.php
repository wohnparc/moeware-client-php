<?php declare(strict_types=1);

include "../vendor/autoload.php";

use Wohnparc\Moeware\Client;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetArticleItem;
use Wohnparc\Moeware\Data\SetArticleRef;
use Wohnparc\Moeware\Data\SetRef;

$key = "<key>";

$client = new Client("https://price2spy.mw.wohnparc.dev/$/graphql", $key);

$date = new DateTime("now - 1 day");

$updatedRefs = $client->queryUpdatedArticleAndSetRefs($date);

print_r($updatedRefs->getArticleRefs());

print_r($updatedRefs->getSetRefs());

$articleInfo = $client->queryArticleInfo([
    new ArticleRef(1701234,0)
]);

print_r($articleInfo);

$setArticleInfo = $client->querySetArticleInfo([
    new SetArticleRef(
        new SetRef(1701234,0),
        [
            new SetArticleItem(
                new ArticleRef(1701234,0),
                1
            )
        ],
    ),
]);

print_r($setArticleInfo);
