<?php

require_once 'MyMail.php';

$m = new MyMail();

$m->to ="eileen2198@outlook.com";
$m->subject="test mail";
$m->message="Hello, I'm MyMail Class";

$m->From="admin@example.com";

$m->X_Mailer="MyMail 1.0";

$m->X_Priority=1;

$m->X_MSMail_Priority='High';


$m->send();
?>
