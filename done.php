<?php
	$step=$_GET['step'];
	include (dirname(__FILE__).'/Includes/data'.$step.'.php');
	include (dirname(__FILE__).'/Includes/ddc.php');
	include (dirname(__FILE__).'/Includes/niveaux.php');
	include (dirname(__FILE__).'/Includes/countFiles.php');
	require (dirname(__FILE__).'/Includes/Score.php');

	$Sel0 = $_GET['Sel0'];
	$Sel1 = $_GET['Sel1'];
	$Sel2 = $_GET['Sel2'];
	$Sel3 = $_GET['Sel3'];
	$Sel4 = $_GET['Sel4'];
	$Sel5 = $_GET['Sel5'];
	$Sel6 = $_GET['Sel6'];
	$Sel7 = $_GET['Sel7'];
	$Sel8 = $_GET['Sel8'];
	$Sel9 = $_GET['Sel9'];

	$Score0 = validation($Sel0,$villes[0]);
	$Score1 = validation($Sel1,$villes[1]);
	$Score2 = validation($Sel2,$villes[2]);
	$Score3 = validation($Sel3,$villes[3]);
	$Score4 = validation($Sel4,$villes[4]);
	$Score5 = validation($Sel5,$villes[5]);
	$Score6 = validation($Sel6,$villes[6]);
	$Score7 = validation($Sel7,$villes[7]);
	$Score8 = validation($Sel8,$villes[8]);
	$Score9 = validation($Sel9,$villes[9]);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Géo-Quiz</title>
	</head>
	<body>
		<h1 class="txtMaigre">Géo-Quiz</h1>
		<hr class="centre" />
		<h3 id="h3" class="txtMaigre marge">Niveau <?php echo $step." : ".$themes[0];?></h3>
		<h2 id="h2" class="txtMaigre marge">Score</h2>
		<?php
			$tata = new Score();
			$tata->points($Score0);
			$tata->points($Score1);
			$tata->points($Score2);
			$tata->points($Score3);
			$tata->points($Score4);
			$tata->points($Score5);
			$tata->points($Score6);
			$tata->points($Score7);
			$tata->points($Score8);
			message($tata->points($Score9));			
		?>
		
		<div id="blocEtoiles" class="flex" style="">
			<?php
			for ($i=1; $i < count($niveaux) ; $i++) { 
					echo '<img id="etoile'.$i.'" class="etoiles" src="images/etoileFond.png">';
				}
			echo "<br><p class='consigne'>Passer au niveau suivant</p>";
			?>
		</div>

		<input id="nbreFichiers" style="display: none;" type="text" value="<?php echo countFiles (); ?>" />
		<input class="boutonOn" id="buttonAgain" style="display: none;" type="button" value="NOUVEL ESSAI" onclick="history.go(-1)"/>
		<input class="boutonOn" id="buttonNext" style="display: none;" type="button" value="NIVEAU <?php echo $step+1; ?>" onclick="window.location.href = 'indexGo.php?step=<?php echo $step+1; ?>';"/>
		<input class="boutonOn" id="buttonAccueil" style="display: none;" type="button" value="NOUVELLE PARTIE" onclick="window.location.href = 'index.php'"/>	
		
		<section id="solutions" style="display: block;">
		<button class="accordion txtMaigre marge">Solutions</button>
		<!-- <h2 id="h2" class="txtMaigre marge">Solutions</h2> -->
		<div class="panel flex-container">
		<?php 
			for ($a=0; $a < count($villes); $a++) { 
				$i=1;
	        	$z=$a+$i;
				echo '
					<span class="pastilleSolution">'.$z.'</span>
					<span class="margeDroite">'.$villes[$a].'</span>
					';
			}
		 ?>
		 </div>
		 </section>
<footer></footer>
	</body>
	<script src="js/accordeon.js"></script>
	<script type="text/javascript">
		var note = document.getElementById('note').innerHTML;
		var buttonAgain = document.getElementById('buttonAgain');
		var buttonNext = document.getElementById('buttonNext');
		var buttonAccueil = document.getElementById('buttonAccueil');
		
		console.log (buttonNext.onclick);

		var nbreEtoile = <?php echo $step; ?>;
		var blocEtoiles = document.getElementById('blocEtoiles');
		console.log(nbreEtoile);

		var nbreFichiers = document.getElementById('nbreFichiers').value;
		console.log(nbreFichiers);

		var h2 = document.getElementById("h2");
		var h3 = document.getElementById("h3");
		var solutions = document.getElementById("solutions");

		if (note == '10/10') {
			buttonAgain.style.display = 'none';
			buttonNext.style.display = 'block';
			solutions.style.display = 'none';
			for (i = 1; i < nbreEtoile+1; i++) {
			document.getElementById('etoile'+i).src = "images/etoileFondOn.png";
			}
			blocEtoiles.style.display = 'block';
		}
		else{
			buttonAgain.style.display = 'block';
			buttonNext.style.display = 'none';
			blocEtoiles.style.display = 'none';
		}
		if (nbreEtoile == nbreFichiers) {
			document.getElementById('gagne').style.display = 'none';
			buttonAccueil.style.display = 'block';
			buttonNext.style.display = 'none';
			blocEtoiles.style.display = 'none';
			h2.style.display = 'none';
			h3.innerHTML='La partie est terminée'+'<br>'+' Vous avez passez tous les niveaux avec succès !';
		}
		
		
		// console.log(document.getElementById('etoile2').src);
	</script>
</html>