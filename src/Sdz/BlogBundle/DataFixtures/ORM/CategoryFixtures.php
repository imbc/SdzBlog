<?php

namespace Sdz\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Category;

/**
 *
 */
class CategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        $cat1 = new Category();
        $cat1->setName( 'Symfony2' );
        $manager->persist( $cat1 );

        $manager->flush();

        $this->addReference( 'category-1', $cat1 );
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}