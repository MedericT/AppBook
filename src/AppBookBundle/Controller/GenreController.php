<?php

namespace AppBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBookBundle\Entity\Genre;
use AppBookBundle\Form\GenreType;

class GenreController extends Controller
{
    public function addAction(Request $request)
    {
        $genre = new Genre();
        $form = $this->createForm( new GenreType(), $genre);

        if($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            return $this->redirect($this->generateUrl('appbook_index'));
        }

        return $this->render('AppBookBundle:Genre:Add.html.twig',
                            array(
                                'form' => $form->createView()
                            ));
    }
}
