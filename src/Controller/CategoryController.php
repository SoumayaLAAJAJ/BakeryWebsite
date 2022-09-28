<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{

    /**
     * @Route("/category-detail", name="category-detail")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $categories = $categoryRepository->findAll();
        

        // $product = $productRepository->findBy($id);

        dd($categories);

        return $this->render('category/detail.html.twig', [
            'categories' => $categories,
            // 'category' => $category,
            // 'product' => $product
        ]);
    }
}
