<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Store;

class StoreData extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $stores = array(
            [
                'name' => 'Falabella',
                'description' => 'De forma fácil y segura compra en Falabella.com Tecnología, Electrodomésticos, Muebles, Zapatos, Colchones y mucho más.',
                'url' => 'https://www.falabella.com.co/falabella-co/',
                'image' => ''
            ],
            [
                'name' => 'Ktronix',
                'description' => 'KTRONIX Primera Tienda especializada en tecnología, teléfono 018000-180222, Tiendas en Bogotá, Medellín y Bucaramanga, www.ktronix.com con respaldo de ALKOSTO.',
                'url' => 'https://www.ktronix.com/',
                'image' => 'https://media.aws.alkosto.com/media/KTRONIX/logo-ktronix.png'
            ],
            [
                'name' => 'Alkosto',
                'description' => 'Compra con todo el Hiperahorro en Alkosto y www.alkosto.com Línea nacional 018000-180222, Tiendas en Bogotá, Cali, Villavicencio, Pereira, Yopal, Pasto, Ipiales, Túquerres',
                'url' => 'https://www.alkosto.com/',
                'image' => 'https://media.aws.alkosto.com/media/ALKOSTO/contenido/logo-alkosto-rwd-Pro201709.png'
            ],
            [
                'name' => 'AliExpress',
                'description' => 'Online shopping for the latest electronics, fashion, phone accessories, computer electronics, toys, home&garden, home appliances, tools, home improvement and more.',
                'url' => 'https://www.aliexpress.com/',
                'image' => 'https://ae01.alicdn.com/images/eng/wholesale/icon/aliexpress.ico'
            ],
            [
                'name' => 'Adidas',
                'description' => 'Tienda oficial de adidas Colombia: ropa deportiva, tenis, guayos y accesorios. Descubre nuestras colecciones de Originals, Running, Fútbol y Training.',
                'url' => 'https://www.adidas.co/',
                'image' => ''
            ],
            [
                'name' => 'Sony Store',
                'description' => 'Compra en línea con facilidad y seguridad en la tienda oficial Sony Colombia lo último en tecnologías 4K, 4K HDR, Android™ TV y audio de alta resolución Hi-Res. Televisores, audio, parlantes, soundbar, cámaras, Playstation, Smartphone Xperia y accesorios.',
                'url' => 'https://store.sony.com.co/',
                'image' => ''
            ]
        );

        foreach ($stores as $item) {
            $store = new Store();
            $store->setName($item["name"]);
            $store->setDescription($item["description"]);
            $store->setUrl($item["url"]);
            $store->setImage($item["image"]);

            $manager->persist($store);
        }

        $manager->flush();
    }

//     the order in which fixtures will be loaded
//     the lower the number, the sooner that this fixture is loaded
    public function getOrder() {
        return 1;
    }
}