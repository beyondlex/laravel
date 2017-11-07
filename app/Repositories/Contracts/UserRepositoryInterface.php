<?php

namespace App\Repositories\Contracts;


interface UserRepositoryInterface
{
    /**获取用户信息
     * @return mixed
     */
    function getProfile();

    /**打卡
     * @return mixed
     */
    function punch();


    function getAttendanceRule(\DateTime $dateTime);//get by user id ?

    //TODO: interface or abstract ?
}
