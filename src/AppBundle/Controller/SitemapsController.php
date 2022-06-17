<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Category;

class SitemapsController extends Controller
{
    /**
     * @Route("/sitemap.xml", name="sitemap")
     */
    public function sitemapsAction(Request $request)
    {
        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        $urls[] = array(
            'loc' => $this->get('router')->generate('homepage'),
            'changefreq' => 'daily',
            'priority' => '1.0'
        );

        $urls[] = array(
            'loc' => $this->get('router')->generate('stores_page'),
            'lastmod' => "2020-06-03",
            'changefreq' => 'daily',
            'priority' => '0.8'
        );

        $urls[] = array(
            'loc' => $this->get('router')->generate('deals_page'),
            'lastmod' => "2020-04-03",
            'changefreq' => 'daily',
            'priority' => '0.8'
        );

        $urls[] = array(
            'loc' => $this->get('router')->generate('blackfriday_page'),
            'lastmod' => "2020-01-03",
            'changefreq' => 'daily',
            'priority' => '0.8'
        );

        $urls[] = array(
            'loc' => $this->get('router')->generate('cyberlunes_page'),
            'lastmod' => "2020-03-03",
            'changefreq' => 'daily',
            'priority' => '0.8'
        );

//         // incluye urls multiidioma
//         foreach($languages as $lang) {
//             $urls[] = array(
//                 'loc' => $this->get('router')->generate('web_quienes_somos', array(
//                     '_locale' => $lang
//                 )),
//                 'changefreq' => 'monthly',
//                 'priority' => '0.3'
//             );

//             $urls[] = array(
//                 'loc' => $this->get('router')->generate('web_contacto', array(
//                     '_locale' => $lang
//                 )),
//                 'changefreq' => 'monthly',
//                 'priority' => '0.3'
//             );

//             // ...
//         }

        return $this->render('sitemaps/sitemap.xml.twig', array(
            'urls'     => $urls,
            'hostname' => $hostname
        ));
    }

    /**
     * @Route("/sitemap_index.xml", name="sitemap_index")
     */
    public function sitemapIndexAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        $urls[] = array(
            'loc' => $this->get('router')->generate('sitemap'),
            'lastmod' => "2020-07-10",
            'changefreq' => 'daily',
            'priority' => '1.0'
        );

        $products = $em->getRepository('AppBundle:Product')->findOneBy(array(), array("modified" => "DESC"));
        $lastModified = $products->getModified();

        $urls[] = array(
            'loc' => $this->get('router')->generate('sitemap_posts'),
            'lastmod' => $lastModified,
            'changefreq' => 'daily',
            'priority' => '0.8'
        );

        $urls[] = array(
            'loc' => $this->get('router')->generate('sitemap_categories'),
            'lastmod' => $lastModified,
            'changefreq' => 'daily',
            'priority' => '0.7'
        );

        return $this->render('sitemaps/sitemap_index.xml.twig', array(
            'urls'     => $urls,
            'hostname' => $hostname
        ));
    }

    /**
     * @Route("/sitemap_posts.xml", name="sitemap_posts")
     */
    public function sitemapPostsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        // incluye url página inicial
        $urls[] = array(
            'loc' => $this->get('router')->generate('homepage'),
            'changefreq' => 'weekly',
            'priority' => '1.0'
        );

        // incluye urls multiidioma
//         foreach($languages as $lang) {
//             $urls[] = array(
//                 'loc' => $this->get('router')->generate('web_quienes_somos', array(
//                     '_locale' => $lang
//                 )),
//                 'changefreq' => 'monthly',
//                 'priority' => '0.3'
//             );

//             $urls[] = array(
//                 'loc' => $this->get('router')->generate('web_contacto', array(
//                     '_locale' => $lang
//                 )),
//                 'changefreq' => 'monthly',
//                 'priority' => '0.3'
//             );

//             // ...
//         }

        // incluye urls desde base de datos
//         $categorias = $em->getRepository('AnnBundle:Category')->findAll();
//         foreach ($categorias as $item) {
//             $urls[] = array(
//                 'loc' => $this->get('router')->generate('web_categoria', array(
//                     'slug' => $item->getSlug()
//                 )),
//                 'priority' => '0.5'
//             );
//         }

        $products = $em->getRepository('AppBundle:Product')->findAll();
        foreach ($products as $item) {
            $urls[] = array(
                'loc' => $this->get('router')->generate('product_detail', array(
                    '_category' => $item->getCategory()->getUrlName(),
                    '_url_name' => $item->getUrlName(),
                    '_id' => $item->getId()
                )),
                'priority' => '0.7',
                'lastmod' => $item->getModified(),
                'image' => $item->getImage(),
                'name' => $item->getName()
            );
        }

        return $this->render('sitemaps/sitemap.xml.twig', array(
            'urls'     => $urls,
            'hostname' => $hostname
        ));
    }

    /**
     * @Route("/sitemap_categories.xml", name="sitemap_categories")
     */
    public function sitemapCategoriesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        // incluye url página inicial
        $urls[] = array(
            'loc' => $this->get('router')->generate('homepage'),
            'changefreq' => 'weekly',
            'priority' => '1.0'
        );

        // incluye urls multiidioma
        //         foreach($languages as $lang) {
        //             $urls[] = array(
        //                 'loc' => $this->get('router')->generate('web_quienes_somos', array(
        //                     '_locale' => $lang
        //                 )),
        //                 'changefreq' => 'monthly',
        //                 'priority' => '0.3'
        //             );

        //             $urls[] = array(
            //                 'loc' => $this->get('router')->generate('web_contacto', array(
                //                     '_locale' => $lang
            //                 )),
        //                 'changefreq' => 'monthly',
            //                 'priority' => '0.3'
            //             );

        //             // ...
        //         }

        // incluye urls desde base de datos
        //         $categorias = $em->getRepository('AnnBundle:Category')->findAll();
        //         foreach ($categorias as $item) {
        //             $urls[] = array(
        //                 'loc' => $this->get('router')->generate('web_categoria', array(
            //                     'slug' => $item->getSlug()
            //                 )),
        //                 'priority' => '0.5'
        //             );
        //         }

        /**
         *
         * @var Category $categories
         */
        $categories = $em->getRepository('AppBundle:Category')->findAll();

        foreach ($categories as $item) {

            $lastProduct = $em->getRepository("AppBundle:Product")->findOneBy(array("category" => $item), array("modified" => "DESC"));

            if (!empty($lastProduct)) {
                $lastModified = $lastProduct->getModified();
            } else {
                $lastModified = null;
            }

            $urls[] = array(
                'loc' => $this->get('router')->generate('category', array(
                    '_category' => $item->getUrlName()
                )),
                'priority' => '0.5',
                'lastmod' => $lastModified,
                'image' => $item->getImage(),
                'name' => $item->getName()
            );
        }

        return $this->render('sitemaps/sitemap.xml.twig', array(
            'urls'     => $urls,
            'hostname' => $hostname
        ));
    }
}