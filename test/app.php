<?php declare(strict_types=1);

include "../vendor/autoload.php";

use Wohnparc\Moeware\Client;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetArticleItem;
use Wohnparc\Moeware\Data\SetArticleRef;
use Wohnparc\Moeware\Data\SetRef;

$key = '';

$secret = '';

$client = new Client("http://localhost:8000/$/graphql", $key, $secret);

$date = new DateTime("1970");

$articleInfo = $client->queryArticleInfo([
    new ArticleRef(1701234, 0),
]);

if ($articleInfo->hasErrors()) {
    print_r($articleInfo->getErrors());
    return;
}

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

if ($setArticleInfo->hasErrors()) {
    print_r($setArticleInfo->getErrors());
    return;
}

print_r($setArticleInfo);
