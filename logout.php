<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to a new page or perform other actions
header('Location: welcomepage.html');
exit();
?>