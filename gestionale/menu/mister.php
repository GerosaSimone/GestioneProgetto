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
</li>
<li>
    <a href="#ShopSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area
        Shop</a>
    <ul class="collapse list-unstyled" id="ShopSubmenu">
        <li>
            <a href="#" id="articoli">Articoli</a>
        </li>
        <li>
            <a href="#" id="acquistiGiocatori">Acquisti Giocatori</a>
        </li>
        <li>
            <a href="#" id="acquistiDirigenza">Acquisti Dirigenza</a>
        </li>
    </ul>
</li>