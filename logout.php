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
window.location.href = 'index';
</script>