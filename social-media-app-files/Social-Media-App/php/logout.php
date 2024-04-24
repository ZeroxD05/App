<?php
    session_start();

    // Delete Session
    session_unset();
    session_destroy();

    // Go to login
    header("Location: ../login");
    exit();
?>
