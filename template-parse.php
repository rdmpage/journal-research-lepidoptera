<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/lib.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/utils.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/simplehtmldom_1_5/simple_html_dom.php');

$basedir = dirname(__FILE__) . '/html';

$files = scandir($basedir);

// debugging
$files=array('journals-45-volume45.html');

$pdfs = array();


foreach ($files as $filename)
{
	// echo "filename=$filename\n";
	
	if (preg_match('/\.html$/', $filename))
	{	
		$html = file_get_contents($basedir . '/' . $filename);
		
		
		$volume = 'x'
		
		$dom = str_get_html($html);

		
		// get article details
		$as = $dom->find('a');
		foreach ($as as $a)
		{
			echo $a->href . "\n";
			
			if (preg_match('/\.pdf/', $a->href))
			{
				$url = 'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/45/' . $a->href;
				
				echo $url . "\n";
			
			}
	
		}
		
	}

}

echo join("\n", $pdfs) . "\n";
		
?>

