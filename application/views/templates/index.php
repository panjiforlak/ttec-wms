<?php
include __DIR__ . "/../backend/templates/header.php";
include __DIR__ . "/../backend/templates/sidebar.php";
include __DIR__ . '/../backend/' . $page_name . '.php';
include __DIR__ . '/../backend/templates/modal.php';
include __DIR__ . "/../backend/templates/footer.php";
