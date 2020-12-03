<?php
/**
 * Created for plugin-component-guzzle
 * Datetime: 11.02.2020 16:49
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Guzzle;



use GuzzleHttp\Client;
use Leadvertex\Plugin\Components\Info\Info;

class Guzzle
{

    private static Client $client;

    private function __construct() {}

    public static function getInstance(array $config = []): Client
    {
        $selfUri = rtrim($_ENV['LV_PLUGIN_SELF_URI'], '/');
        $selfType = (string) Info::getInstance()->getType();

        if (self::$client === null) {
            self::$client = new Client(array_merge_recursive($config, [
                'headers' => [
                    'User-Agent' => "LV-PLUGIN-{$selfType}-BOT/1.0 (+{$selfUri}/info)"
                ],
            ]));
        }

        return self::$client;
    }

}