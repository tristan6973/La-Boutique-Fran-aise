<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/nous-contacter", name="contact")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user_prenom = $form['prenom']->getData();
            $user_nom = $form['nom']->getData();
            $user_mail = $form['email']->getData();
            $user_message = $form['content']->getData();

            $mail = new Mail();
            $content = "Bonjour Aisha,<br/>"
                ."Ce mail provient de "."$user_prenom"." "."$user_nom"." son mail est "."$user_mail"."."
                ."<br/>"."$user_message"."<br/>";
            $mail->send("dicaprio-1995@live.fr", "Aisha ERRAZANI", 'Contact de client via site e-commerce', $content);
            $this->addFlash('notice', 'Merci de nous avoir contacté. Notre équipe va vous répondre dans les meilleurs délais.');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
