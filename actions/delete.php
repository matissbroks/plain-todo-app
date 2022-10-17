<?php

$itemId = $_GET["id"];
if(!is_numeric($itemId)) {
    echo "Not possible value";
}
else {
    echo print_r($itemId, 1);
}
