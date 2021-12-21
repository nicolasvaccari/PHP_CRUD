<?php
	echo "<br>";
	echo "<div style='text-align: center; font-size:10pt'>";
	echo "<p>Acessado por ". $_SERVER['REMOTE_ADDR'] . " em ". date('d/M/Y');
	echo "<br>Desenvolvido por Nicolas Vaccari &copy; 2021</p>";#2018
	echo "</div>";
	$a = 1;
	while ($a <= 5) {
		echo "<br>";
		$a++;
	}