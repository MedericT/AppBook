<?php

namespace AppBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBookBundle\Entity\Book;
use AppBookBundle\Form\BookType;
use AppBookBundle\Entity\Genre;

class BookController extends Controller
{
    public function viewAction()
    {
    }

    public function addAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm( new BookType(), $book);

        if($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirect($this->generateUrl('appbook_index'));
        }


        return $this->render('AppBookBundle:Book:Add.html.twig',
                            array(
                                'form' => $form->createView()
                            ));
    }
}
/*

    if($request->isMethod("POST")) {
        $genres = $request->request->get("appbookbundle_book")["genres"];
        foreach($genres as $genre) {
            $findedGenre = $this->getDoctrine()
                ->getManager()
                ->getRepository('AppBookBundle:Genre')
                ->findById($genre);
            if (!$findedGenre) {
                $new_genre = new Genre();
                $new_genre->setGenre($genre);
                $em = $this->getDoctrine()->getManager();

                $em->persist($new_genre);
                $em->flush();
                $genre = $form->getData('genres');
                $test = $form->handleRequest($request);
                 dump($test);
                 die();

            }
        }
    }
if($request->isMethod("POST")) {
    $genres = $request->request->get("appbookbundle_book")["genres"];
    foreach($genres as $genre) {
        $findedGenre = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBookBundle:Genre')
            ->findById($genre);
        if (!$findedGenre) {
            $new_genre = new Genre();
            $new_genre->setGenre($genre);
        }
    }
    $title = $request->request->get["appbookbundle_book"]["title"];
    $book = new Book();
    $book->setTitle($title);
    $em = $this->getDoctrine()->getManager();
    $em->persist($book);
    $em->flush();
    return $this->redirect($this->genrateUrl('appbook_index'));
}
*/

/*$('a').on 'click', (event) ->
    event.preventDefault()
    $.ajax
        url: 'book#like'
        data:
            book: book#id
                succes: (data) ->
                $(".likes-count").html(data["count"])
                $(".dds").addClass("active")
                error: ->


                active: {
                    color: blue;
                }

        # trouver le livre avec l'id X
        # obtenir le nombre de likes
        # incrementer le nombre de likes
        # retourner le nouveau nombre en JSON

        /*GroupBy(genre)
        /*GroupBy(title | la premiere lettre) pour afficher par lettre
*/
