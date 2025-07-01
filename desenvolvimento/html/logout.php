<?php

@session_start();

unset($_SESSION['user_portal']);

@session_regenerate_id();
@session_destroy();

header('Location: login.php');