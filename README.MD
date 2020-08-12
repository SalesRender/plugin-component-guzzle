Guzzle-wrapper for leadvertex plugins, that provide special user-agent format, generated from `$_ENV` variables.
 
Example:
```http request
User-Agent: LV-PLUGIN-MACROS-BOT/1.0 (+https://plugin.example.com/excel/info)
```

Usage:
```php
<?php
$client = \Leadvertex\Plugin\Components\Guzzle\Guzzle::getInstance();
```