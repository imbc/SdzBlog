<?php

namespace Sdz\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Post;

/**
 *
 */
class PostFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        $post1 = new Post();
        $post1->setTitle( 'A day with Symfony2' );
        $post1->setContent( 'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.' );
        $post1->setImage( $manager->merge( $this->getReference( 'image-1' ) ));
        $post1->setAuthor( 'dsyph3r' );
//        $post1->setTags( 'symfony2, php, paradise, symblog' );
        $post1->setCreated( new \DateTime() );
        $post1->setUpdated( $post1->getCreated() );
        $post1->setPublished( true );
        $manager->persist( $post1 );

        $post2 = new Post();
        $post2->setTitle( 'The pool on the roof must have a leak' );
        $post2->setContent( 'Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.' );
        $post2->setImage( $manager->merge( $this->getReference( 'image-2' ) ));
        $post2->setAuthor( 'Zero Cool' );
//        $post2->setTags( 'pool, leaky, hacked, movie, hacking, symblog' );
        $post2->setCreated( new \DateTime( "2011-07-23 06:12:33" ) );
        $post2->setUpdated( $post2->getCreated() );
        $post2->setPublished( true );
        $manager->persist( $post2 );

        $post3 = new Post();
        $post3->setTitle( 'Misdirection. What the eyes see and the ears hear, the mind believes' );
        $post3->setContent( 'Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.' );
        $post3->setImage( $manager->merge( $this->getReference( 'image-3' ) ));
        $post3->setAuthor( 'Gabriel' );
//        $post3->setTags( 'misdirection, magic, movie, hacking, symblog' );
        $post3->setCreated( new \DateTime( "2011-07-16 16:14:06" ) );
        $post3->setUpdated( $post3->getCreated() );
        $post3->setPublished( true );
        $manager->persist( $post3 );

        $post4 = new Post();
        $post4->setTitle( 'The grid - A digital frontier' );
        $post4->setContent( 'Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.' );
        $post4->setImage( $manager->merge( $this->getReference( 'image-4' ) ));
        $post4->setAuthor( 'Kevin Flynn' );
//        $post4->setTags( 'grid, daftpunk, movie, symblog' );
        $post4->setCreated( new \DateTime( "2011-06-02 18:54:12" ) );
        $post4->setUpdated( $post4->getCreated() );
        $post4->setPublished( true );
        $manager->persist( $post4 );

        $post5 = new Post();
        $post5->setTitle( 'You\'re either a one or a zero. Alive or dead' );
        $post5->setContent( 'Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.' );
        $post5->setImage( $manager->merge( $this->getReference( 'image-5' ) ));
        $post5->setAuthor( 'Gary Winston' );
//        $post5->setTags( 'binary, one, zero, alive, dead, !trusting, movie, symblog' );
        $post5->setCreated( new \DateTime( "2011-04-25 15:34:18" ) );
        $post5->setUpdated( $post5->getCreated() );
        $post5->setPublished( true );
        $manager->persist( $post5 );

        $manager->flush();

        $this->addReference( 'post-1', $post1 );
        $this->addReference( 'post-2', $post2 );
        $this->addReference( 'post-3', $post3 );
        $this->addReference( 'post-4', $post4 );
        $this->addReference( 'post-5', $post5 );
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}