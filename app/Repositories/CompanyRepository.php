<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 17-11-6
 * Time: 上午10:19
 */
namespace App\Repositories;

use App\Models\Company;
use Bosnadev\Repositories\Eloquent\Repository;

class CompanyRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Company::class;
    }
}