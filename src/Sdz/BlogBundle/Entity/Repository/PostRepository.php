<?php

namespace Sdz\BlogBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 *
 */
class PostRepository extends EntityRepository
{
    public function findWithCategories( array $categories_name )
    {
        $qb = $this->createQueryBuilder( 'p' );
        $qb->join( 'p.categories', 'c' );
        $qb->where( $qb->expr()->in( 'c.name', ':categories' )); // Puis on filtre sur le nom des catégories à l'aide d'un IN
        $qb->setParameter( 'categories', $categories_name );

        return $qb->getQuery()->getResult();
    }

    public function getLatest( $limit = 3 )
    {
        $qb = $this->createQueryBuilder( 'p' );
        $qb->orderBy( 'p.id', 'DESC' );
        $qb->setMaxResults( $limit );

        return $qb->getQuery()->getResult();
    }

    public function findOne( $id )
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select( 'p' )->from( 'SdzBlogBundle:Article', 'p' );
        $qb->where( 'p.id = :id' );
        $qb->setParameter( 'id', $id );

        return $qb->getQuery()->getResult();
    }

    public function findByAuthorAndDate( $author, $year )
    {
        $qb = $this->createQueryBuilder( 'p' );

        $qb->where( 'p.author = :author' );
        $qb->setParameter( 'author', $author );
        $qb->andWhere( 'p.year < :year' );
        $qb->setParameter( 'year', $year );
        $qb->orderBy( 'p.year', 'DESC' );

        return $qb->getQuery()->getResult();
    }

    public function whereCurrentYear( \Doctrine\ORM\QueryBuilder $qb )
    {
        $qb->andWhere( 'p.created BETWEEN :start AND :end' );
        $qb->setParameter( 'start', new \Datetime( date( 'Y' ) . '-01-01' ));  // Date entre le 1er janvier de cette année
        $qb->setParameter( 'end', new \Datetime( date( 'Y' ) . '-12-31' )); // Et le 31 décembre de cette année

        return $qb;
    }

    public function getArticles( $limit, $page )
    {
        if( $page < 1 )
        {
          throw new \InvalidArgumentException( 'L\'argument $page ne peut être inférieur à 1 (valeur : "' . $page . '").' );
        }
        $qb = $this->createQueryBuilder( 'p' );
        $qb->leftJoin('p.image', 'i')->addSelect( 'i' );
        $qb->leftJoin('p.categories', 'c')->addSelect( 'c' );
        $qb->orderBy('p.created', 'DESC');
        $qb->setFirstResult( ( $page - 1 ) * $limit );
        $qb->setMaxResults( $limit );
//        $result = $qb->getQuery()->getResult();
//
//        return new Paginator( $result );
        return $qb->getQuery()->getResult();
    }
}