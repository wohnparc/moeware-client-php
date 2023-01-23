
![library version](https://img.shields.io/packagist/v/wohnparc/moeware-client)
![php version](https://img.shields.io/packagist/dependency-v/wohnparc/moeware-client/php)
![license](https://img.shields.io/packagist/l/wohnparc/moeware-client)

# moeware-client-php

This repository holds the official PHP client library for the Moeware GraphQL API.

## Getting started

### Install

During development, this library can be added to your project by directly referencing this repository.
In the future this library will be available via [packagist](https://packagist.org/).

```composer
{
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/wohnparc/moeware-client-php.git"
        }
    ],
    "require": {
        ...
        "wohnparc/moeware-client": "dev-main"
    }
}
```

### Usage

A simple example:

```php

$client = new Client("http://endpoint", "my_key");

$date = new DateTime("now - 1 day");

$result = $client->queryUpdatedArticleAndSetRefs($date);

```

## Maintainers

- [Marc Binz](https://github.com/marcbinz)
