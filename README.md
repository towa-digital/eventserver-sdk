# eventserver-sdk

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Developer SDK for interacting with the Eventserver API

## Usage

Basic Request with no options:

```php
$eventserver = new Eventserver($token);
$response = $eventserver->get();

$events = $response['data']; // events
$links = $response['links']; // pagination links
$meta = $response['meta']; // meta information
```

## Tests

Run `composer test`

### Requirements:

+ `.env`-file in the root with a valid `EVENTSERVER_TOKEN` token