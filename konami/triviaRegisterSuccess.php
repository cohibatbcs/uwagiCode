<?php
session_start();
session_destroy(); //Delete session
print ("<script>location.href='triviaLogin.php'</script>");
?>