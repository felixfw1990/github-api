<?php

namespace Github\Assist\Base;

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
    // ------------------------------------------------------------------------------

    /**
     * Verify that the key in the array exists and accumulate it
     *
     * @param array  $checkParams check parameters
     * @param string $key         check key
     * @param array  $data        accumulate array
     *
     * @return array
     */
    public function arrayExistCum(
        array $checkParams,
        string $key,
        array $data = []
    ): array {
        $checkParams[$key] ?? null and $data[$key] = $checkParams[$key];

        return $data;
    }

    // ------------------------------------------------------------------------------

    /**
     * Verify that the key in the array exists and accumulate it
     *
     * @param array $checkParams check parameters
     * @param array $keys        check key
     *
     * @return array
     */
    public function arrayExistCums(array $checkParams, array $keys): array
    {
        $data = [];

        if (!$keys)
        {
            return $data;
        }

        foreach ($keys as $v)
        {
            $checkParams[$v] ?? null and $data[$v] = $checkParams[$v];
        }

        return $data;
    }

    // ------------------------------------------------------------------------------

    /**
     * get get link
     *
     * @param string $baseUri
     * @param array  $params
     *
     * @return string
     */
    public function getLink(string $baseUri, array $params): string
    {
        if (!$params)
        {
            return $baseUri;
        }

        $baseUri .= '?';

        $index = 0;

        foreach ($params as $k => $v)
        {
            $index or  $baseUri .= "{$k}={$v}";
            $index and $baseUri .= "&{$k}={$v}";

            ++$index;
        }

        return $baseUri;
    }

    // ------------------------------------------------------------------------------
}
