<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 17-11-6
 * Time: 下午8:19
 */

namespace App\Repositories\Contracts;


interface CompanyRepositoryInterface
{

    public function info($id);

    public function findByName($name);
}