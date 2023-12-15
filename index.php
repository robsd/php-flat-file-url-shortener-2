<?php
	if (!isset($_GET['alias']))
	{
		http_response_code(400);
		die("No URL requested!");
	}
	
	$alias = htmlspecialchars($_GET['alias']);
		
	if (!$urls = file("urls.txt"))
	{
		http_response_code(500);
		die("urls.txt is empty or doesn't exist!");
	}
	
	foreach ($urls as $url)
	{
		$parts = explode(" => ", $url);
		
		if ($alias == $parts[0])
		{
			header("Location: " . $parts[1]);
		}
	}
			
	http_response_code(404);
	die("/$alias not found!");
?>
