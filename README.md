# Helpers package

This package contains a set of helper functions

## Installation

```bash
    composer require cresh/helpers
```

## Usage

```php
    use Cresh\Helpers\Helpers;

    // $cms is the name of the CMS you are using (currently only supports magento)
    $helpers = new Helpers($cms);

    $helpers->generateSeal($payload, $secret);
    
```