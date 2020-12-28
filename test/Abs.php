<?php

namespace GithubTest;

use Closure;
use Exception;
use Github\Assist\Base\Client;

use Github\Assist\Base\Helper;
use PHPUnit\Framework\TestCase;

/**
 * ----------------------------------------------------------------------------------
 *  Abs
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/13
 */
abstract class Abs extends TestCase
{
    // ------------------------------------------------------------------------------

    use TestConfig;

    // ------------------------------------------------------------------------------

    /**
     * @var Client
     */
    protected $client;

    // ------------------------------------------------------------------------------

    public function setUp(): void
    {
        $optionParams = [
            'token'    => $this->params['token'],
            'debug'    => false,
            'log_file' => 'Log/log_file.log',
            'proxy'    => $this->params['proxy'],
        ];

        $this->client = new Client($optionParams);
    }

    // ------------------------------------------------------------------------------

    /**
     * assert Logic
     *
     * @param Closure $fn
     */
    public function assertLogic(Closure $fn): void
    {
        $status = true;

        try
        {
            $fn();
        }
        catch (Exception $e)
        {
            $status = false;
        }

        $this->assertTrue($status);
    }

    // ------------------------------------------------------------------------------

    /**
     * @param int $length
     *
     * @return string
     */
    public function getRandString(int $length = 12): string
    {
        $keys = [
                '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',

                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
                'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
                'w', 'x', 'y', 'z',

                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
                'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
                'W', 'X', 'Y', 'Z',
            ];

        $str = '';

        while ($length)
        {
            $str .= $keys[\random_int(0, \count($keys) - 1)];

            --$length;
        }

        return $str;
    }

    // ------------------------------------------------------------------------------

    /**
     * get max page number
     *
     * if return 0 not found 'last' tag, Recommended to take the current page
     *
     * @param string $linkString
     *
     * @return int
     */
    public function getLastPage(string $linkString): int
    {
        return (new Helper())->getLastPage($linkString);
    }

    //------------------------------------------------------------------------------

    /**
     * Debug output
     *
     * @param     $data
     * @param int $type
     */
    public function p($data, int $type = 1): void
    {
        echo '<pre />';

        \print_r($data);

        if ($type)
        {
            exit;
        }
    }

    // ------------------------------------------------------------------------------
}
