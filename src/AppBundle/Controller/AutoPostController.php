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
     * @Route("/autopost/{_social_id}", name="autopost")
     */
    public function index(Request $request, $_route_params)
    {
        $doctrine = $this->getDoctrine();

        /**
         * @var Product $item
         */
        $item = $doctrine->getRepository("AppBundle:Product")->findOneBy(array("postOnFacebook" => null), array("modified" => "DESC"));

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
        $hashtags .= " #" . $item->getBrand()->getName();
        $hashtags .= " #" . $item->getStore()->getName();

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

        return $response;
    }
}
