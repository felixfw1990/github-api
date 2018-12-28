<?php namespace Github\Api\Repositories;

use Github\Assist\Base\API;
use Github\Assist\Base\Helper;
use Github\Assist\Base\Options;

/**
 * ----------------------------------------------------------------------------------
 *  Contents
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/19
 */
class Contents
{
    // ------------------------------------------------------------------------------

    /**
     * @var Options
     */
    private $options;

    // ------------------------------------------------------------------------------

    /**
     * Contents constructor.
     *
     * @param \Github\Assist\Base\Options $options
     */
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    // ------------------------------------------------------------------------------

    /**
     * owner repo contents path
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function ownerRepoContentsPath(array $params):array
    {
        $owner = $params['owner'] ?? '';
        $repo  = $params['repo']  ?? [];
        $path  = $params['path']  ?? '';

        $queue = Helper::arrayExistCum($params, 'ref');

        $result = $this->options
        ->getSync()
        ->setPath($owner, $repo, $path)
        ->setQuery($queue)
        ->get(API::REPOSITORIES['CRContents']);

//        $errors = $result['errors'] ?? [];
//        $code = Helper::generalArray($errors, 'code');
//
//        if (in_array('too_large', $code))
//        {
//            //@TODO 最终考虑结果，后端不做下载，有个app data tree 可以到达100m
//            //如果是图片， 直接渲染，
//            //如果是文件，直接下载。
//            //如果是可显示的大文件，先下载，再渲染
//            //如果是小文件，直接读取数据封装下载或者直接显示。
//            //文件太大，超过 1M
//            //调用Git Data API 请求小于100M的
//        }
//
//        Helper::p($result);

        return $result;
    }

    // ------------------------------------------------------------------------------
    
}