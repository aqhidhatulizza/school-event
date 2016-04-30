<?php
/**
 * Created by PhpStorm.
 * User: - INDIEGLO -
 * Date: 28/03/2016
 * Time: 9:49
 */

namespace App\Domain\Contracts;

interface Paginable
{

    /**
     * @param int $limit
     * @return mixed
     */
    public function getByPage($limit = 10, $page = 1, array $column, $field, $search = '');
}