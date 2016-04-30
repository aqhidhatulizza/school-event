<?php
/**
 * Created by PhpStorm.
 * User: - INDIEGLO -
 * Date: 28/03/2016
 * Time: 9:50
 */

namespace App\Domain\Contracts;


interface Repository
{

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function  getManyBy($key, $value);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getFirstBy($key, $value);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function  instance(array $attributes = []);


}