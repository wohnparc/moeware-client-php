
[![library version](https://img.shields.io/packagist/v/wohnparc/moeware-client)](https://packagist.org/packages/wohnparc/moeware-client)
[![php version](https://img.shields.io/packagist/dependency-v/wohnparc/moeware-client/php)](https://www.php.net/releases/index.php)
[![license](https://img.shields.io/packagist/l/wohnparc/moeware-client)](.)

# moeware-client-php

This repository holds the official PHP client library for the Moeware GraphQL API.

## Getting started

### Install

The library is available via [packagist](https://packagist.org/packages/wohnparc/moeware-client).

You can install it by simply running the following command in your project:

`composer require wohnparc/moeware-client`

During development, this library can be added to your project by directly referencing this repository:

```composer
{
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/wohnparc/moeware-client-php.git"
        }
    ],
    "minimum-stability": "dev",
    "require": {
        ...
        "wohnparc/moeware-client": "dev-main"
    }
}
```

### Usage

A simple example:

```php

$client = new Client("<endpoint>", "<api_key>", "<api_secret>");

$date = new DateTime("now - 1 day");

$result = $client->queryUpdatedArticleAndSetRefs($date);

if ($result->hasErrors()) {
    // handle errors appropriately
}

$result->getArticleRefs();
$result->getSetRefs();

```

## Maintainers

- [Marc Binz](https://github.com/marcbinz)
