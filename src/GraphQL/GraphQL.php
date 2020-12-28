<?php namespace Github\GraphQL;

use Github\Assist\Base\Client;

/**
 * ---------------------------------------------------------------------------------
 *  GraphQL
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2020/03/16
 */
class GraphQL
{
    // ------------------------------------------------------------------------------

    private Client $clientObj;

    // ------------------------------------------------------------------------------

    public function __construct(array $objects = [])
    {
        $this->clientObj = $objects['clientObj'];
    }

    // ------------------------------------------------------------------------------

    public function run(string $str):array
    {
        $param = ['query' => $str];
        $body = json_encode($param, JSON_THROW_ON_ERROR);

        return $this->clientObj->get()->
        setHeaderParams(['Content-Type' => 'application/json'])->
        setBody($body)->
        post('graphql');
    }

    // ------------------------------------------------------------------------------
}