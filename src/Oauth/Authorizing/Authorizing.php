<?php namespace Github\Oauth\Authorizing;

use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Authorizing
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/21
 */
class Authorizing
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Project constructor.
     *
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * get url
     *
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function getUrl(array $params):string
    {
        $uri = "https://github.com/login/oauth/authorize";

        $keys =
        [
            'client_id', 'redirect_uri', 'login',
            'scope', 'state', 'allow_signup'
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
     * @return  array
     * @throws \Exception
     */
    public function getToken(array $params):array
    {
        $uri = "https://github.com/login/oauth/access_token";

        $keys =
        [
            'code', 'state', 'client_id',
            'client_secret', 'redirect_uri'
        ];

        $queue = Helper::arrayExistCums($params, $keys);

        $str = $this->options
        ->getSync()
        ->setQuery($queue)
        ->post($uri);

        $strArray = explode('&', $str);

        $output = [];

        foreach ($strArray as $v)
        {
            $tempArr = explode('=', $v);

            $tempKey   = $tempArr[0];
            $tempValue = $tempArr[1];

            $output[$tempKey] = $tempValue ;
        }

        return $output;
    }
    
    // ------------------------------------------------------------------------------
}