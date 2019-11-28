<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class CrawlerController extends Controller
{
    /**
     * @Route(
     *  "getdata/{_idStore}/{_idBrand}/{_idCurrency}",
     *  defaults={
     *      "_idStore": "1",
     *      "_idBrand": "1",
     *      "_idCurrency": "1"
     *  },
     *  requirements={
     *      "_store": "\d+",
     *      "idCurrency": "\d+"
     *  },
     *  name="get_data")
     */
    public function getDataAction($_idStore, $_idBrand, $_idCurrency)
    {
        switch ($_idStore):
            case "1":
                $url = "https://www.falabella.com.co";
                break;
            case "2":
                $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
                break;
            default:
                $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
                break;
        endswitch;

        $html = file_get_contents($url);

        $crawler = new Crawler($html);

        $nodeValues = $crawler->filter('.products-grid .item')->each(function (Crawler $node, $i) use ($_idStore, $_idBrand, $_idCurrency) {

            $productName = $node->filter(".product-name a");
            $productImg = $node->filter(".product-image img");
            $oldPrice = $node->filter(".price-box .old-price .price-old");
            $specialPrice = $node->filter(".price-box .special-price .price .price");
            $regularPrice = $node->filter(".price-box .regular-price .price .price");

            $product = new Product();
            $doctrine = $this->getDoctrine();

            if ($productName->count() > 0) {
                $name = $productName->attr("title");
                $url = $productName->attr("href");

                $items = $doctrine->getRepository("AppBundle:Product")->findByUrl($url);
                if (empty($items)) {
                    $tmp = true;
                }

                $product->setName($name);
                $product->setUrl($url);
            }

            if ($productImg->count() > 0) {
                $image = $productImg->attr("data-src");
                $product->setImage($image);
            }

//             For delete special characteres in prices
            $array = array("$", ".", " ", "\n", chr(0xC2).chr(0xA0));
            if ($oldPrice->count() > 0) {
                $oldPrice = $oldPrice->text();

                $oldPrice = str_replace($array, "", $oldPrice);
                $product->setOldPrice(trim($oldPrice));
            }

            if ($specialPrice->count() > 0) {
                $specialPrice = $specialPrice->text();

                $specialPrice = str_replace($array, "", $specialPrice);
                $product->setSpecialPrice($specialPrice);
            }

            if ($regularPrice->count() > 0) {
                $price = $regularPrice->text();

                $price = str_replace($array, "", $price);
                $product->setPrice($price);
            }

            $currency = $doctrine
            ->getRepository('AppBundle:Currency')
            ->find($_idCurrency);
            $product->setCurrency($currency);

            $brand = $doctrine
            ->getRepository('AppBundle:Brand')
            ->find($_idBrand);
            $product->setBrand($brand);

            $store = $doctrine
            ->getRepository('AppBundle:Store')
            ->find($_idStore);
            $product->setStore($store);

            if (isset($tmp)) {
                $em = $doctrine->getManager();
                $em->persist($product);
                $em->flush();
            }

            return $product->getName();

        });

        $response = new Response(json_encode($nodeValues));
        $response->headers->set('Content-Type', 'application/json');

        return $response;

//         return $this->render('AppBundle:Crawler:get_data.html.twig', array(
            // ...
//         ));
    }

}
