<?php


	require_once("edit_functions.php");
	
	//edit.php
	//aadressireal on ?edit_id siis trukin valja selle vaartuse
	if(isset($_GET["edit_id"])){
		echo $_GET["edit_id"];
		
		//id oli adressireal
		//tahaks uhte rida koige uuemaid andmeid kus id on $_GET["edit.php"]
		$car = getEditData($_GET["edit_id"]);
		var_dump($car);
		
	}else{
		//ei olnud adressireal
		echo "Viga";
		//die - edasi lehte ei laeta
		//die();
		
		//suuname kasutaja table.php lehele
		header("Location: table.php");
		
	}

	if(isset($_POST["update_plate"])){
		//vajutas salvesta nuppu
		//number_plate ja color tulevad vormist
		//aga id aadresirealt
		
		updateCar($_POST["id"], $_POST["number_plate"], $_POST["color"]);
		
		
	}

?>

<h2>Muuda autonumbrimark</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
	<input type="hidden" name="id" value="<?$_GET["edit_id"];?>">
	<label for="number_plate" >Auto numbrimark</label><br>
	<input id="number_plate" name="number_plate" type="text" value="<?=$car->number_plate;?>"><br><br>
	<label for="color">Varv</label><br>
	<input id="color" name="color" type="text" value="<?=$car->color;?>"><br><br>
	<input type="submit" name="update_plate" value="Salvesta">
</form>