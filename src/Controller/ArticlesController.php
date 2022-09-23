<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Users;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use knp\Component\Pager\PaginatorInterface;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function showArticles(Request $request, ArticlesRepository $articleRepo, PaginatorInterface $paginator): Response
    {
        $articles = $articleRepo->findForPagination();

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    // #[Route('/articles/{{ id }}', name: 'app_articles')]
    // public function showArticles(Request $request, ArticlesRepository $articleRepo): Response
    // {
    //     $articles = $articleRepo->findAll();

    //     return $this->render('articles/index.html.twig', [
    //         'articles' => $articles,
    //     ]);
    // }
}
