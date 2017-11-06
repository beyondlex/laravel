<?php
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 17-11-6
 * Time: 上午11:33
 */

namespace App\Repositories\Criteria\Company;


use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;

class NameLike extends Criteria {

    protected $like;

    function __construct($like)
    {
        if ($like) $this->like = "%{$like}%";
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        if (!$this->like) return $model;
        $query = $model->where('name', 'like', $this->like);
        return $query;
    }
}