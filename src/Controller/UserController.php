<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
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
     * @param UserRepository $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(string $eyesColor, string $gender, UserRepository $user)
    {
        $selectedUsers = $user->findBy(array('eyesColor' => $eyesColor, 'gender' => $gender));

        return $this->render('user/list.html.twig', [
            'users' => $selectedUsers,
        ]);
    }
}
