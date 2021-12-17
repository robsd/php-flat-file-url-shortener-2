<?php
	if (!isset($_GET['alias']))
	{
		die("Welcome to the URL shortener!");
	}
	
	$alias = $_GET['alias'];
		
	if (!$urls = file("urls.txt"))
	{
		die("Couldn't read urls.txt!");
	}
	
	foreach ($urls as $url)
	{
		$parts = explode(" => ", $url);
		
		if ($alias == $parts[0])
		{
			header("Location: " . $parts[1]);
		}
	}
			
	echo "URL /$alias not found!";
?>