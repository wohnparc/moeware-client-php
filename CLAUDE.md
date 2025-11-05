# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the official PHP client library for the Moeware GraphQL API. It provides a clean interface for querying various data from the Moeware system.

## Common Development Commands

### Install Dependencies
```bash
composer install
```

### Format Code
```bash
./vendor/bin/php-cs-fixer fix src
```

### Run Static Analysis
```bash
./vendor/bin/phpstan analyse --memory-limit 256M
```

### Run Tests
```bash
./vendor/bin/pest
```

### Task Runner
The project uses Task (Taskfile.yml) for common operations:
- `task composer` or `task c` - Install dependencies
- `task format` or `task f` - Format code
- `task scan` or `task s` - Run static analysis
- `task test` or `task t` - Run tests
- `task licenses` or `task l` - Generate license overview

## Architecture Overview

### Client Pattern
The library follows a query-based architecture where:
1. `Client.php` is the main entry point that handles authentication and GraphQL communication
2. Each query type has its own class (e.g., `QueryArticleInfo`, `QueryShopOrderInfo`)
3. Query classes extend the base `Query` class and define their GraphQL query structure
4. Data models in `src/Data/` represent the response structures

### Authentication
The client supports two layers of authentication:
1. **API Authentication**: Required - uses API key (X-API-Key header) and secret (Bearer token)
2. **HTTP Basic Auth**: Optional - for instances protected by web server basic auth (e.g., Caddy)

### Key Components
- **Client**: Main class that instantiates the GraphQL client with authentication headers
- **Query Classes**: Each query type implements its own GraphQL query string and result parsing
- **Data Models**: PHP classes representing the API response structures (Article, Set, ShopOrder, etc.)
- **Consumer Interface**: Abstraction for processing query results

### Testing & Quality
- Uses Pest for testing
- PHPStan at max level for static analysis
- PHP-CS-Fixer for code formatting
- Minimum PHP version: See the `composer.json` file for the current requirement.