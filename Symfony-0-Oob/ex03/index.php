<?php
include 'Elem.php';
include 'TemplateEngine.php';

$html = new Elem('html');
$head = new Elem('head');
$title = new Elem('title', 'Ma Page Web');
$body = new Elem('body');
$header = new Elem('h1', 'Bienvenue sur ma page');
$paragraph = new Elem('p', 'Ceci est une balsie p pour mon site web');

$head->pushElement($title);
$body->pushElement($header);
$body->pushElement($paragraph);
$html->pushElement($head);
$html->pushElement($body);

$templateEngine = new TemplateEngine($html);
$templateEngine->createFile('my-page.html');
?>