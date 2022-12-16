<?php declare(strict_types=1);

include "../vendor/autoload.php";

use Wohnparc\Moeware\Client;
use Wohnparc\Moeware\Data\SetArticleRef;

$key = "<key>";

$client = new Client("http://localhost:8000/$/graphql", $key);

$date = new DateTime(strtotime("now - 1 day"));

$updatedRefs = $client->queryUpdatedArticleAndSetRefs($date);

print_r($updatedRefs->getArticleRefs());

print_r($updatedRefs->getSetRefs());

$articleInfo = $client->queryArticleInfo($updatedRefs->getArticleRefs());

print_r($articleInfo);

$setArticleInfo = $client->querySetArticleInfo([
    new SetArticleRef(
        $updatedRefs->getSetRefs()[0],
        [],
    ),
]);

print_r($setArticleInfo);
