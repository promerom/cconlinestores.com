<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Store;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DomCrawler\Crawler;
use AppBundle\Entity\Product;
use Symfony\Component\HttpClient\HttpClient;
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
			case "ebay_get_categories":
				$category_tree_id = 0;
				$ebayDomain = $this->getEbayDomain();

				$url = "$ebayDomain/commerce/taxonomy/v1/category_tree/$category_tree_id";

				$oauthEbayApplicationToken = $this->getEbayOauthApplicationToken();
				$getHeaders = [
					'Authorization' => 'Bearer ' . $oauthEbayApplicationToken
				];
				$importedCategories = $this->importCategoriesMappingByEbay($url, $getHeaders);
				return $this->setResponse($importedCategories);
				break;
			case "ebay_get_subcategories":
				$ebayDomain = $this->getEbayDomain();
				$page = $_GET["page"];
				$category_tree_id = 0;
				//$category_id = 220;

				//$ebayCategories = $doctrine->getRepository("AppBundle:CategoryMapping")->findCategoriesByExternalId();
				$total = 3;
				$start = ($page * $total) - $total;
				//echo "start: " . $start . " total: " . $total . "<br>";
				$ebayCategories = $doctrine->getRepository("AppBundle:CategoryMapping")->findEbayCategoriesByExternalIdPaginado($start, $total);
				$importedSubcategories = array();
				if (count($ebayCategories) == 0) {
					$importedSubcategories = array("Se procesaron todas las categorias de Ebay, $total por pagina");
				}

				foreach ($ebayCategories as $ebayCategory) {
				   $externalCategoryId = $ebayCategory["externalId"];

				   $externalCategoryIdSeparado = explode("_", $externalCategoryId);

				   $categoryExternalId = $externalCategoryIdSeparado[2];

					$url = "$ebayDomain/commerce/taxonomy/v1/category_tree/$category_tree_id/get_category_subtree?category_id=$categoryExternalId";
					$oauthEbayApplicationToken = $this->getEbayOauthApplicationToken();
					$getHeaders = [
						'Authorization' => 'Bearer ' . $oauthEbayApplicationToken
					];
					array_push($importedSubcategories, $this->importCategoriesMappingByEbay($url, $getHeaders));
					//$importedSubcategories = $this->importCategoriesMappingByEbay($url, $getHeaders);
					//echo $ebayCategory["description"] . " ID " . $ebayCategory["externalId"] . "<br>";
					//echo count($importedSubcategories);
					//var_dump($importedSubcategories);
					//echo "<br>";
				}

				//echo count($importedSubcategories);
				//return false;
				//var_dump($importedSubcategories);return false;
				return $this->setResponse($importedSubcategories);
				break;
			case "ebay_finding_api":
				$url = $this->getEbayDomain2();

				$store = $doctrine->getRepository('AppBundle:Store')->findOneByName("eBay");

				$getParams = [
					"OPERATION-NAME" => "findItemsByKeywords",
					"SECURITY-APPNAME" => $this->getEbayAppName(),
					"RESPONSE-DATA-FORMAT" => "JSON",
					"REST-PAYLOAD" => "",
					"keywords" => $_GET['keywords'] ?? "smartphone",
					"paginationInput.entriesPerPage" => $_GET['results'] ?? 50
				];

				$response = $this->getDataFromEbayAndSaveInDB($url, $getParams, $store);
				return $this->setResponse($response);
				break;
            default:
                $url = "https://www.ktronix.com/telefonos-celulares/celulares-libres/samsung";
                break;
        endswitch;

        if ($_idGetData == "meli_get_cat") {
			$response = $this->setResponse($importCategories);
		} elseif ($_idGetData == "meli_mco_search") {

			$productsSended = $this->parseDataFromMeliMCO($items, $store);

			$response = $this->setResponse($productsSended);
        } else {

            $html = file_get_contents($url, true);

            if ($html === false) {
                error_log("getDataAction error " . $e->getMessage() . " / code / " . $e->getCode());
				$response = $this->setResponse(array($e->getMessage()));

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

				$response = $this->setResponse($nodeValues);
			}
        }
//         $html = file_get_contents($url);

        return $response;

//         return $this->render('AppBundle:Crawler:get_data.html.twig', array(
            // ...
