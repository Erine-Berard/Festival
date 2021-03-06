<?php

namespace App\Controller;

use App\Entity\Festival;
use App\Form\FestivalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/festival")
 */
class FestivalController extends AbstractController
{
    /**
     * @Route("/", name="festival_index", methods={"GET"})
     */
    public function index(): Response
    {
        $festivals = $this->getDoctrine()
            ->getRepository(Festival::class)
            ->findAll();

        return $this->render('festival/index.html.twig', [
            'festivals' => $festivals,
        ]);
    }

    /**
     * @Route("/new", name="festival_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $festival = new Festival();
        $form = $this->createForm(FestivalType::class, $festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($festival);
            $entityManager->flush();

            return $this->redirectToRoute('festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('festival/new.html.twig', [
            'festival' => $festival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="festival_show", methods={"GET"})
     */
    public function show(Festival $festival): Response
    {
        return $this->render('festival/show.html.twig', [
            'festival' => $festival,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="festival_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Festival $festival): Response
    {
        $form = $this->createForm(FestivalType::class, $festival);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('festival_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('festival/edit.html.twig', [
            'festival' => $festival,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="festival_delete", methods={"POST"})
     */
    public function delete(Request $request, Festival $festival): Response
    {
        if ($this->isCsrfTokenValid('delete'.$festival->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($festival);
            $entityManager->flush();
        }

        return $this->redirectToRoute('festival_index', [], Response::HTTP_SEE_OTHER);
    }
}
