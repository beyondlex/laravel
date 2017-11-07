<?php

namespace App\Repositories\Eloquent\Fake;


use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    /**获取用户信息
     * @return mixed
     */
    function getProfile()
    {
        // TODO: Implement getProfile() method.
    }

    /**打卡
     * @return mixed
     */
    function punch()
    {
        // TODO: Implement punch() method.
    }

    function getAttendanceRule(\DateTime $dateTime)
    {
        // TODO: Implement getAttendanceRule() method.
    }
}
