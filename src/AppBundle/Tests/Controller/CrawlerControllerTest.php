<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CrawlerControllerTest extends WebTestCase
{
    public function testGetdata()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'getdata');
    }

}
