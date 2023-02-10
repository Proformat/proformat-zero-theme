<?php 

function dump($data, $mode = 'a'){
    $debug_file_path = get_theme_file_path() . '/debug.txt';
    if(!is_writable($debug_file_path)){
        unlink($debug_file_path);
    }

    ob_start();
    var_dump($data);
    $data = ob_get_clean();
    $fp = fopen($debug_file_path, $mode) or die("Unable to open file!");
    fwrite($fp, $data);
    fclose($fp);
}


?>