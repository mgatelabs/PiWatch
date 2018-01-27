<?php
    header('Content-type: application/json');

    $pins = explode(',', $_POST["pins"]);

    $result = array();

    for ($i = 0; $i < count($pins); $i++) {
        $pin = $pins[$i];
        if (is_numeric($pin) && $pin >= 0 && $pin <= 26) {
            exec ( "gpio read ".$pin, $status);
            $result[$pin] = $status[0];
        }
    }

    echo json_encode($result);
?>