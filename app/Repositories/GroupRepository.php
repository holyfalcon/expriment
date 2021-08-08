<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 8/8/2021
 * Time: 1:06 AM
 */

namespace App\Repositories;


use App\Models\Group;

class GroupRepository extends Repository
{
    public function model()
    {
        return Group::class;
    }

    public function getByUserId($userId)
    {
        return Group::where('user_id',$userId)->orderBy('id', 'desc')->get();
    }
}
