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
            ],
            [
                'name' => 'Apple',
                'description' => 'Descubre el innovador mundo de Apple: iPhone, iPad, Apple Watch, Mac, Apple TV, accesorios, entretenimiento y soporte técnico.',
                'url' => 'https://www.apple.com/co/',
                'image' => 'https://www.apple.com/ac/structured-data/images/open_graph_logo.png?201809211351'
            ],
            [
                'name' => 'LG',
                'description' => 'LG electronics Colombia y su completa gama de electrodomésticos de última tecnología. Televisores OLED, One Body, Smartphone, Barras de sonido, Neveras, Nevecones, Lavadoras, Proyectores, Monitores',
                'url' => 'https://www.lg.com/co',
                'image' => 'https://www.lg.com/lg4-common-gp/img/global/header-large-logo.png'
            ],
            [
                'name' => 'PlayStation',
                'description' => 'PlayStation Console, Games, Accessories, for Playstation console from the official PlayStation website. Explore PlayStation® Official Site',
                'url' => 'https://www.playstation.com/es-co/',
                'image' => 'https://media.playstation.com/is/image/SCEA/footerpslogo-nhasset?$Footer_Links_Row_Logo$'
            ],
            [
                'name' => 'ASUS',
                'description' => 'ASUS es una empresa líder impulsada por la innovación y el compromiso con la calidad para productos que incluyen computadores portátiles y de escritorio, celulares, tarjetas madre y periféricos.',
                'url' => 'https://www.asus.com/co/',
                'image' => 'https://www.asus.com/media/img/2017/images/n-logo-asus.svg'
            ],
            [
                'name' => 'Oster',
                'description' => 'Oster, productos de calidad a precios económicos para tu cocina',
                'url' => 'https://www.ostercolombia.com/',
                'image' => 'https://osterco.vteximg.com.br/arquivos/logo.png?v=636023055540070000'
            ],
            [
                'name' => 'Bose',
                'description' => 'Bose. Soluciones innovadoras que te ayudarán a sentir, hacer y ser más. Audífonos, altavoces, dispositivos portátiles y productos de bienestar.',
                'url' => 'https://www.bose.co/es_co/index.html',
                'image' => 'https://assets.bose.com/content/dam/Bose_DAM/Web/consumer_electronics/global/homepage/images_5to2/HP_SB500_5x2_header.psd/jcr:content/renditions/cq5dam.web.320.320.jpeg'
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
