<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private array $articles = [
        'gull' => 'Les goélands sont des oiseaux marins fascinants...',
        'eagle' => 'Les aigles sont des prédateurs majestueux...',
        'sparrow' => 'Les moineaux sont des oiseaux urbains très communs...',
    ];

    /**
     * @Route("/e01", name="main_page")
     */
    public function mainPage(): Response
    {
        return $this->render('main/index.html.twig', [
            'articles' => $this->articles,
        ]);
    }

    /**
     * @Route("/e01/{article}", name="article_page")
     */
    public function articlePage(string $article): Response
    {
        if (!array_key_exists($article, $this->articles)) {
            // Si l'article n'existe pas, afficher la page principale
            return $this->redirectToRoute('main_page');
        }

        return $this->render('main/article.html.twig', [
            'title' => ucfirst($article),
            'content' => $this->articles[$article],
        ]);
    }
}
