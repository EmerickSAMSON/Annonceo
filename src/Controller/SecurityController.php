<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $encoder)
    {

        $user = new User;


        $form = $this->createForm(UserType::class, $user, array("new" => true));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            
            $hash = $encoder->hashPassword($user, $user->getPassword());

            
            
            $user->setPassword($hash);
            
            $user->setDateEnregistrement(new \DateTimeImmutable('now'));
            
            $manager->persist($user);
            
            $manager->flush();
            
            $this->addFlash(
                'success',
                'Bienvenue ' . $user->getPrenom() . ', et que la force soit avec toi'
            );
            
            return $this->redirectToRoute('connexion');
        }
        
        
        
        
        return $this->render('security/inscription.html.twig', [
            "formUser" => $form->createView()
        ]);
    }
    
    
    
    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(Request $request, EntityManagerInterface $manager)
    {
        
        $user = new User;

        $form = $this->createForm(UserType::class, $user);
        
        return $this->render('security/connexion.html.twig', [
            "formUser" => $form->createView()
        ]);
    }
    
    
    
    

        /**
    *@Route("/deconnexion",name="deconnexion")
    */
    public function deconnexion(){

    }



    /**
     * @Route("/roles", name="roles")
     */
    public function roles()
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('accueil');
        } elseif ($this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('profil');
        }
    }
}
