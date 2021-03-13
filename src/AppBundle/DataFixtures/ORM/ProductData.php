<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Product;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductData extends Fixture implements OrderedFixtureInterface, FixtureGroupInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $products = array(
            [
                'name' => 'HP Monitor FHD de 24 mh de 23,8 pulgadas',
                'description' => 'Monitor de computadora con pantalla IPS de 23,8 pulgadas (1080p) - Altavoces incorporados y montaje VESA - Ajuste de altura / inclinación para visualización ergonómica - HDMI y DisplayPort - (1D0J9AA # ABA) <br>
Tamaño de pantalla	23.8 Pulgadas<br>
Resolución	FHD 1080p<br>
Tecnología de pantalla	Led<br>
Marca	HP<br>
Interfaz de hardware	VGA, DisplayPort, HDMI',
                'price' => '598498',
                'url' => 'https://www.amazon.com/gp/product/B08BF4CZSV?ie=UTF8&tag=cconlinestore-20&camp=1789&linkCode=xm2&creativeASIN=B08BF4CZSV',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/91fAU6mxFsL._AC_SL1500_.jpg',
                'longDescription' => 'Visuales excepcionales: esta pantalla FHD con tecnología IPS te ofrece imágenes brillantes y una calidad inolvidable; con una resolución máxima de 1920 x 1080 @ 75 Hz, experimentarás la precisión de imagen y espectros de visualización amplia de tabletas y dispositivos móviles de alta calidad
Garantía y sostenibilidad: descansa con facilidad y trabaja con confianza con un monitor respetuoso con el medio ambiente y de bajo consumo, respaldado por la garantía limitada de 1 año de HP
Más pantalla, menos espacio: disfruta de más espacio de escritorio del que creías posible con un diseño atractivo y ultrafino
Vista panorámica: detalles vibrantes desde prácticamente cualquier posición con color uniforme y claridad de imagen mantenida en un ángulo de visión horizontal y vertical de 178 °
Pantalla de microborde: prácticamente sin bisel que rodea la pantalla en tres lados, una experiencia de visualización ultra ancha proporciona configuraciones de múltiples monitores sin problemas
Fácil conectividad: obtén la calidad de imagen que has estado buscando sin los dongles adicionales; conecta fácilmente a tu PC, consola de juegos y periféricos para entretenimiento de pantalla grande con una amplia gama de puertos, incluyendo HDMI, DisplayPort y puertos VGA
Altavoces integrados: experimenta un sonido increíble y un entretenimiento más envolvente con dos altavoces integrados de 2 W',
                'originalUrl' => 'https://www.amazon.com/gp/product/B08BF4CZSV?ie=UTF8&tag=cconlinestore-20&camp=1789&linkCode=xm2&creativeASIN=B08BF4CZSV',
                'brand' => 11,
                'currency' => 1,
                'store' => 7,
                'category' => 3
            ],
            [
                'name' => 'Samsung Galaxy S21 - Teléfono celular Android desbloqueado de fábrica - US versión 5G Smartphone',
                'description' => 'Operador inalámbrico	Todas las empresas de transportes<br>
Marca	Samsung Electronics<br>
Color	Negro Phantom<br>
Capacidad de almacenamiento de memoria	256 GB<br>
Sistema operativo	Android<br>
Tamaño de pantalla	6.8 Pulgadas<br>
Tipo de pantalla	AMOLED<br>
Tecnología celular	5G<br>
Fabricante	Samsung<br>
Otras características de la cámara',
                'price' => 'Agotado',
                'url' => 'https://www.amazon.com/gp/product/B08P54F6HB/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B08P54F6HB&linkCode=as2&tag=cconlinestore-20&linkId=a6b752587b3b3dc2861b156200892c8a',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/61O45C5qASL._AC_SL1000_.jpg',
                'longDescription' => 'Trade-in: ahorra hasta $800 en el nuevo Galaxy S21 Ultra 5G con un dispositivo de comercio elegible hasta el 7 de febrero de 2021. Términos Appl
Descripción de la cámara: frontal
Cámara de grado profesional: zoom en cerca, toma fotos y vídeos como un profesional, y captura increíbles momentos listos para compartir con nuestra cámara multilente fácil de usar
Vídeo nítido de 8 K: captura los mejores momentos de tu vida en un vídeo de 8 K súper suave que le da a tus películas una calidad de estilo cine
Múltiples formas de grabar: crea vídeos y regalos listos para compartir en el lugar con grabación multicam y efectos automáticos de estilo profesional
Zoom de 100 aumentos: obtén una claridad increíble con un combo de lente dual de zoom óptico de 3x y 10x, o ve aún más lejos con nuestro revolucionario zoom espacial de 100x
Resolución de smartphone más alta: cristal claro de 108 MP te permite pellizcar, cortar y hacer zoom en tus fotos para ver detalles pequeños e inesperados, mientras que el enfoque láser rápido mantiene tu punto focal claro',
                'originalUrl' => 'https://www.amazon.com/gp/product/B08P54F6HB/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B08P54F6HB&linkCode=as2&tag=cconlinestore-20&linkId=a6b752587b3b3dc2861b156200892c8a',
                'brand' => 1,
                'currency' => 1,
                'store' => 7,
                'category' => 1
            ],
            [
                'name' => 'ASUS F512JA-AS34 VivoBook 15 portátil delgado y ligero',
                'description' => 'ASUS F512JA-AS34 VivoBook 15 portátil delgado y ligero, pantalla FHD de 15,6", CPU Intel i3-1005G1, 8 GB RAM, 128 GB SSD, teclado retroiluminado, huella digital, Windows 10 Home en modo S, gris pizarra
Estilo: Intel i3-1005G1 | 8G RAM | 128G SSD<br>
Marca	ASUS<br>
Sistema operativo	Windows 10 S<br>
Fabricante de CPU	Intel<br>
Tamaño de pantalla	15.6 Pulgadas<br>
Tamaño de la memoria de la computadora<br>',
                'price' => '1378406',
                'url' => 'https://amzn.to/3vjUY5l',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/816ioPpcNEL._AC_SL1500_.jpg',
                'longDescription' => 'Pantalla de bisel NanoEdge de 4 vías Full HD (1920 x 1080) con una impresionante relación de pantalla a cuerpo del 88 %
Compatible con Google Classroom; ejecuta Google Classroom en Microsoft Edge o Internet Explorer 11
CPU Intel Core i3-1005G1 de 10ª generación (caché de 4 M, hasta 3,4 GHz)
8 GB DDR4 RAM y 128 GB PCIe NVMe M.2 SSD<br>
Teclado ergonómico retroiluminado con sensor de huellas dactilares activado a través de Windows Hello
Diseño exclusivo Ergolift para una mejor posición de escritura<br>
Conexiones completas incluyendo USB 3.2 tipo C, USB 3.2 tipo A, USB 2.0 y HDMI; Gigabit Wi-Fi 5 (802.11ac) (la velocidad de transferencia USB puede variar. Más información en el sitio web de Asus)
Windows 10 en modo S ejecutan exclusivamente aplicaciones desde Microsoft Store. Para instalar una aplicación que no esté disponible en Microsoft Store, simplemente cambia el modo S en tres sencillos pasos. No hay carga para cambiar el modo S',
                'originalUrl' => 'https://amzn.to/3vjUY5l',
                'brand' => 6,
                'currency' => 1,
                'store' => 7,
                'category' => 3
            ],
            [
                'name' => 'Fit Simplify - Bandas elásticas para hacer ejercicio',
                'description' => 'Fit Simplify - Bandas elásticas para hacer ejercicio, con instrucciones y bolsa de transporte, juego de 5<br> Diferentes opciones de color: Variados, Rosado y Berry<br>Bandas y Tubos de Ejercicio de Fit Simplify',
                'price' => '36093',
                'url' => 'https://amzn.to/3ctvWIs',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/81ARh719W9L._AC_SL1500_.jpg',
                'longDescription' => 'Bandas de ejercicio de gama alta. Nuestras bandas de anclaje de resistencia pesada de 12 por 2 pulgadas están hechas de látex 100 % natural, libre de elastómero termoplástico no natural (TPE) y vienen en 5 niveles de resistencia diferentes. Esto los hace perfectos si apenas estás comenzando el entrenamiento o eres un guerrero avezado en entrenamiento. Nuestras bandas extra brillantes y ligeras son ideales para principiantes, mientras que nuestras bandas medianas de ejercicio, pesadas y extra pesadas son apuntadas para entrenamiento de fuerza más intermedio y avanzado.<br>
Genial con cualquier entrenamiento. Este conjunto de banda de resistencia se puede integrar perfectamente a cada programa de entrenamiento popular, incluyendo P90x, Insanity, Crossfit, cuerpo de playa, yoga, Pilates y muchos más. O utilizarlos para el ejercicio general, estiramiento, entrenamiento de fuerza, programas de peso energético. El bolso de transporte incluido hace que sea fácil de llevar tus bandas contigo y hacer cualquier entrenamiento fuera de casa o tu gimnasio en casa.<br>
Múltiples usos. Mientras que estas bandas de resistencia se utilizan a menudo para el deporte y el fitness, los fisioterapeutas aman estas bandas de terapia física (bandas de rehabilitación) para ayudarles a rehabilitar a sus pacientes. Nuestras bandas de estiramiento funcionan especialmente bien para las personas que sufren de lesiones en las piernas, rodillas y espalda y ayudan en la recuperación de desgarro del MCL y ACL, reemplazo de rodilla, rehabilitación de rótula y menisco. También son perfectas para el uso por las mujeres durante el embarazo y después del nacimiento para mantener sus cuerpos en forma.<br>
De calidad superior. Todas nuestras bandas de resistencia de ejercicio se prueban minuciosamente antes de enviarlas. Esto garantiza que tus bandas son cómodas para la piel y libres de defectos y te proporcionarán una experiencia sin preocupaciones. Echa un vistazo a nuestra guía de instrucciones de bonificación y libro electrónico de 41 páginas, donde incluimos docenas de ejercicios ilustrados diferentes que demuestran cómo usar nuestras bandas de resistencia para piernas, brazos, espalda, hombros, tobillos, caderas y estómago. Acceso extra a nuestra vídeo guía de entrenamiento en línea.<br>
Estamos a la altura de la calidad de nuestras bandas de ejercicio. Sabemos que te encantarán.',
                'originalUrl' => 'https://amzn.to/3ctvWIs',
                'brand' => 12,
                'currency' => 1,
                'store' => 7,
                'category' => 9
            ],
        );

        foreach ($products as $item) {
            $product = new Product();
            $product->setName($item["name"]);
            $product->setDescription($item["description"]);
            $product->setPrice($item["price"]);
            $product->setUrl($item["url"]);
            $product->setImage($item["image"]);
            $product->setLongDescription($item["longDescription"]);
            $product->setOriginalUrl($item["originalUrl"]);

            $doctrine = $this->container->get('doctrine');

            $currency = $doctrine
            ->getRepository('AppBundle:Currency')
            ->find($item["currency"]);
            $product->setCurrency($currency);

            $brand = $doctrine
            ->getRepository('AppBundle:Brand')
            ->find($item["brand"]);
            $product->setBrand($brand);

            $store = $doctrine
            ->getRepository('AppBundle:Store')
            ->find($item["store"]);
            $product->setStore($store);

            $category = $doctrine
            ->getRepository('AppBundle:Category')
            ->find($item["category"]);
            $product->setCategory($category);

            $manager->persist($product);
        }

        $manager->flush();
    }

    public static function getGroups(): array {
        return['productsGroup'];
    }

    public function getOrder() {
        return 5;
    }
}
