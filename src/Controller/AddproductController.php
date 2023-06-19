<?php

namespace App\Controller;

use App\Entity\Staff;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\StaffRepository;
use App\Repository\StorageRepository;
use App\Repository\StoreRepository;
use App\Repository\SuplierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AddproductController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    #[Route('/addproduct', name: 'app_addproduct')]
    public function addProduct(Request $req, ProductRepository $product, CategoryRepository $cat, SuplierRepository $sup): Response
    {   
        $user = $req->request->get('userID');
        $c = $cat->findAll();
        $s= $sup->findAll();
        $store= $req->request->get('storeID');
        return $this->render('addproduct/index.html.twig', [
            'cat'=>$c,
            'sup'=>$s,
            'user'=>$user,
            'store'=>$store
        ]);
        // return $this->json($store);
    }

    /**
     * @Route("/add", name="app_add")
     */
    public function Add(Request $request, StoreRepository $staff, ProductRepository $product, StorageRepository $storage): Response
    {
        $pName = $request->request->get('pName');
        $pPrice = $request->request->get('pPrice');
        $pImg = $request->request->get('pImg');
        $pQuantity = $request->request->get('pQuantity');
        $pCat = $request->request->get('pCat');
        $pSup = $request->request->get('pSup');
        $pDes = $request->request->get('pDes');
        $user = $request->request->get('userID');
        $store = $request->request->get('storeID');
        $currentDate = new \DateTime();
        $formattedDate = $currentDate->format('Y-m-d');
        $product->addProduct($pName,$pImg,$pPrice,$pDes,$pQuantity,$pCat,$pSup);
        $productID = $product->findOneBy(['name' => $pName]);
        $ID = $productID->getId();
        $storage->addStorage($pQuantity, $formattedDate,$pPrice,$store,$ID,$user);
        // return $this->json($formattedDate);
        return $this->redirectToRoute('app_login');
    }
}
