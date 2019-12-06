<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductDetailController extends Controller
{
    /**
     * @Route("/{_category}/{_url_name}/{_id}", requirements={"_id"="\d+"}, name="product_detail")
     */
    public function index(Request $request, $_route_params)
    {
//         var_dump($_route_params["_title"]);

        $id = $_route_params["_id"];

        $doctrine = $this->getDoctrine();

        $product = $doctrine->getRepository("AppBundle:Product")->find($id);
        $category = $product->getCategory()->getId();

        $featured = $doctrine->getRepository("AppBundle:Product")->findAllExcludeId($id, $category, 6);

        return $this->render('controller/product_detail/index.html.twig', [
            'controller_name' => 'ProductDetailController',
            'product' => $product,
            'featured' => $featured
        ]);
    }
}
