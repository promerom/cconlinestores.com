<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MartinGeorgiev\SocialPost\Message;
use Symfony\Component\Routing\Generator\UrlGenerator;
use AppBundle\Entity\Product;
use MartinGeorgiev\SocialPost\SocialNetwork\Enum;
use MartinGeorgiev\SocialPost\SocialNetwork\Exception\FailureWhenPublishingMessage;

class AutoPostController extends Controller
{
    /**
     * @Route("/autopost/1", name="autopost_fb")
     */
    public function index(Request $request, $_route_params)
    {
        $doctrine = $this->getDoctrine();

        /**
         * @var Product $item
         */
        $item = $doctrine->getRepository("AppBundle:Product")->findOneBy(array("postOnFacebook" => null), array("modified" => "DESC"));

        if (!is_null($item)){
            $url = $this->get('router')->generate('product_detail',
                array(
                    '_category' => $item->getCategory()->getUrlName(),
                    '_url_name' => $item->getUrlName(),
                    '_id' => $item->getId()
                ),
                UrlGenerator::ABSOLUTE_URL);

    //         $url = str_replace("http://cconlinestores.lo", "https://cconlinestores.com", $url);
    //         $url = str_replace("193", "1", $url);
    //         $url = str_replace("236", "42", $url);

            if ($item->getSpecialPrice() != null) {
                $price = $item->getSpecialPrice();
            } elseif ($price = $item->getOldPrice() != null) {
                $price = $item->getOldPrice();
            } elseif ($price = $item->getPrice() != null) {
                $price = $item->getPrice();
            }

            $format = new \NumberFormatter("es", \NumberFormatter::CURRENCY);
            $formatPrice = $format->formatCurrency($price, $item->getCurrency()->getDescription());
            $symbol = $item->getCurrency()->getSymbol();
            $formatPrice = $symbol . $formatPrice;

            $hashtags = "#";
            $hashtags .= $item->getCategory()->getName();
            if ($item->getBrand()) {
                $hashtags .= " #" . $item->getBrand()->getName();
            }
            
            $hashtags .= " #" . $item->getStore()->getName();
            $hashtags .= " #Blackfriday #Blackfriday2022 #blackdays #diasiniva";

            $contentMessage = $item->getName() . " " . $formatPrice . " " . $hashtags;

            if (!$item->getPostOnFacebook()) {
                $msg = new Message($contentMessage, $url);
                $msg->setNetworksToPublishOn([Enum::FACEBOOK]);

                try {
                    $responseMsg = $this->get('social_post')->publish($msg);
                } catch (FailureWhenPublishingMessage $e) {
                    $response = new Response(json_encode($contentMessage . " ERROR: " . $e->getMessage()));
                    $response->headers->set('Content-Type', 'application/json');

                    return $response;
                }

                $item->setPostOnFacebook(true);
                $em = $doctrine->getManager();
                $em->persist($item);
                $em->flush();

                $response = new Response(json_encode($contentMessage . " RESPONSE: " . $responseMsg));
                $response->headers->set('Content-Type', 'application/json');
            } else {
                $response = new Response(json_encode($item->getName() . " ya fue publicado en FB"));
                $response->headers->set('Content-Type', 'application/json');
            }
        } else {
            $response = new Response("No hay items nuevos para publicar en FB");
            $response->headers->set('Content-Type', 'application/json');
        }
        return $response;
    }

    /**
     * @Route("/autopost/2", name="autopost_tw")
     */
    public function autoPostTwitter(Request $request, $_route_params)
    {
        $doctrine = $this->getDoctrine();

        /**
         * @var Product $item
         */
        $item = $doctrine->getRepository("AppBundle:Product")->findOneBy(array("postOnTwitter" => null), array("modified" => "DESC"));

        if (!is_null($item)){
            $url = $this->get('router')->generate('product_detail',
                array(
                    '_category' => $item->getCategory()->getUrlName(),
                    '_url_name' => $item->getUrlName(),
                    '_id' => $item->getId()
                ),
                UrlGenerator::ABSOLUTE_URL);

    //                 $url = str_replace("http://cconlinestores.lo", "https://cconlinestores.com", $url);
            //         $url = str_replace("193", "1", $url);
            //         $url = str_replace("236", "42", $url);

            if ($item->getSpecialPrice() != null) {
                $price = $item->getSpecialPrice();
            } elseif ($price = $item->getOldPrice() != null) {
                $price = $item->getOldPrice();
            } elseif ($price = $item->getPrice() != null) {
                $price = $item->getPrice();
            }

            $format = new \NumberFormatter("es", \NumberFormatter::CURRENCY);
            $formatPrice = $format->formatCurrency($price, $item->getCurrency()->getDescription());
            $symbol = $item->getCurrency()->getSymbol();
            $formatPrice = $symbol . $formatPrice;

            $hashtags = "#cconlinestore #";
            $hashtags .= $item->getCategory()->getName();
            if ($item->getBrand()) {
                $hashtags .= " #" . $item->getBrand()->getName();
            }
            
            $hashtags .= " #" . $item->getStore()->getName();
            $hashtags .= " #Blackfriday #Blackfriday2022 #blackdays #diasiniva";

            $contentMessage = $item->getName() . " " . $formatPrice . " " . $hashtags;

            if (!$item->getPostOnTwitter()) {
                $msg = new Message($contentMessage, $url);
                $msg->setNetworksToPublishOn([Enum::TWITTER]);

                try {
                    $responseMsg = $this->get('social_post')->publish($msg);
                } catch (FailureWhenPublishingMessage $e) {
                    $response = new Response(json_encode($contentMessage . " ERROR: " . $e->getMessage()));
                    $response->headers->set('Content-Type', 'application/json');

                    return $response;
                }

                $item->setPostOnTwitter(true);
                $em = $doctrine->getManager();
                $em->persist($item);
                $em->flush();

                $response = new Response(json_encode($contentMessage . " RESPONSE: " . $responseMsg));
                $response->headers->set('Content-Type', 'application/json');
            } else {
                $response = new Response(json_encode($item->getName() . " ya fue publicado en TW"));
                $response->headers->set('Content-Type', 'application/json');
            }

        } else {
            $response = new Response("No hay items nuevos para publicar en TW");
            $response->headers->set('Content-Type', 'application/json');
        }
        return $response;
    }
}
