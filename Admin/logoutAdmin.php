<?php
session_start();
function confirmerDeconnexion() {
    $url = "loginAdmin.html";
    echo "<script>";
    echo "if (confirm('Êtes-vous sûr de vouloir vous quitter votre interface ?')) {";
    echo "window.location.href = '$url';";
    echo "}";
    echo "else";
    echo"{
        window.location.href = 'AdminPrincipal.html';
    }";
    echo "</script>";
  }
    session_unset();
    session_destroy();
    confirmerDeconnexion();
    exit();
?>