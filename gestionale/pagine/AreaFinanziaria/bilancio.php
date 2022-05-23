<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: pagine/login/login.html");
}
$_SESSION['ultimaPage'] = "finanziaria";
require_once '../../config.php';
?>

<body>
    <header class="text-center mb-2">
        <h1 class="display-5 font-weight-bold">Area Finanziaria</h1>        
    </header>
</body>