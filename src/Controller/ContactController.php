<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Contact;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="Contact")
     */
    public function index(Request $request): Response
    {
        $Contact = new Contact;

        $form = $this->createFormBuilder($Contact)
        ->add('nom',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('email',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('titre',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->add('message',TextType::class,[
            'attr' => ['class' => 'input--style-4' ],
            'label_attr' => ['class' => 'label' ]
        ])
        ->getForm();

        $form->handlerequest($request);

        return $this->render('contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    


}


