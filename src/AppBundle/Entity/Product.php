<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \AppBundle\Entity\Currency;
use \AppBundle\Entity\Brand;
use \AppBundle\Entity\Store;
use \AppBundle\Entity\Category;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Currency", inversedBy="products")
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Brand", inversedBy="products")
     * @ORM\JoinColumn(nullable=true)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Store", inversedBy="products")
     */
    private $store;

    /**
     * @var int
     *
     * @ORM\Column(name="old_price", type="integer", nullable=true)
     */
    private $oldPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="special_price", type="integer", nullable=true)
     */
    private $specialPrice;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Category", inversedBy="products")
     */
    private $category;

    /**
     * @ORM\Column(name="created", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $created;

    /**
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @ORM\Column(name="long_description", type="text", nullable=true)
     */
    private $longDescription;

    /**
     * @ORM\Column(name="url_name", type="string", length=255)
     */
    private $urlName;

    /**
     * @ORM\Column(name="post_on_facebook", type="boolean", nullable=true)
     */
    private $postOnFacebook;

    /**
     * @ORM\Column(name="post_on_twitter", type="boolean", nullable=true)
     */
    private $postOnTwitter;

    /**
     * @ORM\Column(name="original_url", type="string", length=255, nullable=true)
     */
    private $originalUrl;

    public function __construct() {
        $this->setCreated(new \DateTime());
        $this->setModified();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        $search = array(" ", "'", '"', "+", "*", "´", "(", ")", "?", "¿", "¡", "!", "/", "\n", "®", "%", chr(0xC2).chr(0xA0));
        $replace = array("-", "");
        $urlName = str_replace($search, $replace, $name);

        $search1 = array("|", ",", ".", ":");
        $replace1 = "_";
        $urlName = str_replace($search1, $replace1, $urlName);


        $urlName = $this->removeAccents($urlName);
        $urlName = strtolower($urlName);

        $this->setUrlName($urlName);

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     *
     * @return Product
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Product
     */
    public function setUrl($url)
    {
        $url = str_replace("http://", "https://", $url);
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }

    public function setStore(?Store $store): self
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get oldPrice
     *
     * @return int
     */
    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    /**
     * Set oldPrice
     *
     * @param integer $oldPrice
     *
     * @return Product
     */
    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;

        return $this;
    }

    /**
     * Get specialPrice
     *
     * @return int
     */
    public function getSpecialPrice()
    {
        return $this->specialPrice;
    }

    /**
     * Set specialPrice
     *
     * @param integer $specialPrice
     *
     * @return Product
     */
    public function setSpecialPrice($specialPrice)
    {
        $this->specialPrice = $specialPrice;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getModified(): ?\DateTimeInterface
    {
        return $this->modified;
    }

//     public function setModified(\DateTimeInterface $modified): self
    public function setModified(): self
    {
//         $this->modified = $modified;
        $this->modified = new \DateTime();

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(?string $longDescription): self
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    public function getUrlName(): ?string
    {
        return $this->urlName;
    }

    public function setUrlName(string $urlName): self
    {
        $this->urlName = $urlName;

        return $this;
    }

    public function getPostOnFacebook(): ?bool
    {
        return $this->postOnFacebook;
    }

    public function setPostOnFacebook(?bool $postOnFacebook): self
    {
        $this->postOnFacebook = $postOnFacebook;

        return $this;
    }

    private function removeAccents($string)
    {

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
//         $string = utf8_encode($string);

        //Ahora reemplazamos las letras
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
            );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $string
            );

        return $string;
    }

    public function getPostOnTwitter(): ?bool
    {
        return $this->postOnTwitter;
    }

    public function setPostOnTwitter(?bool $postOnTwitter): self
    {
        $this->postOnTwitter = $postOnTwitter;

        return $this;
    }

    public function getOriginalUrl(): ?string
    {
        return $this->originalUrl;
    }

    public function setOriginalUrl(?string $originalUrl): self
    {
        $this->originalUrl = $originalUrl;

        return $this;
    }
}