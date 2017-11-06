<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\Eloquent\CompanyRepository;
use App\Repositories\Criteria\Company\NameLike;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $company;

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    //
    function index() {
        return Carbon::now()->toDateTimeString();
    }

    function companies(Request $request) {
        $name = $request->post('name');
//        return $this->company->pushCriteria(new NameLike($name))->paginate(1);
        $all = $this->company->pushCriteria(new NameLike($name))->all();
        return $all;
    }

    function find(Request $request, $id) {
//        var_dump($request->post());
        return $this->company->find($id);
    }

    function queryTest() {
        $res = [];
        $builder = DB::table('companies');
        $res = DB::table('companies')->get();
//        $res = \DB::table('companies')->first();
//        $res = $res->name;
//        $res = $builder->value('name');
        $res = $this->getBuilder()->pluck('name');//select `name` from `companies`
        $res = $this->getBuilder()->count();//select count(*) as aggregate from `companies`
        $res = $this->getBuilder()->where('code', 4)->get();//select * from `companies` where `code` = ?
        $res = $this->getBuilder()->where([
            ['code','=',4],
            ['id',2],
        ])->get();//select * from `companies` where (`code` = ? and `id` = ?)

        $res = $this->getBuilder()
            ->where('code', 4)
            ->orWhere('id', 1)
            ->get();//select * from `companies` where `code` = ? or `id` = ?

        $res = $this->getBuilder()
            ->where('code', 4)
            ->where('id', 2)
            ->orWhere('id', 1)
            ->get();//select * from `companies` where `code` = ? and `id` = ? or `id` = ?

        $res = $this->getBuilder()
            ->where('code', 4)
            ->orWhere(function($query) {
                $query->where('id', 3)->orWhere('id', 5);
            })
            ->get();//select * from `companies` where `code` = ? or (`id` = ? or `id` = ?)

        //when:
        $name = 'la';
        $res = $this->getBuilder()
            ->select('id', 'code')
            ->when($name, function($query) use ($name) {
                $query
                    ->addSelect('name')
                    ->where('name', 'like', "%{$name}%");
            })
            ->get();//select `id`, `code`, `name` from `companies` where `name` like ?

        //when else:
        $orderBy = '';
        $res = $this->getBuilder()
            ->when($orderBy, function($query) use ($orderBy) {
                $query->orderBy($orderBy);
            }, function($query) use ($orderBy) {
                $query->orderBy('id', 'desc');
            })
            ->get();

        //join:
        //select `companies`.*, `admins`.`name` as `admin`
        // from `companies` inner join `admins` on `companies`.`id` = `admins`.`company_id`
        $res = $this->getBuilder()
            ->join('admins', 'companies.id', '=', 'admins.company_id')
            ->select('companies.*', 'admins.name as admin')
            ->get();




        dd(DB::getQueryLog());
        return $res;
    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    private function getBuilder() {
//        return new Company();
        return DB::table('companies');
    }
}
