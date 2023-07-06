#!/usr/local/bin/php
<?php
// email addresses
$sender = $_POST["sender_email"];
$receivers = $_POST["receiver_emails"];

// subject
$proofer_names = "[" . $_POST["proofer_names"] . "]";
if(isset($_POST['timecheck'])) {
    $timecheck = $_POST["timecheck"];
    if($timecheck == "Before 12") {
        date_default_timezone_set('America/Santiago');
    } else if ($timecheck == "After 12") {
        date_default_timezone_set('America/Los_Angeles');
    }
}
$current_date = date("m/d");
$subject = $proofer_names . " " . $current_date . " Pagination";

// sections
$Arts_start = "Received: " . $_POST["Arts_start"];
$Arts_end = "Uploaded: " . $_POST["Arts_end"];
$Op_start = "Received: " . $_POST["Op_start"];
$Op_end = "Uploaded: " . $_POST["Op_end"];
$Sports_start = "Received: " . $_POST["Sports_start"];
$Sports_end = "Uploaded: " . $_POST["Sports_end"];
$News_start = "Received: " . $_POST["News_start"];
$News_end = "Uploaded: " . $_POST["News_end"];

// message
if(isset($_POST['message'])) {
    $message = $_POST["message"];
}

// header
$header  = "From: $sender \r\n";
$header .= "Reply-To: $receivers \r\n";
$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// content
$content = "<html><body>";
$content .= "[A&E]" . "<br>";
$content .= $Arts_start . "<br>";
$content .= $Arts_end . "<br>" . "<br>";
$content .= "[Op]" . "<br>";
$content .= $Op_start . "<br>";
$content .= $Op_end . "<br>" . "<br>";
$content .= "[Sports]" . "<br>";
$content .= $Sports_start . "<br>";
$content .= $Sports_end . "<br>" . "<br>";
$content .= "[News]" . "<br>";
$content .= $News_start . "<br>";
$content .= $News_end . "<br>" . "<br>";
$content .= $message . "<br>";
$content .= "</body><html>";

mail($receivers, $subject, $content, $header);
header("Location: sent.html");
?> 
