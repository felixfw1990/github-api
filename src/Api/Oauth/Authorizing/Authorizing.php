<?php

namespace Github\Api\Oauth\Authorizing;

use Exception;
use Github\Assist\Base\Helper;

/**
 * ----------------------------------------------------------------------------------
 *  Authorizing
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/21
 */
class Authorizing extends Abs
{
    // ------------------------------------------------------------------------------

    /**
     * get url
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return string
     */
    public function getUrl(array $params): string
    {
        $uri = 'https://github.com/login/oauth/authorize';

        $keys =
        [
            'client_id', 'redirect_uri', 'login',
            'scope', 'state', 'allow_signup',
        ];
        $queue = Helper::arrayExistCums($params, $keys);

        return Helper::getLink($uri, $queue);
    }

    // ------------------------------------------------------------------------------

    /**
     * get token
     *
     * @param array $params
     *
     * @throws Exception
     *
     * @return array
     */
    public function getToken(array $params): array
    {
        $uri = 'https://github.com/login/oauth/access_token';

        $keys =
        [
            'code', 'state', 'client_id',
            'client_secret', 'redirect_uri',
        ];

        $queue = Helper::arrayExistCums($params, $keys);

        return $this->options
            ->getClient()
            ->setHeaderParams(['Accept' => 'application/json'])
            ->setQuery($queue)
            ->post($uri);
    }

    // ------------------------------------------------------------------------------
}
