<?php

namespace AppBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBookBundle\Entity\Author;
use AppBookBundle\Form\AuthorType;

class AuthorController extends Controller
{
    public function addAction(Request $request)
    {
        $author = new Author();
        $form = $this->createForm( new AuthorType(), $author);

        if($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            return $this->redirect($this->generateUrl('appbook_index'));
        }

        return $this->render('AppBookBundle:Author:Add.html.twig',
                            array(
                                'form' => $form->createView()
                            ));
    }
}
