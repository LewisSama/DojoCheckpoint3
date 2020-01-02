<?php
namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function getUsers($eyesColor, $gender){
        return $this->repository->findBy(
            [
                'eyesColor' => $eyesColor,
                'gender' => $gender
            ]
        );
    }
    public function getRandomUser() {
        $users = $this->repository->findAll();
        $userKey = array_rand($users);
        $value = $users[$userKey];
        return $value;
    }

}