<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(AnnonceRepository $annonce)
    {

        $annonceArray = $annonce->findAll();


        return $this->render('accueil/accueil.html.twig',[
            'annonces'=> $annonceArray
        ]);
    }
}
