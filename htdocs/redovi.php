<?php
function red($tipp,$co)
{
    echo "
<tr><td><input type='text' id='skart' value='";

//$skart="select serbr,jmbg from skart WHERE brkontrol={$o}";

    switch ($tipp) {
        case ("ID"):
            echo "AA00";
            break;
        case ("IN"):
            echo "BB00";
            break;

        case ("DL"):
            echo "VD00";
            break;
        case ("VL"):
            echo "SD00";
            break;
        case ("EL"):
            echo "SL00";
            break;
        case ("WL"):
            echo "DN00";
            break;
        case ("OL"):
            echo "LN00";
            break;
    }

    echo  "' name='serbr' ></td>
                <td>";
                    sve($co, 'status');
                    echo "</td><td>";
                    sve($co, 'razlozi');
                    echo "</td>
<td><input type='text' id='skart' minlength='13' maxlength='13' name='jmbg'></td>
<td>";
                    sve($co, 'nmasine');
                    echo "</td>
</tr>";
                    }