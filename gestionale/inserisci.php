<?php
require_once 'config.php';
session_start();
$squadra = $_GET['squadra'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["dataNascita"])&& !empty($_POST["tipo"])) {
        //tutti i campi inseriti
        $sql = "SELECT * FROM auto Where idUtente='" . $_SESSION['user_id'] . "'";
        if (!empty($_POST["modello"])) {
            $sql .= " and modello='" . $_POST['modello'] . "'";
        }
        if (!empty($_POST["ral"])) {
            $sql .= " and ral='" . $_POST['ral'] . "'";
        }
        if (!empty($_POST["costo"])) {
            $sql .= " and costo<'" . $_POST['costo'] . "'";
        }
        if (!empty($_POST["anno"])) {
            $sql .= " and anno='" . $_POST['anno'] . "'";
        }
        $sql = "INSERT INTO calciatori (anno, progressivo, tipo, idUtente) VALUES (?, ?, ?,?)";
        $a = $_POST["anno"];
        $b = $_POST["progressivo"];
        $c = false;
        if ($_POST["tipo"] != "comune")
            $c = true;
        $d = $_SESSION['user_id'];
        echo $c;
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssbs", $a, $b, $c, $d);
            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a card record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Anno</label>
                            <input type="text" name="anno" class="form-control">
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Progressivo</label>
                            <input type="text" name="progressivo" class="form-control">
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label class="form-check-label">Comune</label>
                            <input type="radio" id="comune" name="tipo" value="comune" class="form-check-input">
                            <label class="form-check-label">Rara</label>
                            <input type="radio" id="rara" name="tipo" value="rara" class="form-check-input">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>