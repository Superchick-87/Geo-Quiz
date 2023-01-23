<?php
function message($c){
	if ($c == 0) {
		echo '<div id="note" class="note">'.$c.'/10'.'</div>
			<p class="txtMaigre marge comment">Christophe Colomb !'.'<br/>'.'Vous partiez vers La Rochelle mais vous vous retrouvez à Bayonne.'.'<br/>'.'Oups !'.'</p>
			<img class="visu" src="images/DoneNo.png">';
	}else if ($c <= 3){
		echo '<div id="note" class="note">'.$c.'/10'.'</div>
			<p class="txtMaigre marge comment">Navigateur en herbe !'.'<br/>'.'Rien ne ressemble davantage à une avenue du Général de Gaulle qu\'une autre avenue du Général de Gaulle, non ?'.'</p>
			<img class="visu" src="images/DoneNo.png">';
	}else if ($c <= 6){
		echo '<div id="note" class="note">'.$c.'/10'.'</div>
			<p class="txtMaigre marge comment">Auto-stoppeur !'.'<br/>'.'Vous avez déjà bien bourlingué, mais il vous reste à découvrir quelques recoins de la région...'.'</p>
			<img class="visu" src="images/DoneNo.png">';
	}else if ($c <= 9){
		echo '<div id="note" class="note">'.$c.'/10'.'</div>
			<p class="txtMaigre marge comment">Apprenti cartographe !'.'<br/>'.'Vous frôlez le sans-faute, mais votre boussole vous a peut-être joué des tours sur la fin...'.'</p>
			<img class="visu" src="images/DoneNo2.png">';
	}else {
		echo '<div id="gagne">
				<div id="note" class="note">'.$c.'/10'.'</div>
				<p class="txtMaigre marge comment">Globe-trotter !'.'<br/>'.'Les rues et ruelles des villes du Sud-Ouest n\'ont aucun secret pour vous, bravo !'.'</p>
			</div>
				<img id="image" class="visu" src="images/DoneYes.png">';
			
	}
}

function validation($a,$b){
	if ($a == $b) {
	return 1;
	}
	else{
	return 0;
	}	
}

class Score{
	public $point;

	public function points($cible = null){
		if(is_null($cible)){
			return $this->point = 0;
		}else if ($cible == 11){
			return $this->point = 10;
		}else if ($cible == -1){
			return $this->point = 0;	
		}else{
			return $this->point += $cible;
		}
	}
}
?>