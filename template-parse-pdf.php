<?php

// Parse

error_reporting(E_ALL);

require_once (dirname(__FILE__) . '/vendor/autoload.php');

//require_once('utils.php');

use Sunra\PhpSimple\HtmlDomParser;


$basedir = dirname(__FILE__) . '/html';

$files = scandir($basedir);

// debugging
//$files=array('journals-45-volume45.html');

$pdfs = array();


foreach ($files as $filename)
{
	// echo "filename=$filename\n";
	
	if (preg_match('/\.html$/', $filename))
	{	
		$html = file_get_contents($basedir . '/' . $filename);
		
		
		$dom = HtmlDomParser::str_get_html($html);

		
		// get article details
		$as = $dom->find('a');
		foreach ($as as $a)
		{
			echo $a->href . "\n";
			
			if (preg_match('/\.pdf/', $a->href))
			{
				//$url = 'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/45/' . $a->href;
				
				//echo $url . "\n";
			
			}
	
		}
		
	}

}

echo join("\n", $pdfs) . "\n";
		
?>

