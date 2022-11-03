<?php
    $pagetitel = 'Home';

    if (($_SESSION['vorname'] != '') && ($_SESSION['name'] != '')) {
        $vorname = $_SESSION['vorname'];
        $name = $_SESSION['name'];
    } else {
        $vorname = 'Max';
        $name = 'Musterman';
    }

    $template = $twig->load('home.twig');
    echo $template->render( array(
        'pagetitel' => $pagetitel,
        'vorname' => $vorname,
        'name' => $name
    ));