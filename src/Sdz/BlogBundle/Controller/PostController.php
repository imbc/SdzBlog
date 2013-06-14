<?php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Sdz\BlogBundle\Entity\Post;
use Sdz\BlogBundle\Entity\Image;
use Sdz\BlogBundle\Form\Type\PostType;

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
        $edit = false;
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository( 'SdzBlogBundle:Post' );
        $post = new Post();
        if( $request->get( 'post_id' ))
        {
            $edit = true;
            $post = $repo->findOneBy( array(
                'id' => $request->get( 'post_id' ),
            ));
        }
//        $post->setImage( $image );
        $form = $this->createForm( new PostType(), $post );
        if ( $request->getMethod() == 'POST' )
        {
            $this->get( 'session' )->getFlashBag()->add( 'info', 'F&UCK' );

            $form->bind( $request );
            if ( $form->isValid() )
            {
                $em->persist( $post );
                $em->flush();
//                $this->get( 'session' )->getFlashBag()->add( 'info', 'Article bien enregistré' );
                return $this->redirect(
                            $this->generateUrl( 'sdzblog_post_view', array(
                                'post_id' => $post->getId()
                            )
                ));
            }
        }

        return $this->render( 'SdzBlogBundle:Post:edit.html.twig', array(
                    'edit' => $edit,
                    'post' => $form->createView(),
        ));
    }

    public function deleteAction( Request $request )
    {
        return new Response( 'not implemented yet' );
    }
}