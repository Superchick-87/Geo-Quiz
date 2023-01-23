<?php
	// $step=$_GET['step'];
	include (dirname(__FILE__).'/Includes/niveaux.php');
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

	<body onload="menuDeroulant()">
		<!-- <?php echo $niveaux[0];?> -->
		<h1 class="txtMaigre">Géo-Quiz</h1>
		<hr class="centre" />
		<h3 class="txtMaigre marge">Reconnaîtrez-vous ces villes du Sud-Ouest ?</h3>
		<p class="intro centre">Connaissez-vous bien les villes du Sud-Ouest ? Vous êtes fort en géographie ? Testez vos connaissances de la région avec ce nouveau jeu cartographique : nous avons ôté de chaque plan la plupart des repères habituels. Ne persistent que le tracé des rues et le nom d'un lieu pour vous guider.</p>
		<h4 class="txtGras marge">Maintenant, à vous de jouer !</h4>
		
		<form method="get" action="indexGo.php?step=1">
			<!-- <p class="consigne intro centre">Commencer une nouvelle partie...</p> -->
			<button class="boutonOn" id="new" type="submit" name="step" value="1">NOUVELLE PARTIE</button>
		</form>	
		<img class="visu" src="images/intro.png">
		<form id="form" method="get">
			<p class="consigne">Reprendre une partie en cours</p>
			<section class="flex">
	        <?php
	        	echo'<select id="choix" name="step" onchange="menuDeroulant();" value="'.$niveaux[0].'">';                  
		         	foreach ($niveaux as $niveauxSel) {
		            	echo '<option value="'.preg_replace('~\D~', '', $niveauxSel).'" id="'.$niveauxSel.'">'.$niveauxSel.'</option>';
		            }
	            echo'</select></div>';
	        ?>
	        </section>
	        <button style="display: none" class="boutonOn centre" id="valider" type="submit">VALIDER</button>
        
        <!-- <input style="display: none;" id="toto" type="button" value="<?php echo $niveaux[0][-1];?>"/> -->
        <!-- <p class="alert" style="display: none" id="message">Attention ! Vous ne pouvez pas sélectionner plusieurs fois la même ville</p> -->
    	</form>
    	<footer></footer>
	</body>
	<script type="text/javascript">
		function menuDeroulant() {
			var boutonValider = document.getElementById("valider");
			// console.log(boutonValider)
			var menu = document.getElementById('choix').value;
			console.log(menu);

			var toto = '<?php echo $niveaux[0];?>';
			console.log(toto)
			var form = document.getElementById('form');
			console.log(form)

			if (menu !== toto) {
				
				form.action = 'indexGo.php?step='+menu;
				boutonValider.style.display = 'block';
			}
			if (menu == '') {
				boutonValider.style.display = 'none';
			}
			// else{
			// 	boutonValider.style.display = 'none';
			// }
		}
	</script>
</html>