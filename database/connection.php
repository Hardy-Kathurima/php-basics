<?php
$db = new Mysqli("localhost", "root", "", "php_Blog");
if ($db->connect_errno) {
    // echo $db->connect_error;
    die("sorry we have some problems");

}
