<?php
/**
 * Created by PhpStorm.
 * User: - INDIEGLO -
 * Date: 28/03/2016
 * Time: 9:51
 */

namespace App\Domain\Contracts;


interface Cacheable
{

    /**
     * @param $tags
     * @param $key
     * @return mixed
     */
    public function get($tags, $key);

    /**
     * @param $tags
     * @param $key
     * @param $value
     * @param $minutes
     * @return mixed
     */
    public function put($tags, $key, $value, $minutes);

    /**
     * @param $tags
     * @param $key
     * @return mixed
     */
    public function has($tags, $key);

    /**
     * @param $tags
     * @return mixed
     */
    public function flush($tags);
}