<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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
              'title'       => 'Mon weekend a Phi Phi Island !',
              'id'          => 1,
              'author'      => 'winzou',
              'content'     => 'Ce weekend était trop bien. Blabla…',
              'createdAt'   => new \Datetime()),
            array(
              'title'       => 'Repetition du National Day de Singapour',
              'id'          => 2,
              'author'      => 'winzou',
              'content'     => 'Bientôt prêt pour le jour J. Blabla…',
              'createdAt'   => new \Datetime()),
            array(
              'title'       => 'Chiffre d\'affaire en hausse',
              'id'          => 3,
              'author'      => 'M@teo21',
              'content'     => '+500% sur 1 an, fabuleux. Blabla…',
              'createdAt'   => new \Datetime())
          );

        return $this->render( 'SdzBlogBundle:Blog:index.html.twig', array(
            'posts' => $posts,
        ));
    }

    public function viewAction( Request $request )
    {
        $id = $request->get( 'post_id' );

        $post = array(
          'id'          => 1,
          'title'       => 'Mon weekend a Phi Phi Island !',
          'author'      => 'winzou',
          'content'     => 'Ce weekend était trop bien. Blabla…',
          'createdAt'   => new \Datetime()
        );

        return $this->render( 'SdzBlogBundle:Blog:view.html.twig', array(
            'post' => $post,
        ));
    }

    public function editAction( Request $request )
    {
        $request->getSession()->getFlashBag()->add( 'info', 'Article bien enregistré' );
        $request->getSession()->getFlashBag()->add( 'info', 'Oui oui, il est bien enregistré !' );

        $post = array(
          'id'          => 1,
          'title'       => 'Mon weekend a Phi Phi Island !',
          'author'      => 'winzou',
          'content'     => 'Ce weekend était trop bien. Blabla…',
          'createdAt'   => new \Datetime()
        );

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
          array('id' => 2, 'titre' => 'Mon dernier weekend !'),
          array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
          array('id' => 9, 'titre' => 'Petit test'),
        );

        return $this->render( 'SdzBlogBundle:Blog:menu.html.twig', array(
          'posts' => $posts
        ));
    }
}