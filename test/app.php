<?php declare(strict_types=1);

include "../vendor/autoload.php";

use Wohnparc\Moeware\Client;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\SetArticleItem;
use Wohnparc\Moeware\Data\SetArticleRef;
use Wohnparc\Moeware\Data\SetRef;

$key = 'de99465e-74b2-4c02-a774-0d9ce5b3f18a';

$secret = 'j$=6"E\V02?xH9n31{A5Bp7/w4T#8]a)';

$client = new Client("http://localhost:8000/$/graphql", $key, $secret);

$date = new DateTime("1970");

$articleInfo = $client->queryArticleInfo([
    new ArticleRef(1151017,50),
]);

if ($articleInfo->hasErrors()) {
    print_r($articleInfo->getErrors());
    return;
}

print_r($articleInfo);
