<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">



<body>
    <div class="page-header clearfix">
        <h2 class="pull-left"> Articoli </h2>
    </div>
</body>

</html>