
<?php
// Start the PHP session
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();
?>
<script>
// Clear localStorage on the client side
localStorage.clear();

// Redirect the user to the welcome page
window.location.href = 'welcome.php';
</script>



<!-- ?php

require_once "config/init.php";
?>
<script>
localStorage.clear();
</script>
<=?php
// session_start();
// remove all session variables
session_unset();
 
// destroy the session
session_destroy();
header("location:welcome.php" );

?> -->
