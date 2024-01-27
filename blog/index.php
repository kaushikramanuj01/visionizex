<?php
// Retrieve the blogId from the URL
$blogId = basename($_SERVER['REQUEST_URI']);

// Now $blogId contains the value from the URL
echo 'Blog ID: ' . $blogId;
?>
