<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SitemapsController extends Controller
{
    /**
     * @Route("/sitemap.xml", name="sitemap")
     */
    public function sitemapAction(Request $request)
    {
        $urls = array();
        $hostname = $request->getSchemeAndHttpHost();

        $urls[] = array(
            'loc' => $this->get('router')->generate('homepage'),
            'lastmod' => "2018-10-27",
            'changefreq' => 'daily',
            'priority' => '1.0'
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

        return $this->render('sitemaps/sitemap.html.twig', array(
            'urls'     => $urls,
            'hostname' => $hostname
        ));
    }
}