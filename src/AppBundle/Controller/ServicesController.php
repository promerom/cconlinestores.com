<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ServicesController extends Controller
{
    /**
     * @Route("osiv",
     *  methods={"POST"},
     *  name="identity_verify"
     * )
     */
    public function osIdentityVerificationAction(Request $request)
    {
//         return $this->render('AppBundle:Services:os_identity_verification.html.twig', array(

        $os_r_a_k = $this->container->getParameter("ONESIGNAL_REST_API_KEY");

        $_email = $request->get("email");

        $identityVerifitacion = hash_hmac('sha256', $_email, $os_r_a_k);

        $response = new Response(json_encode(array("email" => $_email, "osiv" => $identityVerifitacion)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
//         ));
    }

}
