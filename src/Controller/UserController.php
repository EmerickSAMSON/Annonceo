<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function profil(UserRepository $user, AnnonceRepository $annonce)
    {
        $userArray = $user->findAll();

        return $this->render('user/profil.html.twig',[
            'users' => $userArray
        ]);
    }

    

    
}
