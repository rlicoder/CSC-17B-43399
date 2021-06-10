<?php

if (isset($_POST["moves"]))
{
    $moveset = $_POST["moves"];
    echo "<script>console.log('$moveset');</script>";
    $output = system("./c4solver -x " . $moveset);
    echo "<script>console.log('output is ');</script>";
    //echo "<script>console.log('$output');</script>";
    print_r($output);
}

?>