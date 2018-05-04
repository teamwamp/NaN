<?php
if (isset($_POST['mailform']))
{

$header = "MIME-Version: 1.0\r\n";
$header.= 'From:"NaN.ci"<support@NaN.ci>'."\n";
$header.= 'Content-Type:text/html; charset="utf-8" '."\n";
$header.= 'Content-Transfer-Encoding: 8bit';


$message = '
<html>
    <body>
        <div align="center">
            j\'ai envoyer ce mail depuis la page web !>
            <br>
        </div>
    </body>
</html>
';

mail("amosamospascal@gmail.com", "test", $message, $header);



}
?>
<form action="" method="POST" >
    <input type="submit" value="envoyer" name="mailform">   
</form>