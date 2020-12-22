<?php

namespace App\Services;
// 下記を修正
use App\Repositories\UserRepositoryInterface;

class UserService
{
    /**
     *
     * @var User
     */
    // 下記を修正
    private $userRepository;
    
    // 下記を修正
    public function __construct(UserRepositoryInterface $userRepository)
    {
        // 下記を修正
        $this->userRepository = $userRepository;
    }

    /**
     * ユーザIDからユーザ情報を取得する
     *
     * @param int $user_id
     * @return model
     */
    public function getUserInfoByUserId($user_id)
    {
        // 下記を修正
        return $this->userRepository->getUserInfoByUserId($user_id);
    }
}
