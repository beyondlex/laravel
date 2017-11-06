<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 17-11-6
 * Time: 下午9:02
 */
namespace App\Repositories\Eloquent\Fake;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface {

    public function info($id)
    {
        return $this->company();
    }

    public function findByName($name)
    {
        return $this->companies();
    }

    private function companies() {
        return factory(Company::class, 3)->make();
    }
    private function company() {
        return factory(Company::class)->make();
    }
}