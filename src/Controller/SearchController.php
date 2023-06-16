<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('search', name: 'app_search')]
    public function search(ProductRepository $product, Request $req): Response
    {
        $lastUsername = " ";
        $name = $req->request->get('SearchInput');
        $allProduct = $product->findProduct($name);
        return $this->render('search/index.html.twig', [
            'product' =>  $allProduct,
            'name' => $name,
            'last_username' => $lastUsername, 
        ]);
        // return $this->json($allProduct);
    }
}
