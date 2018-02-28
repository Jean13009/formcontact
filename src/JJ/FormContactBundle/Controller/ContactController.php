<?php

namespace JJ\FormContactBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use JJ\FormContactBundle\Entity\Contact;
use JJ\FormContactBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller {

    public function formAction(Request $request) {
            $contact = new Contact();
            $form = $this->get('form.factory')->create(ContactType::class, $contact);

            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Message envoyé');

                return $this->redirectToRoute('jj_form_contact_contact');
            }

            return $this->render('JJFormContactBundle:Contact:Contact.html.twig', array(
                        'form' => $form->createView(),
            ));
        }
    }
    