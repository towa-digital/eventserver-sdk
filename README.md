# eventserver-sdk

[![Version](https://img.shields.io/badge/version-v1.2.0-brightgreen.svg?style=ffor-the-badge)][current_version]
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=ffor-the-badge)](LICENSE.md)

Developer SDK for interacting with the Eventserver API

## Usage

### Events

#### Basic Request with no options

```php
$eventserver = new Eventserver($token);

$response = $eventserver->get();

$events = $response['data']; // events
$links = $response['links']; // pagination links
$meta = $response['meta']; // meta information
```

#### Basic Request with with options

The available options will be documented shortly.

```php
$eventserver = new Eventserver($token);

$response = $eventserver
    ->withOptions([
        'include' => 'location,categories',
        'page' => [
            'size' => 10,
            'number' => 1,
        ],
    ])
    ->get();

$events = $response['data']; // events
$links = $response['links']; // pagination links
$meta = $response['meta']; // meta information
```

#### Request with non default endpoint

```php
$eventserver = new Eventserver($token);

$response = $eventserver
    ->withEndpoint('categories')
    ->get();

$categories = $response['data'];
```

## Changelog

Please see the [Changelog](CHANGELOG.md) for more information.

## Testing

```bash
▲ composer test
```

### Requirements

+ `.env`-file in the root with a valid `EVENTSERVER_TOKEN` token

## Credits

+ [SahinU88](https://github.com/SahinU88)
+ [Smokey](https://github.com/simonrauch)

## About Towa

Towa is a digital agency based in Bregenz (Austria), Vienna (Austria) & St. Gallen (Switzerland).

## License

The MIT License (MIT). Please read the [LICENSE.md](./LICENSE.md) for more information.

[current_version]: https://github.com/towa-digital/eventserver-sdk/releases/tag/v1.2.1/
