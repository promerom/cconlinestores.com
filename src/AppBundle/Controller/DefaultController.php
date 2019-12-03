<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'products' => $this->getMainProducts($em)
        ]);
    }

    /**
     * @Route("/stores", name="stores_page")
     */
    public function storesAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));

        // Example without URL
        $breadcrumbs->addItem("Tiendas");

        // Example with parameter injected into translation "user.profile"
//         $breadcrumbs->addItem($txt, $url, ["%user%" => $user->getName()]);

        return $this->render('stores/stores_page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
        ]);
    }

    /**
     * @Route("/ofertas", name="deals_page")
     */
    public function dealsAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));

        // Example without URL
        $breadcrumbs->addItem("Ofertas");

        return $this->render('deals/deals_page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
        ]);
    }

    /**
     * @Route("/blackfriday", name="blackfriday_page")
     */
    public function blackfridayAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));

        // Example without URL
        $breadcrumbs->addItem("Ofertas black friday");

        return $this->render('blackfriday/blackfriday_page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
        ]);
    }

    /**
     * @Route("/cyberlunes", name="cyberlunes_page")
     */
    public function cyberlunesAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));

        // Example without URL
        $breadcrumbs->addItem("Ofertas cyberlunes");

        return $this->render('cyberlunes/cyberlunes_page.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
        ]);
    }

    private function  getMainProducts(EntityManagerInterface $em) {
        $productRepository = $em->getRepository(Product::class);
//         $products = $productRepository->findByStore(2)->orderBy("created DESC");
        $products = $productRepository->findBy(
            array('store' => 2),
            array('created' => 'DESC')
            );

        return $products;
    }
}