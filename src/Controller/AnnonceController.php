<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\User;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/admin/annonce", name="annonce_afficher")
     */
    public function annonce_afficher(AnnonceRepository $repoAnnonce)
    {
        $annonceArray = $repoAnnonce->findAll();

        return $this->render('annonce/annonce_afficher.html.twig', [
            "annonces" => $annonceArray
        ]);
    }

    /**
     * @Route("/annonce/ajouter", name="annonce_ajouter")
     */
    public function annonce_ajouter(Request $request, EntityManagerInterface $manager)
    {

        $annonce = new Annonce;

        $user = $this->getUser();

        $membre = $annonce->setUser($user);

        
        $form = $this->createForm(AnnonceType::class, $annonce, array('ajouter' => true));
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('image')->getData();

            if ($image) {
                
                // dd($image);

                $nomImage = date('YmdHis') . "-" . $image->guessExtension();


                $image->move(
                    $this->getParameter("image_annonce"),
                    $nomImage
                );

                $annonce->setImage($nomImage);
            }

            $annonce->setDateAt(new \DateTimeImmutable('now'));

            $manager->persist($annonce);

            $manager->flush();

            $this->addFlash(
                'success',
                'Votre annonce à bien été posté'
            );

            return $this->redirectToRoute('profil');
        }


        return $this->render('annonce/annonce_ajouter.html.twig', [
            "formAnnonce" => $form->createView()
        ]);
    }

    /**
     * @Route("/annonce/modifier/{id<\d+>}", name="annonce_modifier")
     */
    public function annonce_modifier(Annonce $annonce, EntityManagerInterface $manager, Request $request)
    {

        $form = $this->createForm(AnnonceType::class, $annonce, array('modifier' => true));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('image')->getData();

            if ($image) {

                $nomImage = date("YmdHis") . "-" . $image->getClientOriginalName();

                $image->move(
                    $this->getParameter(
                        'image_annonce'
                    ),
                    $nomImage
                );

                if ($annonce->getImage()) {
                    unlink($this->getParameter("image_annonce") . '/' . $annonce->getImage());
                }

                $annonce->setImage($nomImage);
            }

            $manager->persist($annonce);

            $manager->flush();

            $this->addFlash(
                'success',
                'Votre annonce à bien été modifié'

            );
            return $this->redirectToRoute('annonce_afficher');
        }

        return $this->render('annonce/annonce_modifier.html.twig', [
            "formAnnonce" => $form->createView()
        ]);
    }

    /**
     * @Route("/annonce/supprimer/{id<\d+>}", name="annonce_supprimer")
     */
    public function annonce_supprimer(Annonce $annonce, Request $request, EntityManagerInterface $manager)
    {
        if ($annonce->getImage()) {
            unlink($this->getParameter('image_annonce') . '/' . $annonce->getImage());
        }

        $manager->remove($annonce);
        $manager->flush();

        $this->addFlash(
            'success',
            'Votre annonce a bien été supprimé'
        );

        return $this->redirectToRoute('annonce_afficher');
    }


    /**
     * @Route("/annonce/details/{id<\d+>}", name="RouteName")
     */
    public function FunctionName(): Response
    {
        return $this->render('$0.html.twig', []);
    }
}
