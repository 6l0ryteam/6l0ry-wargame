<?php

highlight_file(__FILE__);

if (isset($_GET['💩'])) {
    $_ = $_GET['💩'];
}
$waf = Array("'", "\"", "^", "|", "l", "p");

if(isset($_)) {

    sort($_);

    $s = '';
    for($i = 0; $i < count($_); $i++)
        $s .= chr($_[$i]);

    if(preg_match("/[\w]{5,}/is", $s))
        die("GG");

    for($i = 0; $i < count($waf); $i++)
        if(strpos($s, $waf[$i]) !== FALSE)
            die("GG");
    echo($s);

    system(substr($s, 0, 25));
}
?>
