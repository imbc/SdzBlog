<?php

namespace Sdz\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Image;

/**
 *
 */
class ImageFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        $img1 = new Image();
        $img1->setUrl( 'beach.jpg' );
        $img1->setAlt( 'beach' );
        $manager->persist( $img1 );

        $img2 = new Image();
        $img2->setUrl( 'pool_leak.jpg' );
        $img2->setAlt( 'pool' );
        $manager->persist( $img2 );

        $img3 = new Image();
        $img3->setUrl( 'misdirection.jpg' );
        $img3->setAlt( 'misdirection' );
        $manager->persist( $img3 );

        $img4 = new Image();
        $img4->setUrl( 'the_grid.jpg' );
        $img4->setAlt( 'grid' );
        $manager->persist( $img4 );

        $img5 = new Image();
        $img5->setUrl( 'one_or_zero.jpg' );
        $img5->setAlt( '1or0' );
        $manager->persist( $img5 );

        $manager->flush();

        $this->addReference( 'image-1', $img1 );
        $this->addReference( 'image-2', $img2 );
        $this->addReference( 'image-3', $img3 );
        $this->addReference( 'image-4', $img4 );
        $this->addReference( 'image-5', $img5 );
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}