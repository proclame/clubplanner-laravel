# clubplanner-laravel

This Laravel package is a wrapper for [proclame/clubplanner-php](https://github.com/proclame/clubplanner-php).

## Install

Via Composer

``` bash
$ composer require proclame/clubplanner-laravel
```

Add the ServiceProvider and the Facade to your `config/app.php`:

```php
'providers' => [
  ...
  Proclame\Clubplanner\ClubplannerServiceProvider::class,
],
'aliases' => [
  ...
  'Clubplanner' => Proclame\Clubplanner\ClubplannerFacade::class,
]
```

Then run the following command to publish the config to your config/ directory.

```bash
$ php artisan vendor:publish --tag=config
```

```php
return [
    'clubplanner_url' => 'apiurl.clubplanner.be', // the url for your tenant on clubplanner
    'clubplanner_token' => 'MYTOKEN', // the token for your tenant on clubplanner
];
```

## Usage

``` php
$member = Clubplanner::member()->find(123);
```

For more usage information, see [proclame/clubplanner-php](https://github.com/proclame/clubplanner-php)

## Credits

- [Nick Mispoulier][link-author] <nick@proclame.be>

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[link-author]: https://github.com/proclame
