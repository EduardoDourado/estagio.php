<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function createUser(EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $user->setName('john doe');
        $user->setIdade(25);
        $user->setStatus(true);

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
}
