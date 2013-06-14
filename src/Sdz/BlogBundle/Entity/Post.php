<?php
namespace Sdz\BlogBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\Repository\PostRepository")
 * @ORM\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @var User
     * @ORM\Column(name="author", type="string", length=255)
     */
    protected $author;

    /**
     * @var datetime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    protected $published;

    /**
     * @var string
     */
    protected $year;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle( $title )
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent( $content )
    {
        $this->content = $content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor( $author )
    {
        $this->author = $author;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished( $bool )
    {
        $this->published = $bool;
    }

    public function getYear( DateTime $date )
    {
        $date = ( $date !== null ) ? $date : $this->getCreatedAt() ;
        return $date->format( 'Y' );
    }
}