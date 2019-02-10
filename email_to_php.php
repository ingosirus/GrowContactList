#!/usr/local/php70/bin/php-cli -q
<?php
chdir(dirname(__FILE__));
$fd = fopen("php://stdin", "r");
$email = "";
while (!feof($fd)) {
    $email .= fread($fd, 1024);
}
fclose($fd);

if(strlen($email)<1) {
    die(); 
}

// handle email
$lines = explode("\n", $email);

// empty vars
$from = "";
$to="";
$subject = "";
$headers = "";
$message = "";
$splittingheaders = true;
$FullName = array();

for ($i=0; $i < count($lines); $i++) {
    
    
    if ($splittingheaders) {
        // this is a header
        $headers .= $lines[$i]."\n";
        // look out for special headers
        if (preg_match("/^Subject: (.*)/", $lines[$i], $matches)) {
            $subject = $matches[1];
        }
        if (preg_match("/^From: (.*)/", $lines[$i], $matches)) {
            $from = $matches[1];
        }
        if (preg_match("/^To: (.*)/", $lines[$i], $matches)) {
            $to = $matches[1];
        }
    } else {
        // not a header, but message
        $message .= $lines[$i]."\n";
        
    }

    if (trim($lines[$i])=="") {
        // empty line, header section has ended
        $splittingheaders = false;
    }
}


if (!empty($from) && !empty($message) && !empty($subject)) {


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


$parsed = get_string_between($message, "beginMe", "endMe");

$new_fields = explode("/", $subject);
$FullName = explode(" ",$new_fields[1]); 


$_POST["conqueder"] = "linkToListFeb2019"; // This is a key send to the script in contact with constant contact. They must Match.
$_POST["yourname"] = $FullName[0];
$_POST["yoursirname"] = $FullName[1];
$_POST["youremail"] = $new_fields[2];
$_POST["yourmessage"] = $parsed;
$_POST["yoursubject"] = "Desde tu Sitio Web"; // Customize this subject line to reflect your needs
$_POST["yourphone"] = $new_fields[3];

require_once("linktolist-act.php");

}

?>