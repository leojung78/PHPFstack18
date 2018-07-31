
<?php

if (isset($_GET["p"])) {
	$pagina = $_GET ["p"];
	} else {
	$pagina = "home";
}

include "header.php";

?>

<div class="container">

<?php

if (file_exists("{$pagina}.php")) {
	include "{$pagina}.php";
	} else {
	include "404.php";
}


?>

</div>

<?php include "footer.php"; ?>

