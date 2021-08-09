<?php
/**
 * Created by PhpStorm.
 * User: Shahin
 * Date: 8/7/2021
 * Time: 11:48 PM
 */

namespace App\Repositories;


use App\Models\Post;

class PostRepository extends Repository
{
    public function model()
    {
        return Post::class;
    }

    public function getByGroupId($groupId)
    {
        return Post::where('group_id',$groupId)->orderBy('id', 'desc')->get();
    }

    public function createAndId(array $data)
    {
        $post = $this->create($data);
        return $post->id;
    }
}
