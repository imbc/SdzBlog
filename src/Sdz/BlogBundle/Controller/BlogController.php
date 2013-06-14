<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function indexAction( Request $request )
    {
        $notify = $this->get( 'imbc.notify' );
        $notify->add( 'test', array(
            'type'      => 'instant',
            'message'   => 'This is awesome',
            'title'     => 'test',
        ));
        if( $notify->has( 'test' ) )
        {
            $notifications = $notify->get( 'test' );
        }



        $index = $request->get( 'index' );

        $repo = $this->getDoctrine()->getManager()->getRepository( 'SdzBlogBundle:Post' );
        $posts = $repo->getArticles( 7, $index );

        return $this->render( 'SdzBlogBundle:Post:index.html.twig', array(
                    'posts' => $posts,
                    'page'  => $index,
                    'limit' => ceil( count( $posts ) / 7 ),
                    'notifications' => $notifications,
        ));
    }

    public function menuAction()
    {

        $repo = $this->getDoctrine()->getManager()->getRepository( 'SdzBlogBundle:Post' );
        $posts = $repo->getLatest( 3 );

        return $this->render( 'SdzBlogBundle:Blog:menu.html.twig', array(
                    'posts' => $posts
        ) );
    }
}