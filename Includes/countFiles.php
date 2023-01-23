<?php
			function countFiles()
				{
				    $nbFichiers = -7;
				    $repertoire = opendir("Includes/");
				                 
				    while ($fichier = readdir($repertoire))
				    {
				        $nbFichiers += 1;
				    }            
				    return (int) $nbFichiers;
			}
		?>