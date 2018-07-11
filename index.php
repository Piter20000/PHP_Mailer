<?php

session_start();

require_once 'Classes/PHP_Mailer_Class.php';

if (isset($_POST['submit'])){

    $message = new PHP_Mailer_Class();

    $message->setFrom($_POST['subject']);

    $message->Set_Email_Message($_POST['message'],"PHPMailer Piotr Murdzia","Alt message body");

    $message->addAddress($_POST['email'],'Piotr Murdzia Test mailer');

    $message->Send_Email();

    $_SESSION['info'] = true;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send mail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px">
        <?php
        if ($_SESSION['info'])
        {
            echo '<div class="alert alert-success">';
            echo '<strong>Success!</strong> Email has been successfully sent!';
            echo '</div>';

            $_SESSION['info'] = false;
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3" align="center">
                <form action="#" method="POST">
                    <input type="email" placeholder="Email" name="email" class="form-control" required />
                    <br />
                    <input type="text" placeholder="Subject" name="subject" class="form-control" required />
                    <br />
                    <input type="text" placeholder="Message" name="message" class="form-control" required />
                    <br />
                    <input type="submit" value="Send message" name="submit" class="btn btn-primary" />
                </form>
            </div>
        </div>
    </div>
</body>
</html>
