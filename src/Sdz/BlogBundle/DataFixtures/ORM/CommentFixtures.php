<?php

namespace Sdz\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Comment;

/**
 *
 */
class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load( ObjectManager $manager )
    {
        $post1 = $this->getReference( 'post-1' );
        $post2 = $this->getReference( 'post-2' );
        $post3 = $this->getReference( 'post-3' );
        $post4 = $this->getReference( 'post-4' );
        $post5 = $this->getReference( 'post-5' );

        $comment1 = new Comment();
        $comment1->setAuthor( 'symfony' );
        $comment1->setContent( 'To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.' );
        $comment1->setPost( $post1 );
        $manager->persist( $comment1 );

        $comment2 = new Comment();
        $comment2->setAuthor( 'David' );
        $comment2->setContent( 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!' );
        $comment2->setPost( $post1 );
        $manager->persist( $comment2 );

        $comment3 = new Comment();
        $comment3->setAuthor( 'Dade' );
        $comment3->setContent( 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.' );
        $comment3->setPost( $post2 );
        $manager->persist( $comment3 );

        $comment4 = new Comment();
        $comment4->setAuthor( 'Kate' );
        $comment4->setContent( 'Are you challenging me? ' );
        $comment4->setPost( $post2 );
        $comment4->setCreated( new \DateTime( "2011-07-23 06:15:20" ));
        $manager->persist( $comment4 );

        $comment5 = new Comment();
        $comment5->setAuthor( 'Dade' );
        $comment5->setContent( 'Name your stakes.' );
        $comment5->setPost( $post2 );
        $comment5->setCreated( new \DateTime( "2011-07-23 06:18:35" ));
        $manager->persist( $comment5 );

        $comment6 = new Comment();
        $comment6->setAuthor( 'Kate' );
        $comment6->setContent( 'If I win, you become my slave.' );
        $comment6->setPost( $post2 );
        $comment6->setCreated( new \DateTime( "2011-07-23 06:22:53" ));
        $manager->persist( $comment6 );

        $comment7 = new Comment();
        $comment7->setAuthor( 'Dade' );
        $comment7->setContent( 'Your SLAVE?' );
        $comment7->setPost( $post2 );
        $comment7->setCreated( new \DateTime( "2011-07-23 06:25:15" ));
        $manager->persist( $comment7 );

        $comment8 = new Comment();
        $comment8->setAuthor( 'Kate' );
        $comment8->setContent( 'You wish! You\'ll do shitwork, scan, crack copyrights...' );
        $comment8->setPost( $post2 );
        $comment8->setCreated( new \DateTime( "2011-07-23 06:46:08" ));
        $manager->persist( $comment8 );

        $comment9 = new Comment();
        $comment9->setAuthor( 'Dade' );
        $comment9->setContent( 'And if I win?' );
        $comment9->setPost( $post2 );
        $comment9->setCreated( new \DateTime( "2011-07-23 10:22:46" ));
        $manager->persist( $comment9 );

        $comment10 = new Comment();
        $comment10->setAuthor( 'Kate' );
        $comment10->setContent( 'Make it my first-born!' );
        $comment10->setPost( $post2 );
        $comment10->setCreated( new \DateTime( "2011-07-23 11:08:08" ));
        $manager->persist( $comment10 );

        $comment11 = new Comment();
        $comment11->setAuthor( 'Dade' );
        $comment11->setContent( 'Make it our first-date!' );
        $comment11->setPost( $post2 );
        $comment11->setCreated( new \DateTime( "2011-07-24 18:56:01" ));
        $manager->persist( $comment11 );

        $comment12 = new Comment();
        $comment12->setAuthor( 'Kate' );
        $comment12->setContent( 'I don\'t DO dates. But I don\'t lose either, so you\'re on!' );
        $comment12->setPost( $post2 );
        $comment12->setCreated( new \DateTime( "2011-07-25 22:28:42" ));
        $manager->persist( $comment12 );

        $comment13 = new Comment();
        $comment13->setAuthor( 'Stanley' );
        $comment13->setContent( 'It\'s not gonna end like this.' );
        $comment13->setPost( $post3 );
        $manager->persist( $comment13 );

        $comment14 = new Comment();
        $comment14->setAuthor( 'Gabriel' );
        $comment14->setContent( 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.' );
        $comment14->setPost( $post3 );
        $manager->persist( $comment14 );

        $comment15 = new Comment();
        $comment15->setAuthor( 'Mile' );
        $comment15->setContent( 'Doesn\'t Bill Gates have something like that?' );
        $comment15->setPost( $post5 );
        $manager->persist( $comment15 );

        $comment16 = new Comment();
        $comment16->setAuthor( 'Gary' );
        $comment16->setContent( 'Bill Who?' );
        $comment16->setPost( $post5 );
        $manager->persist( $comment16 );

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}