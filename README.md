# eventserver-sdk

[![Version](https://img.shields.io/badge/version-unreleased-brightgreen.svg?style=ffor-the-badge)][current_version]
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=ffor-the-badge)](LICENSE.md)

Developer SDK for interacting with the Eventserver API

## Usage

### Events

Basic Request with no options:

```php
$eventserver = new Eventserver($token);
$response = $eventserver->get();

$events = $response['data']; // events
$links = $response['links']; // pagination links
$meta = $response['meta']; // meta information
```

## Changelog

Please see the [Changelog](CHANGELOG.md) for more information.

## Testing

```bash
$ composer test
```

### Requirements:

+ `.env`-file in the root with a valid `EVENTSERVER_TOKEN` token

## Credits

+ [SahinU88](https://github.com/SahinU88)

## About Towa

Towa is a digital agency based in Bregenz (Austria), Vienna (Austria) & St. Gallen (Switzerland).

## License

The MIT License (MIT). Please read the (LICENSE.md)[License File] for more information.

[current_version]: https://github.com/towa-digital/eventserver-sdk/tree/develop