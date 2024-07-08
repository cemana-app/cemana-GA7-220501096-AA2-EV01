<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started
}
?>
<div 
    class="welcome-message p-2"
    style="
        color: #ffffff; 
        text-align:center; 
        background-color: rgba(0, 0, 0, 0.1);
        width:50%;
        margin:auto;
        border-radius:5px;">
        <span> <?php echo 'Usuario : '. $_SESSION['user_name']; ?> </span>
</div> 