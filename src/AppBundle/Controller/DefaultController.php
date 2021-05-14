<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
//         $trm = file_get_contents("http://app.docm.co/prod/Dmservices/Utilities.svc/GetTRM", true);

        // replace this example code with whatever you need
//         return $this->render('default/index.html.twig', [
//             'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//             'products' => $this->getMainProducts($em),
//             'categories' => $em->getRepository(Category::class)->findAll()
// //             'trm' => str_replace('"', '', $trm)
//         ]);

        $response = new Response(

            $this->renderView('default/index.html.twig', array(
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'products' => $this->getMainProducts($em),
                'categories' => $em->getRepository(Category::class)->findAll()
                //             'trm' => str_replace('"', '', $trm)
            ))
        );

        $headers = [
            'X-XSS-Protection' => '1; mode=block',
            'X-Content-Type-Options' => 'nosniff',
            'Strict-Transport-Security' => 'max-age=1; includeSubDomains; preload',
//             'Content-Security-Policy' => "default-src 'self'"
        ];

        $response->headers->add($headers);

        $etag = md5($response->getContent());

        $options = ['etag'          => $etag,
//             'last_modified' => new \DateTime(),
            'max_age'       => 3600,
            's_maxage'      => 3600];

        $response->setCache($options);

        $response->setPublic();
        $response->isNotModified($request);

        return $response;
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

    /**
     * @Route("/politica-de-privacidad", name="politica_privacidad")
     */
    public function politicaPrivacidadAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        // Simple example
        $breadcrumbs->addItem("Home", $this->get("router")->generate("homepage"));

        // Example without URL
        $breadcrumbs->addItem("Política de privacidad");

        return $this->render('default/politica-privacidad.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
        ]);
    }

    private function  getMainProducts(EntityManagerInterface $em) {
        $productRepository = $em->getRepository(Product::class);
//         $products = $productRepository->findByStore(2)->orderBy("created DESC");
        $products = $productRepository->findBy(
            array(),
            array('modified' => 'DESC')
            );

        return $products;
    }
}