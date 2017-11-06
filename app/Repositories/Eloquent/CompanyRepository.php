<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 17-11-6
 * Time: 上午10:19
 */
namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Criteria\Company\NameLike;
use Bosnadev\Repositories\Eloquent\Repository;

class CompanyRepository extends Repository implements CompanyRepositoryInterface {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Company::class;
    }

    public function info($id)
    {
        return $this->find($id);
    }

    public function findByName($name) {
        return $this->pushCriteria(new NameLike($name))->all();
//        return $this->findBy('name', $name);
    }
}