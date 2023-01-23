<?php
	$step=$_GET['step'];
	include (dirname(__FILE__).'/Includes/data'.$step.'.php');
	include (dirname(__FILE__).'/Includes/ddc.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Géo-Quiz</title>
	</head>

	<body onload="javascript:menuDeroulant();">
		<h1 class="txtMaigre">Géo-Quiz</h1>
		<hr class="centre"/>
		<h3 id="h3" class="txtMaigre marge">Niveau <?php echo $step." : ".$themes[0];?></h3>
		<form method="get" action="done.php">
		<section class="flex">
        <?php
         echo '<input style="display:none;" name="step" value="'.$step.'"/>';
	        $a=1;
	        // echo $a;
	        for ($i=0; $i < count($villes) ; $i++) { 
	        	$a=1;
	        	$z=$a+$i;
	        	echo '<div class="marge">
	        		<div class="pastille">'.$z.'</div>
	        		<img  class="visus" src="images/step'.$step.'/'.ddc($villes[$i]).'.png">
	        	<br/>';

	        	echo'<select id="choix'.$i.'" name="Sel'.$i.'" required onchange="menuDeroulant();">';                  
		         	foreach ($villesChoix as $villesSel) {
		            	echo '<option value="'.$villesSel.'" id="'.$villesSel.$i.'" required>'.$villesSel.'</option>';
		            }
		            echo'</select></div>';
	        }
        ?>
        </section>
        <input class="boutonOn" style="display: none" id="valider" type="submit" value="VALIDER"/>
        <input class="boutonOff" style="display: block;" id="validerOff" type="button" value="CHOIX INCOMPLET"/>
        <p class="alert" style="display: none" id="message">Attention ! Vous ne pouvez pas sélectionner plusieurs fois la même ville</p>
    	</form>
    	<footer></footer>
	</body>
	<script type="text/javascript">	
		
		function menuDeroulant() {
			var affiche = document.getElementById('valider'); 
			var afficheOff = document.getElementById('validerOff'); 
			
			var message = document.getElementById('message');
			

			var menu0 = document.getElementById('choix0').value;
			var menu1 = document.getElementById('choix1').value;
			var menu2 = document.getElementById('choix2').value;
			var menu3 = document.getElementById('choix3').value;
			var menu4 = document.getElementById('choix4').value;
			var menu5 = document.getElementById('choix5').value;
			var menu6 = document.getElementById('choix6').value;
			var menu7 = document.getElementById('choix7').value;
			var menu8 = document.getElementById('choix8').value;
			var menu9 = document.getElementById('choix9').value;

			let users1 = [menu0,menu1,menu2,menu3,menu4,menu5,menu6,menu7,menu8,menu9];
			console.log(users1);
			let users2 = ['Choisir une ville'];
			
			let users = [...new Set(users1.concat(users2))]
			console.log(users.length);
			// console.log(users1='');
			
			
			
			if (users.length > 10) {
					affiche.style.display = 'block';
					afficheOff.style.display = 'none';
					message.style.display = 'none';
				}
				else if(menu0 == 'Choisir une ville' || menu1 == 'Choisir une ville' || menu2 == 'Choisir une ville' || menu2 == 'Choisir une ville' || menu3 == 'Choisir une ville' || menu4 == 'Choisir une ville' || menu5 == 'Choisir une ville' || menu6 == 'Choisir une ville' || menu7 == 'Choisir une ville' || menu8 == 'Choisir une ville' || menu9 == 'Choisir une ville'){
					affiche.style.display = 'none';
					afficheOff.style.display = 'block';
					message.style.display = 'none';
				}
				else{
					affiche.style.display = 'none';
					afficheOff.style.display = 'none';
					message.style.display = 'block';
			}
		}
	
		
	</script>
</html>