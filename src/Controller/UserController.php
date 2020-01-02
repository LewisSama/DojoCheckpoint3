<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/list/{eyesColor}/{gender}", name="list")
     * @param string $eyesColor
     * @param string $gender
     * @param UserService $userService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(string $eyesColor, string $gender, UserService $userService)
    {
        $selectedUsers = $userService->getUsers($eyesColor, $gender);
        if (empty($selectedUsers)){
            $this->addFlash('warning', 'hahaha you type wrong things');
            $this->addFlash('error', 'hahaha you type wrong things');
        }
        return $this->render('user/list.html.twig', [
            'users' => $selectedUsers,
        ]);
    }

    /**
     * @Route("/user/random", name="randomUser")
     * @param UserService $userService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function random( UserService $userService)
    {
        $result = $userService->getRandomUser();
        return $this->render('user/random.html.twig', [
            'user' => $result,
        ]);
    }

}
