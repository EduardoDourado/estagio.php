<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[route('/user', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $users
        ]);
    }

    #[Route('/user/create', name: 'app_user_create', methods: ['POST'])]
    public function createUser(EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $user->setName('john doe');
        $user->setIdade(25);
        $user->setStatus(true);
        $user->setCreatedAt(new \DateTimeImmutable());

        $entityManager->persist($user);
        $entityManager->flush();

        $role = [
            ['name' => 'admin', 'id' => 1],
            ['name' => 'editor', 'id' => 2],

        ];
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'title' => 'Eduardo Dourado',
            'role' => $role
        ]);
    }
    #[Route('/user/{id}', name: 'app_user_show', methods: ['GET'])]
    public function showUser($id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        return $this->render('user/show.html.twig', [
            'controller_name' => 'find UserController',
            'user' => $user
        ]);
    }
    #[Route('/user/{id}/edit', name: 'app_user_edit', methods: ['PUT'])]
    public function editUser($id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        return $this->render('user/edit.html.twig', [
            'user' => $user
        ]);
    }

}
