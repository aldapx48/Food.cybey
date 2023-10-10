<?php
	$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

	if ($url == '/') {

		// This is the home page
		// Initiate the home Main
		// and render the home view

		// Expanding Files
		require_once __DIR__.'/mains/index_main.php';
		require_once __DIR__.'/includes/essentials_include.php';

		// Creating Header and Footer
		$essentials = new EssentialsInclude("header.php", "footer.php");

		// var_dump($essentials->getHeader());
		$indexMain = New IndexMain($essentials);

		print $indexMain->index();

	}
	else {

		// This is not home page
		// Initiate the appropriate Main
		// and render the required view

		//The first element should be a Main
		$requestedMain = $url[0]; 

		// If a second part is added in the URI, 
		// it should be a method
		$requestedAction = isset($url[1])? $url[1] :'';

		// The remain parts are considered as 
		// arguments of the method
		$requestedParams = array_slice($url, 2); 

		// Check if Main exists. NB: 
		// You have to do that for the model and the view too
		$ctrlPath = __DIR__.'/mains/'.$requestedMain.'_main.php';

		if (file_exists($ctrlPath)) {
			// Expanding Files
			require_once __DIR__.'/mains/'.$requestedMain.'_main.php';
			require_once __DIR__.'/includes/essentials_include.php';

			// Creating Header and Footer
			$essentials = new EssentialsInclude("header.php", "footer.php");

			// var_dump($essentials->getHeader());

			// Generating Class Names
			$mainName = ucfirst($requestedMain).'Main';
			$mainObj = new $mainName($essentials);

			// If there is a method - Second parameter
			if ($requestedAction != '') {
				// then we call the method via the view
				// dynamic call of the view
				print $viewObj->$requestedAction($requestedParams);
			}

		}
		else {
			header('HTTP/1.1 404 Not Found');

			require("error.html");

			die();
			//require the 404 Main and initiate it
			//Display its view
		}
	}
?>