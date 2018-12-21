<?php namespace Github\Assist\Base;

/**
 * ----------------------------------------------------------------------------------
 *  Helper
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Helper
{

    //------------------------------------------------------------------------------

    /**
     * Debug output
     *
     * @param     $data
     * @param int $type
     */
    static function p($data, $type = 1)
    {
        echo '<pre />';
        print_r($data);
        if ($type) exit;
    }
    // ------------------------------------------------------------------------------

    /**
     * convert assoc array to multi
     *
     * @param array $arr
     * @return array
     */
    public static function arrayToMulti(array $arr) : array
    {
        return self::isAssoc($arr) ? [$arr] : $arr;
    }

    // ------------------------------------------------------------------------------

    /**
     * Verify that the key in the array exists and accumulate it
     *
     * @param array  $checkParams   check parameters
     * @param string $key           check key
     * @param array  $data          accumulate array
     *
     * @return  array
     */
    public static function arrayExistCum
    (
        array $checkParams, string $key, array $data = []
    ):array
    {
        $checkParams[$key] ?? NULL AND $data[$key] = $checkParams[$key];

        return $data;
    }

    // ------------------------------------------------------------------------------

    /**
     * Verify that the key in the array exists and accumulate it
     *
     * @param array  $checkParams   check parameters
     * @param array  $keys          check key
     *
     * @return  array
     */
    public static function arrayExistCums (array $checkParams, array $keys):array
    {
        $data = [];

        if (!$keys) { return $data; }

        foreach ($keys as $v)
        {
            $checkParams[$v] ?? NULL AND $data[$v] = $checkParams[$v];
        }

        return $data;
    }

    // ------------------------------------------------------------------------------

    /**
     * get get link
     *
     * @param string $baseUri
     * @param array  $params
     * @return string
     */
    public static function getLink(string $baseUri, array $params):string
    {
        if (!$params) { return $baseUri; }

        $baseUri .= "?";

        $index = 0;

        foreach ($params as $k => $v)
        {
            $index OR  $baseUri .= "{$k}={$v}";
            $index AND $baseUri .= "&{$k}={$v}";

            $index ++;
        }

        return $baseUri;
    }

    // ------------------------------------------------------------------------------

    public static function getRandString(int $length = 12)
    {
        $keys =
        [
            '0','1','2','3','4','5','6','7','8','9','10',

            'a','b','c','d','e','f','g','h','i','j','k',
            'l','m','n','o','p','q','r','s','t','u','v',
            'w','x','y','z',

            'A','B','C','D','E','F','G','H','I','J','K',
            'L','M','N','O','P','Q','R','S','T','U','V',
            'W','X','Y','Z'
        ];

        $str = '';

        while ($length)
        {
            $str .= $keys[rand(0, count($keys) - 1)];

           $length -- ;
        }

        return $str;
    }

    // ------------------------------------------------------------------------------

    /**
     * check if assoc array
     *
     * @param array $arr
     * @return bool
     */
    public static function isAssoc(array $arr) : bool
    {
        foreach ($arr as $key => $value)
        {
            if (is_string($key)) { return true; }
        }

        return false;
    }

    // ------------------------------------------------------------------------------

    /**
     * get max page number
     *
     * @param  string $linkString
     * @return int
     */
    public static function getMaxPage(string $linkString):int
    {
        //不支持分页或者每页数量超出最大数量
        if (!$linkString) { return 1 ;}

        //第一次处理
        $rule    = "/(next|first|prev).*page=(\d).*rel=\"last\"/";
        $matches = [];

        preg_match($rule, $linkString, $matches);

        $linkString = $matches[0] ?? '';

        //第二次处理
        $rule = '/page=([1-9]\d*)/';
        preg_match($rule, $linkString, $matches);

        return $matches[1] ?? 1;
    }


    // ------------------------------------------------------------------------------

}
