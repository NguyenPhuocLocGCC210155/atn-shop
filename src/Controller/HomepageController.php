<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class HomepageController extends AbstractController
{
    #[Route('/index', name: 'app_homepage')]
    public function home(Security $security, ProductRepository $pro): Response
    {
        if($security->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            $lastUsername = "123";
        }
        else
        {
            $lastUsername = " ";
        }
        $product = $pro->allProduct();
        return $this->render('homepage/index.html.twig',[
            'last_username' => $lastUsername, 
            'proudct'=>$product
        ]);
    }
}
