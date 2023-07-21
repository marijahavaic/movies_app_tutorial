<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'app_movies')]
    public function index(EntityManagerInterface $em): Response
    {
        // findAll() - SELECT * FROM movies;
        // find() - SELECT * FROM movies WHERE id = 5;
        // findBy() - SELECT * FROM movies ORDER BY id DESC;
        // findOneBy() - SELECT * FROM movies WHERE id =6 AND title = 'The Dark Knight' ORDER BY id DESC;
        // count() - SELECT COUNT() from movies WHERE id = 6;
        // getClassName() - Entity name

        $repository = $em->getRepository(Movie::class);
        $movies = $repository->getClassName();

        dd($movies);

        return $this->render('movies/index.html.twig');
    }
}
