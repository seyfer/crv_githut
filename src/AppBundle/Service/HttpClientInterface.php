<?php
/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/8/17
 */

namespace AppBundle\Service;


interface HttpClientInterface
{
    public function get($url);

    public function post($url, $data);
}