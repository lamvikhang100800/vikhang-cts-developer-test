<?php

use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use function Osiset\ShopifyApp\getShopifyConfig;

return [
  'api_init' => function (Options $opts) {
            $ts = getShopifyConfig('api_time_store');
            $ls = getShopifyConfig('api_limit_store');
            $sd = getShopifyConfig('api_deferrer');

            // Custom Guzzle options
            $opts->setGuzzleOptions(['connect_timeout' => 30.0]);
           
            return new BasicShopifyAPI(
                $opts,
                new $ts(),
                new $ls(),
                new $sd()
            );
  },
];