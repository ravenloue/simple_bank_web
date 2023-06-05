<?php
	require "./src/components/WelcomeSection.php";
	require "./src/components/LoginSection.php";

	$newAcctStatus = isset($_GET['c']);
	if($newAcctStatus){
		$contents=$aside."<h3 style='color:#545365; position: absolute; z-index: 10; top: 0; left: 67%; font-weight: 700;'>Success!</h1>
		                  <p style='color:#545365; text-align: center;position: absolute; z-index: 10; top: 1.625rem; left: 67%; font-size: .825rem;'>Please login below.</p>".$section;
	}else{
		$contents=$aside.$section;}
?>