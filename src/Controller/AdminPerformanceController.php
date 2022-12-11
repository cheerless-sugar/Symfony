<?php

namespace App\Controller;

use App\Entity\ActorPerformance;
use App\Entity\Performance;
use App\Form\ActorPerformanceType;
use App\Form\PerformanceType;
use App\Repository\ActorPerformanceRepository;
use App\Repository\ActorRepository;
use App\Repository\PerformanceRepository;
use App\Repository\PerformanceRoleRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AdminPerformanceController extends AbstractController
{
    #[Route('/admin/performance', name: 'app_admin_performance')]
    public function getAll(PerformanceRepository $performanceRepository): Response
    {
        $performances = $performanceRepository->findAll();

        return $this->render('admin/performance/index.html.twig', [
            'performances' => $performances,
        ]);
    }

    #[Route('/admin/performance/update/{id}', name: 'app_admin_update_performance')]
    public function updatePerformance(Request $request, int $id, PerformanceRepository $performanceRepository): Response
    {
        $performance = $performanceRepository->find($id);

        if (!$performance) {
            throw new NotFoundHttpException("Performance with id {$id} not found.");
        }

        $performanceForm = $this->createForm(PerformanceType::class, $performance);
        $performanceForm->handleRequest($request);

        if ($performanceForm->isSubmitted() && $performanceForm->isValid()) {
            $performance = $performanceForm->getData();
            $performanceRepository->save($performance, true);
            $this->addFlash('success', "Updated successfully");
            return $this->redirectToRoute('app_admin_update_performance', ['id' => $performance->getId()]);
        }

        return $this->renderForm('admin/performance/form.html.twig', [
            'form' => $performanceForm,
            'performance' => $performance,
        ]);
    }

    #[Route('/admin/performance/add', name: 'app_admin_add_performance')]
    public function addPerformance(Request $request, PerformanceRepository $performanceRepository): Response
    {
        $performance = new Performance();

        $performanceForm = $this->createForm(PerformanceType::class, $performance);
        $performanceForm->handleRequest($request);

        if ($performanceForm->isSubmitted() && $performanceForm->isValid()) {
            $performance = $performanceForm->getData();
            $performanceRepository->save($performance, true);
            return $this->redirectToRoute('app_performance_view', ['id' => $performance->getId()]);
        }

        return $this->renderForm('admin/performance/form.html.twig', [
            'form' => $performanceForm,
            'performance' => $performance,
        ]);
    }

    #[Route('/admin/performance/delete/{id}', name: 'app_admin_delete_performance')]
    public function deletePerformance(int $id, PerformanceRepository $performanceRepository): Response
    {
        $performance = $performanceRepository->find($id);

        if (!$performance) {
            throw new NotFoundHttpException("Performance with id {$id} not found.");
        }

        $performanceRepository->remove($performance, true);

        return $this->redirectToRoute('app_admin_performance');
    }

    #[Route('/admin/performance/actor', name: 'app_admin_performance_actor')]
    public function addPerformanceToActor(Request $request, LoggerInterface $logger, ActorPerformanceRepository $actorPerformanceRepository, ActorRepository $actorRepository, PerformanceRepository $performanceRepository): Response
    {
        $performance = $request->get('performance');
        $actor =  $request->get('actor');

        $actorPerformance = new ActorPerformance();

        if ($actor) {
            $actor = $actorRepository->find($actor);
            $actorPerformance->setActor($actor);
        }

        if ($performance) {
            $performance = $performanceRepository->find($performance);
            $actorPerformance->setPerformance($performance);
        }


        $actorPerformanceForm = $this->createForm(ActorPerformanceType::class, $actorPerformance);

        $actorPerformanceForm->handleRequest($request);

        if ($actorPerformanceForm->isSubmitted() && $actorPerformanceForm->isValid()) {


            /** @var ActorPerformance $actorPerformance */
            $actorPerformance = $actorPerformanceForm->getData();
            $findActor = $actorPerformanceRepository->findOneByActorAndPerformance($actorPerformance->getActor()->getId(), $actorPerformance->getPerformance()->getId());
            if ($findActor) {
                $logger->warning($findActor->getActor()->getName() . ' AND ' . $findActor->getPerformance()->getName());
                $this->addFlash('error', 'Role is already selected');
                return $this->redirectToRoute('app_actor', ['id' => $actorPerformance->getActor()->getId()]);
            }
            $actorPerformanceRepository->save($actorPerformance, true);
            $this->addFlash('success', 'Role was added to Actor');
            return $this->redirectToRoute('app_actor', ['id' => $actorPerformance->getActor()->getId()]);
        }


        return $this->renderForm('admin/performance/add_actor.html.twig', [
            'form' => $actorPerformanceForm,
        ]);
    }
}
