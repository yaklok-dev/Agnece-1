<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilContollerController extends AbstractController
{
    /**
     * @var
     */
    private $repository;
    /**
     *
     * @Route("/", name="accueil.index")
     */

    public function index(PropertyRepository $repository)
    {
        $properties=$repository->findLatest();

        return $this->render('accueil_contoller/index.html.twig', [
            'properties' =>$properties
        ]);
    }


}
