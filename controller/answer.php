<?php

if (isset($_POST['vorname']) && isset($_POST['name'])) {
    $_SESSION['vorname'] = $_POST['vorname'];
    $_SESSION['name'] = $_POST['name'];
}

header('Location: ./home');
exit;