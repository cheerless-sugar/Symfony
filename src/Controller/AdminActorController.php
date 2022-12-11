<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Form\ActorType;
use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AdminActorController extends AbstractController
{
    #[Route('/admin/actor', name: 'app_admin_actor')]
    public function index(ActorRepository $actorRepository): Response
    {
        $actors = $actorRepository->findAll();

        return $this->render('admin/actor/index.html.twig', [
            'actors' => $actors,
        ]);
    }

    #[Route('/admin/actor/add', name: 'app_admin_add_actor')]
    public function addActor(Request $request, ActorRepository $actorRepository): Response
    {
        $actor = new Actor();

        $actorForm = $this->createForm(ActorType::class, $actor);
        $actorForm->handleRequest($request);

        if ($actorForm->isSubmitted() && $actorForm->isValid()) {
            $actor = $actorForm->getData();

            $actorRepository->save($actor, true);

            $this->addFlash('success', "Actor saved succeffuly");
        }


        return $this->renderForm('admin/actor/form.html.twig', [
            'actor' => $actor,
            'form' => $actorForm,
        ]);
    }

    #[Route('/admin/actor/update/{id}', name: 'app_admin_update_actor')]
    public function updateActor(int $id, Request $request, ActorRepository $actorRepository): Response
    {

        $actor = $actorRepository->find($id);

        $actorForm = $this->createForm(ActorType::class, $actor);
        $actorForm->handleRequest($request);

        if ($actorForm->isSubmitted() && $actorForm->isValid()) {
            $actor = $actorForm->getData();

            $actorRepository->save($actor, true);

            $this->addFlash('success', "Actor saved succeffuly");
        }


        return $this->renderForm('admin/actor/form.html.twig', [
            'actor' => $actor,
            'form' => $actorForm,
        ]);
    }

    #[Route('/admin/actor/delete/{id}', name: 'app_admin_delete_actor')]
    public function deleteActor(int $id, ActorRepository $actorRepository): Response
    {

        $actor = $actorRepository->find($id);

        if (!$actor) {
            throw new NotFoundHttpException("Actor with id {$id} Not found");
        }

        $actorRepository->remove($actor, true);

        return $this->render('admin/actor/form.html.twig', [
            'actor' => $actor,
        ]);
    }
}
