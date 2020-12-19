<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    /**
     * ユーザIDからユーザ情報を取得する
     *
     * @param int $user_id
     * @return model
     */
    public function getUserInfoByUserId($user_id);
}
