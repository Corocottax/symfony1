<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\AddAlumnosType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExplicacionController extends AbstractController
{
    #[Route('/', name: 'explicacion')]
    public function index(): Response
    {
        return $this->render('Explicacion/explicacion.html.twig');
    }
    #[Route('/alumnos', name: 'alumnos')]
    public function alumnos(EntityManagerInterface $em): Response
    {
        /* $alumno = new Alumno();
        $alumno->setName("Boris");
        $alumno->setAge(31);
        $alumno->setCurso("FULL STACK DEVELOPER");
        $em->persist($alumno);
        $em->flush(); */
        $respositorio = $em->getRepository(Alumno::class);
        $alumnos = $respositorio->findAll();
        return $this->render('Explicacion/alumnos.html.twig', ["alumnos" => $alumnos]);
    }
    #[Route('/addalumnos', name: 'addalumnos')]
    public function addalumnos(EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(AddAlumnosType::class);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumno = $form->getData();
            $em->persist($alumno);
            $em->flush();

            return $this->redirectToRoute("alumnos");
        }

        return $this->renderForm('Explicacion/addAlumnos.html.twig', ["alumnoForm" => $form]);
    }
    #[Route('/ropa', name: 'ropa')]
    public function ropa(): Response
    {
        return $this->render('Explicacion/ropa.html.twig');
    }
}
