<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>
    <div class="page-header clearfix">
        <h2 class="pull-left"> News </h2>
    </div>
</body>

</html>