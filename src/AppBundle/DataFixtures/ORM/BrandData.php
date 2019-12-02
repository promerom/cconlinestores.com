<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Brand;

class BrandData extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $brands = array(
            [
                'name' => 'Samsung',
                'description' => 'Samsung te ayuda a descubrir un universo de tecnología innovadora para el hogar incluyendo Smartphones, tablets, TVs, electrodomésticos y más.',
                'url' => 'https://www.samsung.com/co/',
                'image' => 'https://cdn.samsung.com/etc/designs/smg/global/imgs/logo-square-letter.png'
            ],
            [
                'name' => 'Sony',
                'description' => 'Página oficial de Sony Colombia. Descubre la gama de productos electrónicos de alta calidad y entretenimiento en Sony Entertainment Network en Español.',
                'url' => 'https://www.sony.com.co/',
                'image' => 'https://www.sony.com/image/sonyview1?fmt=png&wid=1200'
            ]
        );

        foreach ($brands as $item) {
            $brand = new Brand();
            $brand->setName($item["name"]);
            $brand->setDescription($item["description"]);
            $brand->setUrl($item["url"]);
            $brand->setImage($item["image"]);

            $manager->persist($brand);
        }

        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }
}
