<?php namespace Github\GraphQL;

/**
 * ---------------------------------------------------------------------------------
 *  GraphQL
 * ---------------------------------------------------------------------------------
 *
 * @author felix
 * @change 2020/03/16
 */
class GraphQL extends Abs
{
    // ------------------------------------------------------------------------------

    public function run(string $str):array
    {
        $param = ['query' => $str];
        $body = json_encode($param);

        $result = $this->options->getClient()->
        setHeaderParams(['Content-Type' => 'application/json'])->
        setBody($body)->
        post('graphql');

        return $result;
    }

    // ------------------------------------------------------------------------------
}