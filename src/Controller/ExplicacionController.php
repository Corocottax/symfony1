<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExplicacionController extends AbstractController
{
    #[Route('/', name: 'explicacion')]
    public function index(): Response
    {
        return $this->render('Explicacion/explicacion.html.twig');
    }
    #[Route('/juegos', name: 'juegos')]
    public function juegos(): Response
    {
        return $this->render('Explicacion/juegos.html.twig');
    }
    #[Route('/pokemon', name: 'pokemon')]
    public function pokemon(): Response
    {
        $pokemon = ["nombre" => "Pikachu", "tipo" => "Eléctrico"];
        return $this->render('Explicacion/pokemon.html.twig', ["pokemon" => $pokemon]);
    }
    #[Route('/ropa', name: 'ropa')]
    public function ropa(): Response
    {
        return $this->render('Explicacion/ropa.html.twig');
    }
}
