<?php 
namespace App\Mailer;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class ContactMailer
{
    public function __construct(MailerInterface $mailer, Environment $twig, string $contactEmailAddress )
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->contactEmailAddress = $contactEmailAddress;
    }

    public function send(Contact $contact): void
    {
        $email = (new Email())
            ->from($contact->getEmail())
            ->to($this->contactEmailAddress)
            ->subject('Contact form');

        $this->mailer->send($email);
    }
    
}