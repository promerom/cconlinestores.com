<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SitemapsControllerTest extends WebTestCase
{
    public function testSitemap()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sitemap');
    }

}
