<div class="form-group mt-2" style="max-height:45%">
    <label class="text-dark font-weight-bold">User</label>
    <input type="text" name="user" class="form-control form-control-sm mb-2" required>
    <label class="text-dark font-weight-bold">Password</label>
    <input type="text" name="password" class="form-control form-control-sm mb-2" required>

    <label class="text-dark font-weight-bold">Categoria</label>
    <select name="categoria" class="form-control form-control-sm ">
        <option value=""></option>
        <?php
        require_once "../../config.php";
        $query = "SELECT * FROM categoria";
        if ($result = mysqli_query($link, $query)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<option value=" . $row["id"] . ">" . $row["nome"] . "</option>";
                }
                //vado 10 minuti a cagare, finito, pero tra poco devo andar dalla nonna a pranzo quindi mi sto preparando, inizia a metter sta select ovunque che in teoria va tutto uguale con l id
                //cmq dopo pranzo torno a casa e opssiam continuar un po
            }
        }
        ?>
    </select><br>
    <label class="text-dark font-weight-bold">Tipo</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="tipo" value="0" required>
        <label class="form-check-label" for="inlineRadio1">Admin</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="tipo" value="1" required>
        <label class="form-check-label" for="inlineRadio2">Mister</label>
    </div><br>
</div>