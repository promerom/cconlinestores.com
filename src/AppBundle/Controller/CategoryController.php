<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;

class CategoryController extends Controller
{
    /**
     * @Route(
     *      "/{_category}",
     *      name="category",
     *      requirements={
     *          "_category"="celulares|televisores|computadores|videojuegos|lavadora-secadora"
     *      }
     * )
     */
    public function index(Request $request, $_route_params)
    {
        $doctrine = $this->getDoctrine();

        /**
         * @var Category $category
         */
        $category = $doctrine->getRepository("AppBundle:Category")->findOneByUrlName($_route_params["_category"]);

        return $this->render('controller/category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'category' => $category,
            'products' => $category->getProducts()
        ]);
    }
}
