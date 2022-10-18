<li>
    <?php $sql = "  SELECT categoria.nome, categoria.id 
                    FROM categoria 
                    WHERE categoria.id='$idCategoria'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            echo '<a href="#" id="' . $row['id'] . '">' . $row['nome'] . '</a>';
        }
    }
    ?>
    <a href="#" id="articoli">Articoli</a>
    <a href="#" id="acquistiGiocatori">Acquisti Giocatori</a>
    <a href="#" id="acquistiDirigenza">Acquisti Dirigenza</a>
</li>