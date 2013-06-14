<?php
namespace Sdz\BlogBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\Repository\PostRepository")
 * @ORM\Table(name="post")
 */
class Post
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @var User $author
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    protected $author;

    /**
     * @var Sdz\BlogBundle\Entity\Image $image
     *
     * @ORM\OneToOne(targetEntity="Sdz\BlogBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $image;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $comments
     *
     * @ORM\OneToMany(targetEntity="Sdz\BlogBundle\Entity\Comment", mappedBy="post")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $comments;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection $categories
     *
     * @ORM\ManyToMany(targetEntity="Sdz\BlogBundle\Entity\Category", inversedBy="posts", cascade={"persist"})
     * @ORM\JoinTable(name="posts_categories")
     */
    protected $categories;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @var string $slug
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

    /**
     * @var boolean $published
     *
     * @ORM\Column(name="published", type="boolean")
     */
    protected $published;

    /**
     * @var string $year
     */
    protected $year;

    public function __construct()
    {
        $this->published    = false;
        $this->comments     = new ArrayCollection();
        $this->categories   = new ArrayCollection();
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
     * Get $title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set $title
     *
     * @param string $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }

    /**
     * Get $content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get $content
     *
     * @param string $content
     */
    public function setContent( $content )
    {
        $this->content = $content;
    }

    /**
     * Get $author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set $author
     *
     * @param string $author
     */
    public function setAuthor( $author )
    {
        $this->author = $author;
    }

    /**
     * Get $image
     *
     * @return Sdz\BlogBundle\Entity\Image $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set $image
     *
     * @param Sdz\BlogBundle\Entity\Image $image
     */
    public function setImage( \Sdz\BlogBundle\Entity\Image $image )
    {
        $this->image = $image;
    }

    /**
     * Get $comments
     *
     * @return \Doctrine\Common\Collections\ArrayCollection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add $comment
     *
     * @param \Sdz\BlogBundle\Entity\Comment $comment
     */
    public function addComment( \Sdz\BlogBundle\Entity\Comment $comment )
    {
        if( !$this->comments->contains( $comment ) )
        {
            $this->comments->add( $comment );
            $comment->setPost( $this );
        }
    }

    /**
     * Remove $comment
     *
     * @param \Sdz\BlogBundle\Entity\Comment $comment
     */
    public function removeComment( \Sdz\BlogBundle\Entity\Comment $comment )
    {
        if( $this->comments->contains( $comment ))
        {
            $this->comments->removeElement( $comment );
            $comment->setPost( null );
        }
    }

    /**
     * Get $category
     *
     * @return \Doctrine\Common\Collections\ArrayCollection $categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add $category
     *
     * @param \Sdz\BlogBundle\Entity\Category $category
     */
    public function addCategory( \Sdz\BlogBundle\Entity\Category $category )
    {
        if( !$this->categories->contains( $category ) )
        {
            $this->categories->add( $category );
        }
    }

    /**
     * Remove $category
     *
     * @param \Sdz\BlogBundle\Entity\Category $category
     */
    public function removeCategory( \Sdz\BlogBundle\Entity\Category $category )
    {
        if( $this->categories->contains( $category ))
        {
            $this->categories->removeElement( $category );
        }
    }

    /**
     * Get $created
     *
     * @return datetime $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set $created
     *
     * @param \DateTime $datetime
     */
    public function setCreated( $datetime )
    {
        $this->created = $datetime;
    }

    /**
     * Get $updated
     *
     * @return datetime $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set $updated
     *
     * @param \DateTime $datetime
     */
    public function setUpdated( $datetime )
    {
        $this->updated = $datetime;
    }

    /**
     * Get $slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get $published
     *
     * @return boolean $published
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set $published
     *
     * @param boolean $bool
     */
    public function setPublished( $bool )
    {
        $this->published = $bool;
    }

    public function getYear( \DateTime $date )
    {
        $date = ( $date !== null ) ? $date : $this->getCreated() ;
        return $date->format( 'Y' );
    }
}