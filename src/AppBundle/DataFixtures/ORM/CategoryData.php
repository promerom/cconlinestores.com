<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Category;

class CategoryData extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $categories = array(
            [
                'name' => 'Celulares',
                'description' => '',
                'url' => '',
                'image' => ''
            ],
            [
                'name' => 'Televisores',
                'description' => '',
                'url' => '',
                'image' => ''
            ]
        );

        foreach ($categories as $item) {
            $brand = new Category();
            $brand->setName($item["name"]);
            $brand->setDescription($item["description"]);
            $brand->setUrl($item["url"]);
            $brand->setImage($item["image"]);

            $manager->persist($brand);
        }

        $manager->flush();
    }

    public function getOrder() {
        return 4;
    }
}
