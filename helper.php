<?php
function generateLink($fileName) {
    return "http://" . $_SERVER['HTTP_HOST'] . "/Bankapp/" . $fileName;
}
?>
