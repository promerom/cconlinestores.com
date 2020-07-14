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
                'description' => 'Encuentra los mejores celulares y Smartphones del momento. Las últimas referencias de todas las marcas y lanzamientos más recientes. Samsung, Sony, Iphone, Xiami, Motorola, Huawei y muchos más.',
                'url' => '',
                'image' => 'https://images.pexels.com/photos/2297554/pexels-photo-2297554.jpeg?cs=srgb&amp;dl=aparador-calle-celulares-comprando-2297554.jpg&amp;fm=jpg'
            ],
            [
                'name' => 'Televisores',
                'description' => 'La última tecnología en televisores con las mejores referencias y precios del mercado. Smart TV, HD, Full HD, Nanocell, LED, QLED y OLED de las mejores marcas Sony, Samsung, LG',
                'url' => '',
                'image' => 'https://s.yimg.com/ny/api/res/1.2/MlmdfzDG0ArtNYLFr1Sg7g--~A/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9ODAw/https://media.zenfs.com/es/lanacion.com.ar/07254b749076e5f191eafa924cb54bc5'
            ],
            [
                'name' => 'Computadores',
                'description' => 'Computadores de última tecnología a los mejores precios del mercado, portatiles y pc de escritorio. Core i7, AMD y de las mejores marcas HP, Samsung, Dell, Lenovo, Asus y muchos más.',
                'url' => '',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/6/6a/Computadores_hp_con_windows.jpg'
            ],
            [
                'name' => 'Videojuegos',
                'description' => 'Los mejores videojuegos del momento para las consolas más importantes. Play Station, Xbox, Nintendo, PS3, PS4, PS5',
                'url' => '',
                'image' => 'https://p1.pxfuel.com/preview/842/689/107/technology-gaming-technology-tv.jpg'
            ],
            [
                'name' => 'Lavadora Secadora',
                'description' => 'Lavadoras secadoras de última tecnología a los mejores precios de las marcas Samsung, LG, Haceb, Challenger',
                'url' => '',
                'image' => 'https://media.aws.alkosto.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/8/8/8801643739706--8.jpg'
            ],
            [
                'name' => 'SmartWatch',
                'description' => 'Smartwatch - Encuentra los mejores y más recientes Relojes Inteligentes de todas las marcas más importantes del momento. Samsung, Xiaomi, Apple, Huawei, Fitbit, Polar',
                'url' => '',
                'image' => 'https://live.staticflickr.com/65535/48720028667_fcf2a2eb8e_b.jpg'
            ],
            [
                'name' => 'Electrodomésticos',
                'description' => 'Encuentra los mejores electrodomésticos con la última tecnología como freidoras, neveras, lavadoras, secadoras, licuadoras, estufas, hornos y mucho más de las mejores marcas LG, Samsung, Mabe, Oster',
                'url' => '',
                'image' => 'https://www.homecenter.com.co/static/landing/guiasdecompra/Guias_de_compra_2/img/por-que-cambiar-los-electrodomesticos/consejos-practicos.jpg'
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
