<?php
include './config/connect_db.php';

unset($_SESSION['email']);

header("location: $base_url");
