<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Entity\RecetteIngredient;
use App\Form\RecetteIngredientType;
use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\RecetteIngredientRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/recette/ingredient")
 */
class RecetteIngredientController extends AbstractController
{
    /**
     * @Route("/", name="recette_ingredient_index", methods={"GET"})
     */
    public function index(RecetteIngredientRepository $recetteIngredientRepository): Response
    {
        $recettes = $recetteIngredientRepository->findAll();
        return $this->render('recette_ingredient/index.html.twig', [
            'recette_ingredients' => $recettes
        ]);
    }

    /**
     * @Route("/{recette}/liste", name="recette_ingredient_liste_ingredients", methods={"GET"})
     */
    public function liste_ingredients(Recette $recette, RecetteIngredientRepository $recetteIngredientRepository): Response
    {
        $recettes = $recetteIngredientRepository->findBy([
            'recette' => $recette
        ]);
        return $this->render('recette_ingredient/liste_ingredient.html.twig', [
            'recette_ingredients' => $recettes,
            'recette' => $recette
        ]);
    }

    /**
     * @Route("/{recette}/new", name="recette_ingredient_new", methods={"GET","POST"})
     */
    public function new(Recette $recette, Request $request): Response
    {

        $recetteIngredient = new RecetteIngredient();
        $form = $this->createForm(RecetteIngredientType::class, $recetteIngredient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recetteIngredient->setRecette($recette);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recetteIngredient);
            $entityManager->flush();

            return $this->redirectToRoute('recette_ingredient_liste_ingredients', [
                'recette' => $recette->getId()

            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recette_ingredient/new.html.twig', [
            'recette_ingredient' => $recetteIngredient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/detail", name="recette_ingredient_show", methods={"GET"})
     */
    public function show(RecetteIngredient $recetteIngredient): Response
    {
        
        return $this->render('recette_ingredient/show.html.twig', [
            'recette_ingredient' => $recetteIngredient,
        ]);

        
    }

    /**
     * @Route("/{recette_ingredient}/edit/{recette}", name="recette_ingredient_edit", methods={"GET","POST"})
     */
    public function edit(Recette $recette, Request $request, RecetteIngredient $recetteIngredient): Response
    {
        $form = $this->createForm(RecetteIngredientType::class, $recetteIngredient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recette_ingredient_liste_ingredients', ['recette' => $recette->getId()], Response::HTTP_SEE_OTHER);
            
        }

        return $this->renderForm('recette_ingredient/edit.html.twig', [
            'recette_ingredient' => $recetteIngredient,
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{recette_ingredient}/supprimer/{recette}", name="recette_ingredient_delete", methods={"POST"})
     */
    public function delete(Recette $recette, Request $request, RecetteIngredient $recetteIngredient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recetteIngredient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recetteIngredient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recette_ingredient_liste_ingredients', ['recette' => $recette->getId()], Response::HTTP_SEE_OTHER);
    }
}
