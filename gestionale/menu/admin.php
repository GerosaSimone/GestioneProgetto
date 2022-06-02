<li>
    <a href="#TesseratiSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Tesserati</a>
    <ul class="collapse list-unstyled" id="TesseratiSubmenu">
        <li>
            <a href="#MisterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Generale</a>
            <ul class="collapse list-unstyled" id="MisterSubmenu">
                <li>
                    <a href="#" id="dirigenza">Dirigenza</a>
                </li>
                <li>
                    <a href="#" id="giocatori">Giocatori</a>
                </li>
                <li>
                    <a href="#" id="categorie">Gestione Categorie</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#SquadreSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Squadre</a>
            <ul class="collapse list-unstyled" id="SquadreSubmenu">
                <?php $sql = "  SELECT categoria.nome, categoria.id 
                                FROM categoria";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<li><a href="#" id="' . $row['id'] . '">' . $row['nome'] . '</a></li>';
                        }
                    }
                }
                ?>
            </ul>
        </li>
    </ul>
</li>
<li>
    <a href="#" id="bilancio">Area Finanziaria</a>
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
<li>
    <a href="#MagazzinoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area Magazzino</a>
    <ul class="collapse list-unstyled" id="MagazzinoSubmenu">
        <li>
            <a href="#" id="deposito">Deposito</a>
        </li>
        <li>
            <a href="#" id="acquistiSocieta">Acquisti Società</a>
        </li>
    </ul>
</li>
<li>
    <a href="#" id="sponsor">Area Sponsor</a>
</li>
<li>
    <a href="#SitoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Area
        Sito</a>
    <ul class="collapse list-unstyled" id="SitoSubmenu">
        <li>
            <a href="#" id="galleria">Foto Galleria</a>
        </li>
        <li>
            <a href="#" id="news">Foto News</a>
        </li>
    </ul>
</li>
<li>
    <a href="#" id="registrazioni">Area Registrazioni</a>
</li>