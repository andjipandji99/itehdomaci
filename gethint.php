<?php
$a[] = "Beogardsko dramsko pozoriste";
$a[] = "Atelje 212";
$a[] = "Jugoslovensko dramsko pozoriste";
$a[] = "Narodno pozoriste";

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

echo $hint === "" ? "Nema predloga" : $hint;
?>