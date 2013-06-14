<?php
namespace Sdz\BlogBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Sdz\BlogBundle\Repository\CommentRepository")
 * @ORM\Table(name="comment")
 */
class Comment
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
     * @var \Sdz\BlogBundle\Entity\Post $post
     *
     * @ORM\ManyToOne(targetEntity="\Sdz\BlogBundle\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(name="blog_id", referencedColumnName="id", nullable=false)
     */
    protected $post;

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
     * Get $id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
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
     * Get $post
     *
     * @return \Sdz\BlogBundle\Entity\Post $post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set $post
     *
     * @param \Sdz\BlogBundle\Entity\Sdz\BlogBundle\Entity\Post $post
     */
    public function setPost( Sdz\BlogBundle\Entity\Post $post )
    {
        $this->post = $post;
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
    public function setCreated( \DateTime $datetime )
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
    public function setUpdated( \DateTime $datetime )
    {
        $this->updated = $datetime;
    }
}