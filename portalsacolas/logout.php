<?php
session_start();
session_destroy();
clearstatcache();
echo "<script>window.location = 'index.php'</script>"; 
 ?>