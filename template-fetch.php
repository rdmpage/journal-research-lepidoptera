<?php

function get($url, $format = '')
{
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	
	if ($format != '')
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: " . $format));	
	}
	
	$response = curl_exec($ch);
	if($response == FALSE) 
	{
		$errorText = curl_error($ch);
		curl_close($ch);
		die($errorText);
	}
	
	$info = curl_getinfo($ch);
	$http_code = $info['http_code'];
	
	curl_close($ch);
	
	return $response;
}

$urls = array(
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/01/volume1A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/01/volume1B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/01/volume1C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/01/volume1D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/02/volume2A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/02/volume2B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/02/volume2C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/02/volume2D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/03/volume3A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/03/volume3B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/03/volume3C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/03/volume3D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/04/volume4A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/04/volume4B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/04/volume4C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/04/volume4D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/05/volume5A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/05/volume5B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/05/volume5C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/05/volume5D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/06/volume6A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/06/volume6B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/06/volume6C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/06/volume6D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/07/volume7A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/07/volume7B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/07/volume7C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/07/volume7D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/08/volume8A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/08/volume8B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/08/volume8C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/08/volume8D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/09/volume9A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/09/volume9B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/09/volume9C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/09/volume9D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/10/volume10A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/10/volume10B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/10/volume10C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/10/volume10D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/11/volume11A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/11/volume11B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/11/volume11C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/11/volume11D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/12/volume12A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/12/volume12B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/12/volume12C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/12/volume12D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/13/volume13A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/13/volume13B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/13/volume13C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/13/volume13D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/14/volume14A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/14/volume14B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/14/volume14C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/14/volume14D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/15/volume15A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/15/volume15B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/15/volume15C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/15/volume15D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/16/volume16A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/16/volume16B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/16/volume16C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/16/volume16D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/17/volume17A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/17/volume17B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/17/volume17C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/17/volume17D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/17/volume17Supplement.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/18/volume18A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/18/volume18B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/18/volume18C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/18/volume18D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/19/volume19A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/19/volume19B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/19/volume19C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/19/volume19D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/20/volume20A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/20/volume20B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/20/volume20C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/20/volume20D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/21/volume21A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/21/volume21B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/21/volume21C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/21/volume21D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/22/volume22A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/22/volume22B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/22/volume22C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/22/volume22D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/23/volume23A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/23/volume23B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/23/volume23C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/23/volume23D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/23/volume23E.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/24/volume24A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/24/volume24B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/24/volume24C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/24/volume24D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/25/volume25A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/25/volume25B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/25/volume25C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/25/volume25D.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/26/volume26.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/27/volume27A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/27/volume27B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/27/volume27C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/28/volume28A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/28/volume28B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/28/volume28C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/29/volume29A.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/29/volume29B.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/29/volume29C.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/30/volume30AB.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/30/volume30BC.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/31/volume31AB.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/31/volume31BC.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/32/volume32.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/33/volume33.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/41/volume41.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/42/volume42.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/43/volume43.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/44/volume44.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/45/volume45.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/46/volume46.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/47/volume47.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/48/volume48.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/journals/Index/volume_index.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume34.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume35.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume36.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume37.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume38.html',
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume39.html'
);

$urls=array(
'https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/volume38.html'
);

$basedir = 'html';

foreach ($urls as $url)
{
	$html = get($url);
	
	$filename = str_replace('https://web.archive.org/web/20170504065919/http://lepidopteraresearchfoundation.org:80/', '', $url);
	$filename = str_replace('/', '-', $filename);
	
	
	file_put_contents(dirname(__FILE__) . '/' . $basedir . '/' . $filename, $html);

}

?>