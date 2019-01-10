<?php
highlight_file(__FILE__);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>IP detector</title>
    </head>
    <body>
        <center>
            <form action="." method="POST">
                IP: <input type="text" name="ip" placeholder="Your ip"/><input type="submit" value="ping it!"/>
            </form>
            <?php
if (!empty($_POST['ip'])) {
    $ip = $_POST['ip'];
    exec("ping -c 1 \"{$ip}\" 2>&1", $ret);
    foreach ($ret as $out) {
        echo htmlentities($out."\n");
    } 
}
?>
        </center>
    </body>
</html>
