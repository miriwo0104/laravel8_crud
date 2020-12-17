<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     *
     * @var User
     */
    private $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * ユーザIDからユーザ情報を取得する
     *
     * @param int $user_id
     * @return model
     */
    public function getUserInfoByUserId($user_id)
    {
        return $user_info = User::select('*')->find($user_id);
    }
}
