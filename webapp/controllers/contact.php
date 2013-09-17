<?php
$errors  = array();
$sent    = false;
$name    = '';
$email   = '';
$subject = '';
$message = '';
if (isset($_POST['send'])) {

    // Validations
    $name    = validate_not_empty('name', $errors, 'Le nom complet est obligatoire');
    $email   = validate_not_empty_email('email', $errors, 'L\'adresse mail est obligatoire', 'L\'adresse mail que vous avez saisi n\'est pas valide');
    $subject = validate_not_empty('subject', $errors, 'L\'objet est obligatoire');
    $message = validate_not_empty('message', $errors, 'Le message est obligatoire');

    // Send message if no errors
    if (empty($errors)) {
        $headers = array();
        $headers['from'] = $email;
        $headers['replyTo'] = 'Reply-To';
        $headers['returnPath'] = 'Return-Path';
        $headers[] = "Content-Type: text/html; charset=utf-8";
        $headers[] = "MIME-Version: 1.0";

        if (mb_send_mail('a.bachar@hotmail.fr', "[abachar.net] Formulaire de contact", "Nom : {$name} \nE-mail : ${$email}\nSujet : {$subject} \nCommentaire : {$message}", implode("\r\n", $headers))) {
            $sent    = true;
            $name    = '';
            $email   = '';
            $subject = '';
            $message = '';
        } else {
            $errors[] = "&Eacute;chec lors de l'envoi de votre message, veuillez essayer plus tard. l'&eacute;quipe abachar.fr s'excuse pour le desagrement";
        }
    }
}

render('contact', 'index', array(
    'personalCard' => $personalCard,
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'errors' => $errors,
    'sent' => $sent
));
