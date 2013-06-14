<?php
namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

  /**
   * @var string $name
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $posts
     *
     * @ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Post", mappedBy="categories")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayColletion();
    }

    /**
     * Get $id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get $name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set $name
     *
     * @param string $name
     */
    public function setName( $name )
    {
        $this->name = $name;
    }


}