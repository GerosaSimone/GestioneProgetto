<?php 

$file = fopen("file.txt", "r");
while(!feof($file))
{
    $linea=fgets($file);
    if($linea!="")
    {
        $split=explode(";",$linea);
        $_POST["name"]=$split[1];
    }
}

    fclose($file);

echo ' <table border="3" cellspacing="0" cellpadding="0">
<thead>
    <tr>
        <th style="border-right:200px;"></th>
        <th>GIOCATORE</th>
        <th>NASCITA</th>
        <th>RUOLO</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>
        <td></td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(146, 4, 4);">ATT</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>
        <td>Giocatore2</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(13, 146, 13);">DIF</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore3</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(146, 4, 4);">ATT</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore4</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(13, 146, 13);">DIF</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore5</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(146, 4, 4);">ATT</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore6</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(13, 146, 13);">DIF</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore7</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(192, 219, 38);">POR</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore8</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore9</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore10</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore11</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore12</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(192, 219, 38);">POR</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore13</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore14</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
    <tr>
        <td colspan=1><img src="imm\usericon.png" alt="5px" border=3 height=100 width=100></img></td>

        <td>Giocatore15</td>
        <td>06/11/2009</td>
        <td style="background-color:rgb(29, 39, 177);">CEN</td>
    </tr>
</tbody>
</table>'
?>