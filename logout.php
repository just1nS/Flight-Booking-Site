<?php
    session_start();
    unset($_SESSION);
    session_destroy();
    session_write_close();
    header('location: /landing-page.html', true, 301);
    exit;
?>