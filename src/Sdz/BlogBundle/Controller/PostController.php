<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sdz\BlogBundle\Entity\Post;
use Sdz\BlogBundle\Entity\Image;

/**
 * Description of PostController
 *
 * @author tam
 */
class PostController extends Controller
{

    public function viewAction( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository( 'SdzBlogBundle:Post' );
        $post = $repo->findOneBy( array(
                        'id' => $request->get( 'post_id' ),
                ));
        if( $post === null )
        {
            throw $this->createNotFoundException( 'no post correspond to your request' );
        }

        return $this->render( 'SdzBlogBundle:Post:view.html.twig', array(
            'post' => $post,
        ));
    }

    public function editAction( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository( 'SdzBlogBundle:Post' );
        $post = new Post();
        if( $request->get( 'post_id' ))
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
                                $this->generateUrl( 'sdzblog_post_view', array(
                                    'id' => $post->getId()
                                )
            ));
        }

        return $this->render( 'SdzBlogBundle:Post:edit.html.twig', array(
                    'post' => $post,
        ));
    }

    public function deleteAction( Request $request )
    {
        return new Response( 'not implemented yet' );
    }
}