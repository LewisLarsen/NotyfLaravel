# Notyf for Laravel

<p align="center">
    <a href="https://packagist.org/packages/lewislarsen/jetstream">
        <img src="https://poser.pugx.org/lewislarsen/notyf/d/total.svg" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/lewislarsen/notyf">
        <img src="https://poser.pugx.org/lewislarsen/notyf/v/stable.svg" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/lewislarsen/notyf">
        <img src="https://poser.pugx.org/lewislarsen/notyf/license.svg" alt="License">
    </a>
    <a href="http://hits.dwyl.com/LewisLarsen/NotyfLaravel">
        <img src="http://hits.dwyl.com/LewisLarsen/NotyfLaravel.svg" alt="Hits">
    </a>
</p>

Notyf for Laravel aims to improve flash messages, by using the beautiful [Notyf Javascript Library](https://github.com/caroso1222/notyf) for a modern, responsive experience. 

For a demonstration of the notifications, please visit the [Notyf Author Demo Page](https://carlosroso.com/notyf).

## Installation Instructions
### Composer
```
composer require lewislarsen/laravelnotyf
```

Add the service provider to your `app.php` file.
```
LewisLarsen\Notyf\NotyfServiceProvider::class,
```

### Setting up Notyf
Please add the following dependencies to your layout file.

**This package is currently using Font Awesome for the icons within the toast notifications, however this will be replaced with SVG icons when support is added.**

```
<head>
    <!-- Notyf  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</head>
```

Please include the blade directive within the `<body></body>` tags.
```
<body>
@include('notyf::notyf')
</body>
```

## Using Notyf
Calling the flash notification itself is rather straightforward by calling `Notyf::create`, it accepts several parameters. An example can be found below.

```
Notyf::create('success', 'Hello world!');
```

For a full example of a notification, with all parameters used please see below.
```
Notyf::create('success', 'User Saved', false, 'top', 'center', '3000');
```

This example makes a success notification with the text "User Saved", the notification cannot be dismissed, is placed on the top center of the screen and lasts for 3 seconds.

### Parameters
The following parameters are accepted.

| Order | Name        | Description                                                                                                                          | Type    | Nullable |
|-------|-------------|--------------------------------------------------------------------------------------------------------------------------------------|---------|----------|
| 1     | Type        | Accepts the following values: `success`, `warning`, `error`, `info`. This can be extended per the config and publishing the view.            | String  | No       |
| 2     | Text        | Accepts a string, if the config value for translation strings is enabled, it will then support values such as `hello.world` instead. | String  | No       |
| 3     | Dismissable | Whether the message can be dismissed, by default this is set to false per the config.                                                | Boolean | Yes      |                                               | String  | Yes      |
| 4     | Y Position  | The placement of the notification, allowed values are: `top`, `center` and `bottom`. | String  | Yes      |
| 5     | X Position  | The placement of the notification, allowed values are: `left`, `center` and `right`. | String  | Yes      |
| 6     | Duration    | How long the notification lasts for. This value is in milliseconds and can be set to indefinite by the `0` value.                    | Int     | Yes      |

## Publishing Config & Views
Should you wish to publish the config / views to modify them, you can do so by the following command.
```
php artisan vendor:publish --provider="LewisLarsen/NotyfServiceProvider"
```

## Credits
Thank you to Carlos Rosso [caroso1222](https://github.com/caroso1222/notyf), the creator of the Notyf toast notification library. 

## Contributing
Do you have a suggestion? Make an issue and let me know. 

## License
This is an open-source project licensed under the [MIT License](https://github.com/LewisLarsen/LaravelNotyf/blob/master/LICENSE).
