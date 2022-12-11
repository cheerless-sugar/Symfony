<?php

namespace App\Controller;

use App\Repository\PerformanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class PerformanceController extends AbstractController
{
    #[Route('/performance/view/{id}', name: 'app_performance_view')]
    public function show(int $id, PerformanceRepository $performanceRepository): Response
    {
        $performance = $performanceRepository->find($id);

        if (!$performance) {
            new Response("Performance with {$id} not Found");
        }

        return $this->render('performance/index.html.twig', [
            'performance' => $performance,
        ]);
    }

    #[Route('/performance/list', name: 'app_performance_list')]
    public function getAll(PerformanceRepository $performanceRepository): Response
    {
        $performances = $performanceRepository->findAll();

        return $this->render('performance/list.html.twig', [
            'performances' => $performances,
        ]);
    }
}
