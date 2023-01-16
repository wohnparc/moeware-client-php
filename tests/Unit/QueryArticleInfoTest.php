<?php declare(strict_types=1);

use Wohnparc\Moeware\Data\Article;
use Wohnparc\Moeware\Data\ArticleRef;
use Wohnparc\Moeware\Data\Location;
use Wohnparc\Moeware\Data\Stock;
use Wohnparc\Moeware\QueryArticleInfo;


test('empty response', function() {

  $object = QueryArticleInfo::fromArray([]);

  expect($object->getMessage())->toBe('');
  expect($object->getStatus())->toBe('');
  expect($object->getArticles())->toBe([]);
  expect($object->getUnknownArticles())->toBe([]);

  $object = QueryArticleInfo::fromArray(['articleInfo' => []]);

  expect($object->getMessage())->toBe('');
  expect($object->getStatus())->toBe('');
  expect($object->getArticles())->toBe([]);
  expect($object->getUnknownArticles())->toBe([]);

});

test('basic response', function() {

  $object = QueryArticleInfo::fromArray([
    'articleInfo' => [
      'status' => 'OK',
      'message' => 'this is some message',
      'articles' => [
        [
          'id' => '9v4nf340fi34f',
          'ref' => [
            'baseID' => 1234567,
            'variantID' => 99,
          ],
          'title' => 'Some Article',
          'description' => 'I am a description.',
          'stock' => [
            [
              'location' => ['code' => 'L', 'number' => 200],
              'quantity' => 10,
              'expectedAt' => null,
            ],
          ],
          'calculatedInventoryPrice' => 12345,
        ],
      ],
      'unknownArticles' => [
        [
          'baseID' => 987654321,
          'variantID' => 0,
        ],
      ],
    ],
  ]);

  expect(1)->toBe(1)
    ->and($object->getStatus())->toBe('OK')
    ->and($object->getMessage())->toBe('this is some message')
    ->and($object->getArticles())->toEqual([
      new Article(
        '9v4nf340fi34f',
        new ArticleRef(1234567,99),
        'Some Article',
        'I am a description.',
        [
          new Stock(
            new Location("L", 200),
            10,
            null,
          ),
        ],
        12345,
      )
    ])
    ->and($object->getUnknownArticles())->toEqual([
      new ArticleRef(987654321, 0),
    ]);

});
