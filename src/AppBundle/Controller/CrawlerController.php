<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\CategoryMapping;

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
            case "ktr_sam_cel": #OK job en cpanel -> 12AM CHECK
//                 $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
//                 $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung?p=2";
//                 $url = "https://www.ktronix.com/telefonos-celulares/ver/samsung";
                $url = "https://www.ktronix.com/celulares/telefonos-celulares/c/BI_101_KTRON?q=%3Arelevance%3Abrand%3ASAMSUNG#";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Samsung");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Celulares");
                $_idCategory = $category->getId();

                break;
            case "ktr_sony_tv": #OK job en cpanel -> 12:05AM CHECK
//                 $url = "https://www.ktronix.com/tv/televisores/ver/sony/";
                $url = "https://www.ktronix.com/tv-video/televisores/c/BI_120_KTRON?q=%3Arelevance%3Abrand%3ASONY#";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Sony");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Televisores");
                $_idCategory = $category->getId();

                break;
            case "ktr_apple_comp": #OK job en cpanel -> 12:30AM CHECK
//                 $url = "https://www.ktronix.com/computadores-y-tablets/computadores-portatiles/ver/apple/";
                $url = "https://www.ktronix.com/computadores-tablets/computadores-portatiles/c/BI_104_KTRON?q=%3Arelevance%3Abrand%3AAPPLE#";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Apple");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Computadores");
                $_idCategory = $category->getId();

                break;
            case "ktr_lg_tv": #OK job en cpanel -> 12:50AM CHECK
//                 $url = "https://www.ktronix.com/tv/televisores/ver/lg/";
                $url = "https://www.ktronix.com/tv-video/televisores/c/BI_120_KTRON?q=%3Arelevance%3Abrand%3ALG#";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("LG");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Televisores");
                $_idCategory = $category->getId();

                break;
            case "ktr_apple_cel": #OK job en cpanel -> 6AM
//                 $url = "https://www.ktronix.com/telefonos-celulares/ver/apple";
                $url = "https://www.ktronix.com/celulares/telefonos-celulares/c/BI_101_KTRON?q=%3Arelevance%3Abrand%3AAPPLE";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Apple");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Celulares");
                $_idCategory = $category->getId();

                break;
            case "ktr_ps_vg": #OK job en cpanel -> 9AM y 5PM CHECK
//                 $url = "https://www.ktronix.com/videojuegos/play-station-ps3-ps4-psvita-move";
                $url = "https://www.ktronix.com/marcas/playstation/c/playstation";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Playstation");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Videojuegos");
                $_idCategory = $category->getId();

                break;
            case "ktr_asus_com": #OK job en cpanel -> 10AM y 5PM
//                 $url = "https://www.ktronix.com/computadores-y-tablets/ver/asus/";
                $url = "https://www.ktronix.com/computadores-tablets/computadores-portatiles/c/BI_104_KTRON?q=%3Arelevance%3Abrand%3AASUS";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("ASUS");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Computadores");
                $_idCategory = $category->getId();

                break;
            case "ktr_lg_lavsec": #OK job en cpanel -> 4AM
//                 $url = "https://www.ktronix.com/electro/lavadoras/lavadoras-secadoras/ver/lg/#lineal";
                $url = "https://www.ktronix.com/electrodomesticos/grandes-electrodomesticos/lavado/c/BI_0600_KTRON?q=%3Arelevance%3Abrand%3ALG";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("LG");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Lavadora Secadora");
                $_idCategory = $category->getId();

                break;
            case "ktr_sam_swa": #OK job en cpanel -> 5:30PM
//                 $url = "https://www.ktronix.com/relojes-inteligentes/ver/samsung";
                $url ="https://www.ktronix.com/smartwatch/relojes-inteligentes-bandas-actividad/c/BI_143_KTRON?q=%3Arelevance%3Abrand%3ASAMSUNG#";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Samsung");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("SmartWatch");
                $_idCategory = $category->getId();

                break;
            case "ktr_ost_ele": #OK job en cpanel -> 5AM
//                 $url = "https://www.ktronix.com/electro/electrodomesticos/ver/oster/#lineal";
                $url = "https://www.ktronix.com/electrodomesticos/pequenos-electrodomesticos/preparacion-alimentos/c/BI_0540_KTRON?q=%3Arelevance%3Abrand%3AOSTER";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Oster");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Electrodomésticos");
                $_idCategory = $category->getId();

                break;
            case "ktr_son_aud": #OK job en cpanel -> 7AM
