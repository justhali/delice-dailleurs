<?php

namespace App\Controller;

use App\Entity\ZoneGeo;
use App\Form\ZoneGeoType;
use App\Repository\ZoneGeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/zone/geo")
 */
class ZoneGeoController extends AbstractController
{
    /**
     * @Route("/", name="zone_geo_index", methods={"GET"})
     */
    public function index(ZoneGeoRepository $zoneGeoRepository): Response
    {
        return $this->render('zone_geo/index.html.twig', [
            'zone_geos' => $zoneGeoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="zone_geo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $zoneGeo = new ZoneGeo();
        $form = $this->createForm(ZoneGeoType::class, $zoneGeo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($zoneGeo);
            $entityManager->flush();

            return $this->redirectToRoute('zone_geo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('zone_geo/new.html.twig', [
            'zone_geo' => $zoneGeo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="zone_geo_show", methods={"GET"})
     */
    public function show(ZoneGeo $zoneGeo): Response
    {
        return $this->render('zone_geo/show.html.twig', [
            'zone_geo' => $zoneGeo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="zone_geo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ZoneGeo $zoneGeo): Response
    {
        $form = $this->createForm(ZoneGeoType::class, $zoneGeo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('zone_geo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('zone_geo/edit.html.twig', [
            'zone_geo' => $zoneGeo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="zone_geo_delete", methods={"POST"})
     */
    public function delete(Request $request, ZoneGeo $zoneGeo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zoneGeo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($zoneGeo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('zone_geo_index', [], Response::HTTP_SEE_OTHER);
    }


}
