<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    private $movieRepository;
    public function __construct(EntityManagerInterface $em, MovieRepository $movieRepository) 
    {
        $this->em = $em;
        $this->movieRepository = $movieRepository;
    }
    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        // findAll() - SELECT * FROM movies;
        // find() - SELECT * FROM movies WHERE id = 5;
        // findBy() - SELECT * FROM movies ORDER BY id DESC;
        // findOneBy() - SELECT * FROM movies WHERE id =6 AND title = 'The Dark Knight' ORDER BY id DESC;
        // count() - SELECT COUNT() from movies WHERE id = 6;
        // getClassName() - Entity name
        
    $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }
}
