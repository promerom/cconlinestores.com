<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Currency;

class CurrencyData extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $currencies = array(
            [
                'name' => 'Pesos',
                'description' => 'COP - Pesos Colombianos',
                'symbol' => 'COP $',
            ],
            [
                'name' => 'Dolar',
                'description' => 'UDS - Dolar Americano',
                'symbol' => 'USD $',
            ]
        );

        foreach ($currencies as $item) {
            $currency = new Currency();
            $currency->setName($item["name"]);
            $currency->setDescription($item["description"]);
            $currency->setSymbol($item["symbol"]);

            $manager->persist($currency);
        }

        $manager->flush();
    }

    public function getOrder() {
        return 3;
    }
}
