<?php
namespace Doplus\ParatronicBundle\Service;

use Symfony\Component\Templating\EngineInterface;

class DoplusMailer
{
    protected $mailer;
    protected $templating;
    private $from = "test.doplus@gmail.com";
    private $name = "Paratronic Superviseur";

    public function __construct($mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function sendMessage($to, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();

        $mail
        ->setFrom($this->from, $this->name)
        ->setTo($to)
        ->setSubject($subject)
        ->setBody($body)
        ->setReplyTo($this->from, $this->name)
        ->setContentType('text/html');

        $this->mailer->send($mail);
    }
    
    public function sendAlerte(\Doplus\UserBundle\Entity\Utilisateur $user, \Doplus\ParatronicBundle\Entity\Mesure $mesure, \Doplus\ParatronicBundle\Entity\Alerte $alerte){
        if ($alerte->getNiveauAlerte() == 1) {
            $subject = "ALERTE - SEUIL DEPASSE";
            $template = 'DoplusParatronicBundle:Mail:alerte.html.twig';
            $to = $user->getEmail();
            $body = $this->templating->render($template, array(
                'user' => $user,
                'mesure' => $mesure,
                'alerte' => $alerte
            ));
            $this->sendMessage($to, $subject, $body);
        }
        else {
            $subject = "PRE-ALERTE - SEUIL DEPASSE";
            $template = 'DoplusParatronicBundle:Mail:PreAlerte.html.twig';
            $to = $user->getEmail();
            $body = $this->templating->render($template, array(
                'user' => $user,
                'mesure' => $mesure,
                'alerte' => $alerte
            ));
            $this->sendMessage($to, $subject, $body);
        }
    }
}

