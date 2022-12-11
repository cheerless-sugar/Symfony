<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    #[Route('/actor/view/{id}', name: 'app_actor')]
    public function index(int $id, ActorRepository $actorRepository): Response
    {
        /** @var Actor $actor */
        $actor = $actorRepository->find($id);

        if (!$actor) {
            throw new NotFoundHttpException("Actor with id {$id} Not found");
        }

        return $this->render('actor/index.html.twig', [
            'actor' => $actor,
        ]);
    }
}
