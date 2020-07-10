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
     *  "getdata/{_idGetData}",
     *  defaults={
     *      "_idGetData": "ktr_sam_cel",
     *  },
     *  requirements={
     *  },
     *  methods={"GET","HEAD"},
     *  name="get_data")
     */
    public function getDataAction($_idGetData)
    {
        $doctrine = $this->getDoctrine();
        switch ($_idGetData):
            case "ktr_sam_cel":
//                 $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
//                 $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung?p=2";
                $url = "https://www.ktronix.com/telefonos-celulares/ver/samsung";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Samsung");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Celulares");
                $_idCategory = $category->getId();

                break;
            case "ktr_sony_tv":
                $url = "https://www.ktronix.com/tv/televisores/ver/sony/";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Sony");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Televisores");
                $_idCategory = $category->getId();

                break;
            case "ktr_apple_comp":
                $url = "https://www.ktronix.com/computadores-y-tablets/computadores-portatiles/ver/apple/";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Apple");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Computadores");
                $_idCategory = $category->getId();

                break;
            case "ktr_lg_tv":
                $url = "https://www.ktronix.com/tv/televisores/ver/lg/";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("LG");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Televisores");
                $_idCategory = $category->getId();

                break;
            case "ktr_apple_cel":
                $url = "https://www.ktronix.com/telefonos-celulares/ver/apple";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Apple");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Celulares");
                $_idCategory = $category->getId();

                break;
            case "ktr_ps_vg":
                $url = "https://www.ktronix.com/videojuegos/play-station-ps3-ps4-psvita-move";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Playstation");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Videojuegos");
                $_idCategory = $category->getId();

                break;
            case "ktr_asus_com":
                $url = "https://www.ktronix.com/computadores-y-tablets/ver/asus/";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("ASUS");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Computadores");
                $_idCategory = $category->getId();

                break;
            case "ktr_lg_lavsec":
                $url = "https://www.ktronix.com/electro/lavadoras/lavadoras-secadoras/ver/lg/#lineal";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("LG");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Lavadora Secadora");
                $_idCategory = $category->getId();

                break;
            default:
                $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
                break;
        endswitch;

        $html = file_get_contents($url, true);

        if ($html === false) {
            error_log("getDataAction error " . $e->getMessage() . " / code / " . $e->getCode());
            $response = new Response(json_encode($e->getMessage()));
            $response->headers->set('Content-Type', 'application/json');

        } else {
            $crawler = new Crawler($html);

            $nodeValues = $crawler->filter('.col-main .products-grid .item')->each(function (Crawler $node, $i) use ($_idStore, $_idBrand, $_idCurrency, $_idCategory) {

                $product = $this->parseDataFromKtronix($node, $_idStore, $_idBrand, $_idCurrency, $_idCategory);

                return $product->getName();

            });

            $response = new Response(json_encode($nodeValues));
            $response->headers->set('Content-Type', 'application/json');
        }

//         $html = file_get_contents($url);

        return $response;

//         return $this->render('AppBundle:Crawler:get_data.html.twig', array(
            // ...
//         ));
    }

    private function parseDataFromKtronix($node, $_idStore, $_idBrand, $_idCurrency, $_idCategory) {
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
            $url = str_replace("http://", "https://", $url);

            $item = $doctrine->getRepository("AppBundle:Product")->findOneByUrl($url);
            if (!empty($item)) {
                $update = true;
                $product = $item;
                $product->setModified(new \DateTime());
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

        $description = $this->getProductDescription($product);
        if (isset($description) and !empty($description)) {
            if (is_array($description)) {
                $longDesc = trim($description[0]);
                $product->setLongDescription($longDesc);
                $desc = mb_substr($longDesc, 0, 250);
                $product->setDescription($desc . "...");
            }
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

        $category = $doctrine
        ->getRepository('AppBundle:Category')
        ->find($_idCategory);
        $product->setCategory($category);

//         if (!isset($update)) {
            $em = $doctrine->getManager();
            $em->persist($product);
            $em->flush();
//         }

        return $product;
    }

    private function getProductDescription(Product $product) {
        $url = $product->getUrl();

        $html = file_get_contents($url, true);

        if ($html === false) {
            error_log("getProductDescription error " . $e->getMessage() . " / code / " . $e->getCode());
            $nodeValues = null;
        } else {
            $crawler = new Crawler($html);
            $nodeValues = $crawler->filter('.product-view .product-essential .short-description div.content')->each(function (Crawler $node, $i) {
                $desc = $node->html();
                $needle = "</style>";
                $ctrl = strpos($desc, $needle);

                if ($ctrl) {
                    $desc = stristr($desc, $needle);
                }

                return strip_tags($desc);
            });
        }
//         $html = file_get_contents($url);

        return $nodeValues;
    }

}