//                 $url = "https://www.ktronix.com/audio/ver/sony/#lineal";
                $url = "https://www.ktronix.com/audio/audio-hogar/c/BI_112_KTRON?q=%3Arelevance%3Abrand%3ASONY";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Sony");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Audio");
                $_idCategory = $category->getId();

                break;
            case "ktr_bos_aud": #OK job en cpanel -> 2PM
//                 $url = "https://www.ktronix.com/audio/ver/bose/#lineal";
                $url = "https://www.ktronix.com/marcas/bose/c/bose";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Bose");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Audio");
                $_idCategory = $category->getId();

                break;
            case "ktr_len_com": #OK job en cpanel -> 3AM
                $url = "https://www.ktronix.com/computadores-tablets/computadores-portatiles/c/BI_104_KTRON?q=%3Arelevance%3Abrand%3ALENOVO";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Lenovo");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Computadores");
                $_idCategory = $category->getId();

                break;
            case "ktr_sam_lavsec": #OK job en cpanel -> 10AM y 5PM
                $url = "https://www.ktronix.com/electrodomesticos/grandes-electrodomesticos/lavado/c/BI_0600_KTRON?q=%3Arelevance%3Abrand%3ASAMSUNG#";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Samsung");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Lavadora Secadora");
                $_idCategory = $category->getId();

                break;
            case "ktr_evo_ejefit": #OK job en cpanel -> 10AM y 5PM
                $url = "https://www.ktronix.com/deportes/ejercicio-fitness/c/BI_182_KTRON?q=%3Arelevance%3Abrand%3AEVOLUTION";
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("Ktronix");
                $_idStore = $store->getId();
                $brand = $doctrine->getRepository('AppBundle:Brand')->findOneByName("Evolution Fitness");
                $_idBrand = $brand->getId();
                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByName("Pesos");
                $_idCurrency = $currency->getId();
                $category = $doctrine->getRepository('AppBundle:Category')->findOneByName("Ejercicio y Fitness");
                $_idCategory = $category->getId();

                break;
            case "meli_mco_search":

                $items = $this->meliSearchBySite("MCO", urlencode("dia sin iva"));
                $store = $doctrine->getRepository('AppBundle:Store')->findOneByName("MercadoLibre Colombia");

                break;
            case "meli_get_cat":
                $importCategories = $this->importCategoriesMappingByMeli("MCO");
                break;
            default:
                $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
                break;
        endswitch;


        if ($_idGetData == "meli_get_cat") {
            $response = new Response(json_encode($importCategories));
            $response->headers->set('Content-Type', 'application/json');
        } elseif ($_idGetData == "meli_mco_search") {

            foreach ($items as $item) {
                $id = $item->id;
                $title = $item->title;
                $price = $item->price;
                $salePrice = $item->sale_price;
                $currencyId = $item->currency_id;
                $url = $item->permalink;
                $img = $item->thumbnail;
                $externalCatergoryId = $item->category_id;

                $attributes = $item->attributes;

                $brand = null;
                foreach ($attributes as $key => $attribute) {
                    if ($attribute->id == "BRAND") {
                        $externalBrand = $attribute->value_name;

                        if ($externalBrand) {
                            $brand = $doctrine->getRepository('AppBundle:Brand')->findBrandThatContainsString($externalBrand);
                        }
                        break;
                    }
                }

                $urlGetDescription = "https://api.mercadolibre.com/items/" . $id . "/description";
                $itemDescription = @file_get_contents($urlGetDescription, true);

                if (!empty($itemDescription)) {
                    $itemDescriptionFromMeli = json_decode($itemDescription);
                    $description = $itemDescriptionFromMeli->plain_text;
                }

                if (empty($description)) {
                    $description = $title;
                }

                $product = new Product();
                $doctrine = $this->getDoctrine();
//var_dump($brand);

                $item = $doctrine->getRepository("AppBundle:Product")->findOneByUrl($url);
                if (!empty($item)) {
                    $update = true;
                    $product = $item;
                    $product->setModified(new \DateTime());
                }

                $product->setName($title);
                $product->setBrand($brand);
                $shortDescription = mb_substr($description, 0, 250);
                $product->setDescription($shortDescription . "...");
                $product->setLongDescription($description);
                $product->setPrice($price);
                $product->setImage($img);
                $product->setUrl($url);
                $product->setOriginalUrl($url);
                $product->setSpecialPrice($salePrice);

                $currency = $doctrine->getRepository('AppBundle:Currency')->findOneByDescription($currencyId);
                $product->setCurrency($currency);

                $product->setStore($store);

                $categoryMapping = $this->getCategoryFromMeli($externalCatergoryId);
//MCO118449
                if ($categoryMapping) {
                    $category = $categoryMapping->getCategory();
                }

                $product->setCategory($category);

                $em = $doctrine->getManager();
                $em->persist($product);
                $em->flush();
//$catname = " ";
//if ($product->getCategory()) $catname = " -- " . $product->getCategory()->getName() . "--";

                $productsSended[] = $product->getName();
            }

            $response = new Response(json_encode($productsSended));
            $response->headers->set('Content-Type', 'application/json');
        } else {


            $html = file_get_contents($url, true);

            if ($html === false) {
                error_log("getDataAction error " . $e->getMessage() . " / code / " . $e->getCode());
                $response = new Response(json_encode($e->getMessage()));
                $response->headers->set('Content-Type', 'application/json');

            } else {
                $crawler = new Crawler($html);

    //             $nodeValues = $crawler->filter('.col-main .products-grid .item')->each(function (Crawler $node, $i) use ($_idStore, $_idBrand, $_idCurrency, $_idCategory) {

    //                 $product = $this->parseDataFromKtronix($node, $_idStore, $_idBrand, $_idCurrency, $_idCategory);

    //                 return $product->getName();

    //             });

                /**
                 * Crawler new Ktronix
                 */
    //             $nodeValues = $crawler->filter('.category-page .category-page--list .product__list--wrapper .product__listing.product__list .product__list--item')->each(function (Crawler $node, $i) use ($_idStore, $_idBrand, $_idCurrency, $_idCategory) {
                $nodeValues = $crawler->filter('.category-page .product__list--wrapper .product__listing.product__list .product__list--item')->each(function (Crawler $node, $i) use ($_idStore, $_idBrand, $_idCurrency, $_idCategory) {

                    $product = $this->parseDataFromNewKtronix($node, $_idStore, $_idBrand, $_idCurrency, $_idCategory);

                    return $product->getName();

                });

                $response = new Response(json_encode($nodeValues));
                $response->headers->set('Content-Type', 'application/json');
            }
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

    private function parseDataFromNewKtronix($node, $_idStore, $_idBrand, $_idCurrency, $_idCategory) {

        $domain = "https://www.ktronix.com";

        $productName = $node->filter(".product__information .product__information--name a");
//         var_dump($productName->text());
//         var_dump($productName->attr("href"));
        $productImg = $node->filter(".product__image img");
//         var_dump($productImg->attr("data-src"));
        $oldPrice = $node->filter(".product__price.product__price--flex .product__price--discounts .product__price--discounts__old");
//         var_dump($oldPrice->text());
        $specialPrice = $node->filter(".price-box .special-price .price .price");
//         var_dump($specialPrice->count());
        $regularPrice = $node->filter(".product__price.product__price--flex .product__price--discounts .product__price--discounts__price .price");
//         var_dump($regularPrice->text());

//         $info = $node->filter(".product__information .product__information--flex");

        $specs = $node->filter(".product__information .product__information--flex .product__information--specifications .product__information--specifications__block");
//         var_dump($specs->text());
//         var_dump($specs->html());

        $features = $node->filter(".product__information .product__information--flex .product__information--characteristics .product__information--characteristics__block");
//         var_dump($features->text());
//         var_dump($features->html());

        $product = new Product();
        $doctrine = $this->getDoctrine();

        if ($productName->count() > 0) {
            $name = $productName->text();
            $originalUrl = $productName->attr("href");
//             $url = str_replace("http://", "https://", $url);
            $url = $domain . $originalUrl;

            $update = false;
            $item = $doctrine->getRepository("AppBundle:Product")->findOneByOriginalUrl($originalUrl);
            if (!empty($item)) {
                $update = true;
                $product = $item;
                $product->setModified(new \DateTime());
            }

            $product->setName($name);
            $product->setUrl($url);
            $product->setOriginalUrl($originalUrl);
        }

        if ($productImg->count() > 0) {
            $image = $productImg->attr("data-src");
            $image = $domain . $image;
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

        $description = "";

        try {
            $info1 = $specs->html();
            $description .= $info1 . "<br>";
        } catch (\Exception $e) {
            error_log("error - The current node list is empty." . $e);
        }

        try {
            $info2 = $features->html();
            $description .= $info2;
        } catch (\Exception $e) {
            error_log("error - The current node list is empty." . $e);
        }

//         $description = $specs->html() . "<br>" . $features->html();

        $product->setDescription($description);

//         if ($update) {
            $longDescription = $this->getProductNewDescription($product);
    //         var_dump($longDescription);
            if (isset($longDescription) and !empty($longDescription)) {
                if (is_array($longDescription)) {
                    $longDesc = trim($longDescription[0]);
    //                 var_dump($longDesc);exit;
                    $product->setLongDescription($longDesc);
    //                 $desc = mb_substr($longDesc, 0, 250);
    //                 $product->setDescription($desc . "...");
                }
            }
//         }

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

    private function getProductNewDescription(Product $product) {

        $url = $product->getUrl();

        $html = file_get_contents($url, true);

        if ($html === false) {
            error_log("getProductDescription error " . $e->getMessage() . " / code / " . $e->getCode());
            $nodeValues = null;
        } else {
            $crawler = new Crawler($html);
            $nodeValues = $crawler->filter('.product-details .row.hidden-xs.hidden-sm .short-description .tab-details .tab-details__description')->each(function (Crawler $node, $i) {
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

    private function meliSearchBySite($site, $searchTerm) {
        $url = "https://api.mercadolibre.com/sites/" . $site . "/search?q=" . $searchTerm . "&limit=20";

        $items = file_get_contents($url, true);
        $itemsFromMeli = json_decode($items);

        $products = $itemsFromMeli->results;
        
        return $products;
    }

    private function importCategoriesMappingByMeli($site) {
        ///sites/$SITE_ID/search?category=$CATEGORY_ID
        ///categories/$CATEGORY_ID

        $url = "https://api.mercadolibre.com/sites/" . $site . "/categories";

        $meliCategories = file_get_contents($url, true);

        $categoriesFromMeli = json_decode($meliCategories);

        foreach ($categoriesFromMeli as $category) {
            
            $externalId = $category->id;
            $externalName = $category->name;

            $categoryMapping = new CategoryMapping();
            $doctrine = $this->getDoctrine();

            $categoryMapping->setExternalId($externalId);
            $categoryMapping->setDescription($externalName);

            $item = $doctrine->getRepository("AppBundle:CategoryMapping")->findOneByExternalId($externalId);
            if (!empty($item)) {
                $update = true;
                $categoryMapping = $item;
                $date = new \DateTime();
                $categoryMapping->setDescription($externalName . " " . $date->format('Y-m-d H:i:s'));
            }

            $em = $doctrine->getManager();
            $em->persist($categoryMapping);
            $em->flush();
        }

        return json_encode("Categorias externas incluidas en DB");
    }

    public function getCategoryFromMeli($externalCatergoryId, $flag = false)
    {
        $categoryMapping = $this->existsCategoryMapping($externalCatergoryId);

        //echo "<br><div> $externalCatergoryId </div>";

        if (empty($categoryMapping)) {

            if ($flag == false) {
                $categoryDataFromMeli = $this->getDataFromCategoryMeli($externalCatergoryId);

                //var_dump($categoryDataFromMeli);
                //echo "<br>";
            }
//var_dump($categoryDataFromMeli->path_from_root);
            foreach ($categoryDataFromMeli->path_from_root as $key => $data) {
                //$externalCatergoryId = $data->id;
//echo $externalCatergoryId . "-" .$key . "<br>";
                $categoryMapping = $this->existsCategoryMapping($data->id);

                if (!empty($categoryMapping)) {
                    //echo $categoryMapping->getCategory()->getId();
                    $flag = true;
                    return $categoryMapping;
                }
            }
        } else {
            return $categoryMapping;
        }
    }

    public function existsCategoryMapping($externalCatergoryId)
    {
        $doctrine = $this->getDoctrine();
        $categoryMapping = $doctrine->getRepository('AppBundle:CategoryMapping')->findOneByExternalId($externalCatergoryId);

        if (!empty($categoryMapping) && empty($categoryMapping->getCategory())) {
            $categoryMapping = null;
        }

        return $categoryMapping;
    }

    public function getDataFromCategoryMeli($externalCatergoryId)
    {
        $getDataFromExternalCategory = "https://api.mercadolibre.com/categories/" . $externalCatergoryId;
        $categoryData = @file_get_contents($getDataFromExternalCategory, true);
        $categoryDataFromMeli = json_decode($categoryData);

        return $categoryDataFromMeli;
    }
}