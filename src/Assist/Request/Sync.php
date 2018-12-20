<?php namespace Github\Assist\Request;

use Github\Assist\Base\Helper;
use Github\Assist\Base\Validate as V;
use Github\Assist\Exceptions\GithubException;
use Psr\Http\Message\StreamInterface;

/**
 * ----------------------------------------------------------------------------------
 *  Sync
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class Sync
{

    // ------------------------------------------------------------------------------

    /**
     * base trait
     */
    use AbsBase;

    // ------------------------------------------------------------------------------

    /**
     * get request sync
     *
     * @param string $api
     * @param bool   $headers
     * @return mixed
     * @throws \Exception
     */
    public function get(string $api, bool $headers = false)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

//        try
//        {
            $response = $this->guzzle->get($apiPath, $options);
//        }
//        catch (\Exception $e)
//        {
//            throw new GithubException($this->getExceptionMsg($e));
//        }

        return $this->parseResponse($response, $headers);
    }

    // ------------------------------------------------------------------------------

    /**
     * put request sync
     *
     * @param string $api
     * @return mixed
     * @throws \Exception
     */
    public function put(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->put($apiPath, $options);
        }
        catch (\Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response, false);
    }

    // ------------------------------------------------------------------------------

    /**
     * post request sync
     *
     * @param string $api
     * @return mixed
     * @throws \Exception
     */
    public function post(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->post($apiPath, $options);
        }
        catch (\Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response, false);
    }

    // ------------------------------------------------------------------------------

    /**
     * delete request sync
     *
     * @param string $api
     * @return mixed
     * @throws \Exception
     */
    public function delete(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();

        try
        {
            $response = $this->guzzle->delete($apiPath, $options);
        }
        catch (\Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response, false);
    }

    // ------------------------------------------------------------------------------

    /**
     * get request & return body stream without preloaded
     *
     * @param string $api
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function getStream(string $api)
    {
        $apiPath = $this->concatApiPath($api);
        $options = $this->concatOptions();
        $options = array_merge($options, ['stream' => true]);

        try
        {
            $response = $this->guzzle->get($apiPath, $options);
        }
        catch (\Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response, false);
    }

    // ------------------------------------------------------------------------------

    /**
     * get request & save body to some where
     *
     * @param string $api
     * @param string|resource|\Psr\Http\Message\StreamInterface $sink
     * @return array
     * @throws \Exception
     */
    public function getSink(string $api, $sink)
    {
        $rules = V::oneOf(
            V::resourceType(),
            V::stringType()->notEmpty(),
            V::instance(StreamInterface::class)
        );

        V::doValidate($rules, $sink);

        $options = $this->concatOptions();
        $options = array_merge($options, ['sink' => $sink]);
        $apiPath = $this->concatApiPath($api);

        try
        {
            $response = $this->guzzle->get($apiPath, $options);
        }
        catch (\Exception $e)
        {
            throw new GithubException($this->getExceptionMsg($e));
        }

        return $this->parseResponse($response, true);
    }

    // ------------------------------------------------------------------------------

    /**
     * get max page number
     *
     * @param  array $headers
     * @return int
     */
    public function getMaxPage(array $headers):int
    {
        $linkString = $headers['Link'][0] ?? '';

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