//         ));
    }

	/**
	 * @param $data
	 * @return void
	 */
	public function persistData($data): void
	{
		$doctrine = $this->getDoctrine();
		$em = $doctrine->getManager();
		$em->persist($data);
		$em->flush();
	}

	/**
	 * @param $items
	 * @param $store
	 * @return array
	 */
	public function parseDataFromMeliMCO($items, $store): array
	{
		$doctrine = $this->getDoctrine();
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
			//$doctrine = $this->getDoctrine();
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
			$category = null;
			if ($categoryMapping) {
				$category = $categoryMapping->getCategory();
			}

			$product->setCategory($category);

			$this->persistData($product);

//$catname = " ";
//if ($product->getCategory()) $catname = " -- " . $product->getCategory()->getName() . "--";

			$productsSended[] = $product->getName();
		}
		return $productsSended;
	}

	/**
	 * @param string $url
	 * @param array $getParams
	 * @param Store $store
	 * @return array
	 * @throws GuzzleException
	 */
	public function getDataFromEbayAndSaveInDB(string $url, array $getParams,Store $store)
	{
		//$client = new Client(['base_uri' => 'https://svcs.sandbox.ebay.com']);
		$client = new Client();
		try{
			$res = $client->request('GET', $url, [
				'query' => $getParams
			]);
		} catch (RequestException $e) {
			$error = $e->getResponse()->getBody()->getContents();
			error_log($error);
			return array($e->getCode(), $e->getMessage());
		}

		$ebayResponse = json_decode($res->getBody()->getContents(), true);

		//var_dump($ebayResponse["findItemsByKeywordsResponse"]);

		$items = ($ebayResponse["findItemsByKeywordsResponse"][0]["searchResult"][0]["item"] ?? array());

		$doctrine = $this->getDoctrine();

		foreach ($items as $item) {
			$itemId = $item["itemId"][0];
			$title = $item["title"][0];
			$externalCategoryName = $item["primaryCategory"][0]["categoryName"][0];
			$externalCategoryId = $item["primaryCategory"][0]["categoryId"][0];
			$url = $item["viewItemURL"][0];
			$currencyId = $item["sellingStatus"][0]["currentPrice"][0]["@currencyId"];
			$price = $item["sellingStatus"][0]["currentPrice"][0]["__value__"];
			$img = $item["galleryURL"][0];

			$brand = null;
//var_dump($externalCategoryName);
			$description = null;
			if (empty($description)) {
				$description = $title . " " . $externalCategoryName;
			}

			$product = new Product();

			$itemExists = $doctrine->getRepository("AppBundle:Product")->findOneByOriginalUrl($url);
			if (!empty($itemExists)) {
				$update = true;
				$product = $itemExists;
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
			$product->setSpecialPrice($price);

			if ($currencyId != "USD" && $currencyId != "COP") {
				$currencyId = $item["sellingStatus"][0]["convertedCurrentPrice"][0]["@currencyId"];
			}

			$currency = $doctrine->getRepository('AppBundle:Currency')->findOneByDescription($currencyId);
			$product->setCurrency($currency);

			$product->setStore($store);

			//$categoryMapping = $this->getCategoryFromMeli($externalCategoryId);

			$categoryMapping = $doctrine->getRepository("AppBundle:CategoryMapping")->findCategoryMappingFromEbayExternalId($externalCategoryId);
//MCO118449
			if ($categoryMapping) {
				$category = $categoryMapping->getCategory();
			}

			$product->setCategory($category);

			$this->persistData($product);
		}

		return $items;
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function setResponse(array $data): Response
	{
		$response = new Response(json_encode($data));
		$response->headers->set('Content-Type', 'application/json');
		return $response;
	}

	/**
	 * @param $url
	 * @param array $getHeaders
	 * @return array
	 * @throws GuzzleException
	 */
	public function importCategoriesMappingByEbay($url, array $getHeaders): array
	{

		try{
			$client = new Client();
			//var_dump($postHeaders);
			$response = $client->request("GET", $url, [
				'headers' => $getHeaders
			]);

			$ebayCategories = json_decode($response->getBody()->getContents(), true);

			if (isset($ebayCategories["rootCategoryNode"])) {
				$externalCategories = $ebayCategories["rootCategoryNode"]["childCategoryTreeNodes"];
			} elseif (isset($ebayCategories["categorySubtreeNode"])) {
				$externalCategories = $ebayCategories["categorySubtreeNode"]["childCategoryTreeNodes"];
			}

			$tmp = array();
			$externalCategoriesFromEbay = $this->getCategoriesFromEbay($externalCategories, $tmp);
			//echo count($externalCategoriesFromEbay);
			foreach ($externalCategoriesFromEbay as $externalCategory) {
				$externalCategoryId = $externalCategory["id"];
				$externalCategoryName = $externalCategory["name"];

				$categoryMapping = new CategoryMapping();
				$doctrine = $this->getDoctrine();

				$categoryMapping->setExternalId($externalCategoryId);
				$categoryMapping->setDescription($externalCategoryName);
				$otrasCategoriasCategory = $doctrine->getRepository("AppBundle:Category")->findOneByUrlName("otras-categorias");
				$categoryMapping->setCategory($otrasCategoriasCategory);

				$categoryInCategoryMapping = $doctrine->getRepository("AppBundle:CategoryMapping")->findOneByExternalId($externalCategoryId);
				if (!empty($categoryInCategoryMapping)) {
					$categoryMapping = $categoryInCategoryMapping;
					$date = new \DateTime();
					$categoryMapping->setDescription($externalCategoryName . " " . $date->format('Y-m-d H:i:s'));
				}

				$this->persistData($categoryMapping);
			}
			//var_dump($externalCategoriesFromEbay);
			return $externalCategoriesFromEbay;
		}catch (RequestException $e) {
			$error = $e->getResponse()->getBody()->getContents();
			error_log($error);
			return array($error, $e->getCode(), $e->getMessage());
		}

		return json_encode("Categorias externas by eBay incluidas en DB");
	}

	/**
	 * @param $externalCategories
	 * @param $ebayCategories
	 * @return array
	 */
	public function getCategoriesFromEbay($externalCategories, &$ebayCategories): array
	{
		foreach ($externalCategories as $key => $externalCategory) {
			$externalCategoryName = $externalCategory["category"]["categoryName"];
			$externalCategoryId = $externalCategory["category"]["categoryId"];
			$isSubcategory = 'CAT_' . $externalCategoryId;

			if (isset($externalCategory["categoryTreeNodeLevel"]) && $externalCategory["categoryTreeNodeLevel"] != 1){
				$isSubcategory = 'SUBCAT_' . $externalCategoryId . '_' .  $externalCategory["categoryTreeNodeLevel"];
			}

			$ebayCategories[] = [
				"id" => "EBAY_$isSubcategory",
				"name" => $externalCategoryName
			];
			//echo $keyForExternalCategories . " -- ";
			//$keyForExternalCategories++;
			//echo count($ebayCategories); echo "<br>";
			//echo $externalCategoryName . "<br>";

			if (isset($externalCategory["categoryTreeNodeLevel"]) && $externalCategory["categoryTreeNodeLevel"] != 1 && !isset($externalCategory["leafCategoryTreeNode"]) && $externalSubcategories = $externalCategory["childCategoryTreeNodes"]) {
				$this->getCategoriesFromEbay($externalSubcategories, $ebayCategories);
			}
		}

		return $ebayCategories;
	}

	/**
	 * @return string
	 */
	public function getEbayOauthApplicationToken(): string
	{
		return $this->container->getParameter("EBAY_OAUTH_APPLICATION_TOKEN");
	}

	/**
	 * @return string
	 */
	public function getEbayDomain(): string
	{
		return $this->container->getParameter("EBAY_DOMAIN");
	}

	/**
	 * @return string
	 */
	public function getEbayDomain2(): string
	{
		$url = $this->container->getParameter("EBAY_DOMAIN_2");
		return $url;
	}

	/**
	 * @return string
	 */
	public function getEbayAppName(): string
	{
		return "PlinioRo-cconline-SBX-bd28d4866-e50e3ae1";

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
		$this->persistData($product);
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
		$this->persistData($product);
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
        $url = "https://api.mercadolibre.com/sites/" . $site . "/search?q=" . $searchTerm . "&limit=50";

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

			$this->persistData($categoryMapping);
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
