<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategoryType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
  /**
   * @Route("/category/afficher", name="category_afficher")
   */
  public function category_afficher(CategorieRepository $repoCategory)
  {

    $categoryArray = $repoCategory->findAll();


    return $this->render('category/category_afficher.html.twig', [
      "categories" => $categoryArray
    ]);
  }

  /**
   * @Route("/category/ajouter", name="category_ajouter")
   */
  public function category_ajouter(Request $request, EntityManagerInterface $manager)
  {

    $category = new Categorie;

    $form = $this->createForm(CategoryType::class, $category);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $manager->persist($category);

      $manager->flush();

      $this->addFlash(
        'success',
        'La catégorie a bien été ajoutée'
      );

      return $this->redirectToRoute('category_afficher');
    }

    return $this->render('category/category_ajouter.html.twig', [
      'formCategory' => $form->createView()
    ]);
  }

  /**
   * @Route("/category/modifier/{id<\d+>}", name="category_modifier")
   */
  public function category_modifier(Categorie $category, EntityManagerInterface $manager, Request $request)
  {

    $form = $this->createForm(CategoryType::class, $category);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $manager->persist($category);
      $manager->flush();

      $this->addFlash(
        'success',
        'La catégorie a bien été modifiée'
      );

      return $this->redirectToRoute('category_afficher');
    }

    return $this->render('category/category_modifier.html.twig', [
      "formCategory" => $form->createView(),
      "categories" => $category
    ]);
  }

  /**
   * @Route("/category/supprimer/{id<\d+}", name="category_supprimer")
   */
  public function category_supprimer(Categorie $category, EntityManagerInterface $manager)
  {
    $manager->remove($category);
    $manager->flush();

    $this->addFlash(
      'success',
      'La catégorie a bien été supprimée'
    );

    return $this->redirectToRoute('category_afficher');
  }
}
