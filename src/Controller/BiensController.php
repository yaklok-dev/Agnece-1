<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class BiensController extends AbstractController
{
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(PropertyRepository $repository ,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens", name="biens.index")
     */
    public function index()
    {
        return $this->render('biens/index.html.twig',[
            'current_menu'=>'property'
        ]);
    }

    /**
     *@Route("/biens/{slug}-{id}", name="biens.show", requirements={"slug": "[a-z0-9/-]*"})
     *
     */
    public function show(Property $property, string $slug){
        if($property->getSlug() != $slug)
        {
            return $this->redirectToRoute('biens.show', [
                  'id' => $property->getId(),
                  'slug' => $property->getSlug()
            ],301);
        }

        return $this->render('biens/show.html.twig',[
            'property'=>$property,
            'current_menu'=>'property'
        ]);
    }
}
