<?php
/**
 * Created for plugin-component-guzzle
 * Datetime: 11.02.2020 16:49
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Guzzle;



use GuzzleHttp\Client;

class Guzzle
{

    /** @var Client */
    private static $client;

    private function __construct() {}

    public static function getInstance(array $config = []): Client
    {
        $selfUri = $_ENV['LV_PLUGIN_SELF_URL'];
        $selfType = $_ENV['LV_PLUGIN_SELF_TYPE'];

        if (self::$client === null) {
            self::$client = new Client(array_merge_recursive($config, [
                'headers' => [
                    'User-Agent' => "LV-{$selfType}-PLUGIN/1.0 ({$selfUri})"
                ],
            ]));
        }

        return self::$client;
    }

}