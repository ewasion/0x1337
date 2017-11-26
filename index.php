<?php

	$gPASSW = "";  // PASSWORD FOR THE POST REQUEST
	$DOMAIN = ""; //  SERVER FQDN ($DOMAIN/aaa.png)
	$tPASS = $_POST["pass"];

	function nameFile(){
		$newest = array_slice(scandir('.'), 2);
		$key = array_search('index.php', $newest);
		unset($newest[$key]);
		if (empty($newest)) {
			return "aaa";
		} else {
			return ++explode(".", array_reverse($newest)[0])[0];
		}
	}

	if ($gPASSW == $tPASS) {
		if($_FILES['img']['name']) {
			if(!$_FILES['img']['error']) {
				if($_FILES['img']['size'] < (4096000)) { // Also check php.ini for file_uploads and upload_max_filesize
					$filename .= nameFile();
					$filename .= ".".end(explode(".", $_FILES["img"]["name"]));
					move_uploaded_file($_FILES['img']['tmp_name'], $filename);
					echo $DOMAIN.$filename."\n";
				} else {
					echo "Error: File 2 large ;-;\n";
				}
			}
			else {
				echo "Error!\n";
			}
		}
	}

?>

<?php if($_SERVER['REQUEST_METHOD'] === 'GET') : ?>

	<!DOCTYPE html><html><head>
		<title>0x1337</title>
		<style type="text/css">
			html,body{
				background-color: #211D1B;
				color: #ccc;
			}
			a {
				text-decoration: none;
				color: #aaf;
			}
		</style>
	</head><body><pre><br><br>
	          .-.
	         (o.o)
	          |=|     < 0x1337 was made because we didn't want to annoy the <a href="https://github.com/lachs0r/0x0">0x0</a> owner :'(
	         __|__      It is made in PHP in less than 35 lines of code.
	       //.=|=.\\ 
	      // .=|=. \\   Example usage:
	      \\ .=|=. //       curl -F "img=@/tmp/foo.png" -F "pass=$password" https://img.capuno.cat
	       \\(_=_)//
	        (:| |:)     File retention: 172800 seconds (2 days) (From a separated cron job)
	         || ||      
	         () ()
	         || ||
	         || ||
	    ____=='_'==__________________________________________________________________________

	    If you want the password you have to solve the P ?= NP problem.

	    Current solvers:

	        bill gates (creator of microsoft power point), alice and me

	    Code is GPLv3 <a href="https://github.com/Capuno/0x1337">0x1337 GitHub repository</a></pre></body></html>

<?php endif; ?>
