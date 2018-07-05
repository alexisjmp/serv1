<?php
session_start();
unset($_SESSION["usuario"]);
unset($_SESSION["rut_usuario"]);
 
  session_unset();
		session_destroy();
          	?>
	<script>
    	window.location = "cerrar.php";
    </script>
	<?      
                
?>
