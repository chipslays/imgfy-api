# 🎨 Imgfy API

Official PHP API wrapper for [Imgfy.cf](https://imgfy.cf/).

Imgfy - is a simple and beautiful service for uploading images.

## Installation
```bash
$ composer require chipslays/imgfy-api
```

## Methods

### Upload Image

Upload image to Imgfy.cf:

```
Imgfy::upload(string|array $images [, bool $secretly = false]) : array
```

Upload single image:

```php
use Chipslays\Imgfy\Imgfy;

require __DIR__ . '/vendor/autoload.php';

$response = Imgfy::upload('potato.png');

print_r($response);

Array
(
    [0] => Array
        (
            [filename] => potato.png
            [preview] => https://imgfy.cf/hs7oe
            [source] => https://imgfy.cf/file/b49432863e12495ddf099.png
        )
)
```

Upload multiple images:

```php
use Chipslays\Imgfy\Imgfy;

require __DIR__ . '/vendor/autoload.php';

$response = Imgfy::upload([
    'potato.png', 
    'chips.jpg', 
]);

print_r($response);

Array
(
    [0] => Array
        (
            [filename] => potato.png
            [preview] => https://imgfy.cf/hs7oe
            [source] => https://imgfy.cf/file/b49432863e12495ddf099.png
        )
    [1] => Array
        (
            [filename] => chips.png
            [preview] => https://imgfy.cf/hs7od
            [source] => https://imgfy.cf/file/b39423123e15595dfd019.png
        )
)
```

Generate super-secretly links:

```php
use Chipslays\Imgfy\Imgfy;

require __DIR__ . '/vendor/autoload.php';

$response = Imgfy::upload('potato.png', true);

print_r($response);

Array
(
    [0] => Array
        (
            [filename] => potato.png
            [preview] => https://imgfy.cf/z:maewitZhZRKPD
            [source] => https://imgfy.cf/file/b32166863eaf495ddf079.png
        )
)
```

Short alias `upload_imgfy` function.

```php
$response = upload_imgfy('potato.png');
$response = upload_imgfy(['potato.png', 'chips.jpg']);

// super-secretly link
$response = upload_imgfy('potato.png', true);
$response = upload_imgfy(['potato.png', 'chips.jpg'], true);
```
