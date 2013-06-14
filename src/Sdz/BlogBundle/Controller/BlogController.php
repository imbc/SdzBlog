<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sdz\BlogBundle\Entity\Post;
use Sdz\BlogBundle\Entity\Image;

class BlogController extends Controller
{
    public function indexAction( Request $request )
    {
        $index = $request->get( 'index' );
        if( $index < 1 )
        {
            throw $this->createNotFoundException( 'Page inexistante (page = ' . $index . ')' );
        }

//        $antispam = $this->get( 'sdz_blog.antispam' );
//        if( $antispam->isSpam( $text ))
//        {
//            throw new \Exception( 'Votre message a été détecté comme spam !' );
//        }

        $posts = array(
            array(
                'title' => 'Mon weekend a Phi Phi Island !',
                'id' => 1,
                'author' => 'winzou',
                'content' => 'Ce weekend était trop bien. Blabla…',
                'createdAt' => new \Datetime() ),
            array(
                'title' => 'Repetition du National Day de Singapour',
                'id' => 2,
                'author' => 'winzou',
                'content' => 'Bientôt prêt pour le jour J. Blabla…',
                'createdAt' => new \Datetime() ),
            array(
                'title' => 'Chiffre d\'affaire en hausse',
                'id' => 3,
                'author' => 'M@teo21',
                'content' => '+500% sur 1 an, fabuleux. Blabla…',
                'createdAt' => new \Datetime() )
        );

        return $this->render( 'SdzBlogBundle:Blog:index.html.twig', array(
                    'posts' => $posts,
        ) );
    }

    public function viewAction( Request $request )
    {
        $repo = $this->getDoctrine()
                ->getManager()
                ->getRepository( 'SdzBlogBundle:Post' );

        $post = $repo->find( $request->get( 'post_id' ) );

        if( $post === null )
        {
            throw $this->createNotFoundException( 'Post[id=' . $id . '] non existant.' );
        }

        return $this->render( 'SdzBlogBundle:Blog:view.html.twig', array(
                    'post' => $post
        ));
//        $em = $this->getDoctrine()->getManager();
//        $repo = $em->getRepository( 'SdzBlogBundle:Post' );
//        $post = $repo->findOneBy( array(
//                        'id' => $request->get( 'post_id' ),
//                ));
//        if( $post === null )
//        {
//            throw $this->createNotFoundException( 'no post correspond to your request' );
//        }
//
//        return $this->render( 'SdzBlogBundle:Blog:view.html.twig', array(
//            'post' => $post,
//        ));
    }

    public function editAction( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository( 'SdzBlogBundle:Post' );
        $post = new Post();
        if( !$request->get( 'post_id' ))
        {
            $post = $repo->findOneBy( array(
                'id' => $request->get( 'post_id' ),
            ));
        }
        // Création de l'entité
        $post->setTitle( 'Mon dernier weekend' );
        $post->setAuthor( 'Bibi');
        $post->setContent( "C'était vraiment super et on s'est bien amusé." );

        $image = new Image();
        $image->setUrl( 'http://uploads.siteduzero.com/icones/478001_479000/478657.png' );
        $image->setAlt( 'Logo Symfony2' );

        $post->setImage( $image );

        if( $this->getRequest()->getMethod() == 'POST' )
        {
            $em->persist( $post );
            $em->flush();

            $this->get( 'session' )->getFlashBag()->add( 'info', 'Article bien enregistré' );

            return $this->redirect(
                                $this->generateUrl( 'sdzblog_view', array(
                                    'id' => $post->getId()
                                )
            ));
        }

        return $this->render( 'SdzBlogBundle:Blog:edit.html.twig', array(
                    'post' => $post,
        ));
    }

    public function deleteAction( Request $request )
    {
        return new Response( 'not implemented yet' );
    }

    public function menuAction()
    {
        $posts = array(
            array( 'id' => 2, 'titre' => 'Mon dernier weekend !' ),
            array( 'id' => 5, 'titre' => 'Sortie de Symfony2.1' ),
            array( 'id' => 9, 'titre' => 'Petit test' ),
        );

        return $this->render( 'SdzBlogBundle:Blog:menu.html.twig', array(
                    'posts' => $posts
        ));
    }

    public function testAction()
    {
        $post = new Post();
        $post->setAuthor( 'Bibi' );
        $post->setTitle( 'Mon dernier weekend' );
        $post->setContent( 'C\'était vraiment super et on s\'est bien amusé.' );
        $post->getSlug();
        $post->getCreatedAt();

        return $this->render( 'SdzBlogBundle:Post:test.html.twig', array(
                    'post' => $post,
        ));
    }
}