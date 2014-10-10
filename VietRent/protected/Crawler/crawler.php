<?php
require_once 'goutte.phar';
use Goutte\Client;
$pattern = 'div[class="content"]';
$url = "http://www.vncnus.net/forum/viewtopic.php?f=163&t=109921&sid=2794fd54257f8f2b9ce7e407ee0b6023";
$content = getContent($url, $pattern);
extractUsefulData($content);
exit;
$handle = fopen("/Users/Frank/Desktop/listing.txt", "r");
if ($handle) {
	while (($line = fgets($handle)) !== false) {
		// process the line read.
		$line = trim ($line);
		$url = explode(" ",$line);
		$url = $url[0];
		$title = substr($line,strlen($url));
		echo $title . "\n";
	}
} else {
	// error opening the file.
}
fclose($handle);

$titles = array();
$pattern = 'a[class="topictitle"]';
//transverseLink('http://forum.vncnus.net/viewforum.php?f=163');
function transverseLink($url_to_traverse, $pattern){
	global $titles;
	$client = new Client();
	$crawler = $client->request('GET', $url_to_traverse);
	$status_code = $client->getResponse()->getStatus();
	if($status_code==200){
		//process the documents
		$count = $crawler->filter($pattern)->count();
		if ($count) {
			$crawler->filter($pattern)->each(function(Symfony\Component\DomCrawler\Crawler $node, $i) {
				global $titles;
				$titles[$i] = trim($node->text()). " ". trim($node->attr('href'));
			});
		}
		return $titles;
	}
}

function getContent($url_to_traverse, $pattern){
	global $content;
	$client = new Client();
	$crawler = $client->request('GET', $url_to_traverse);
	$status_code = $client->getResponse()->getStatus();
	if($status_code==200){
		//process the documents
		$count = $crawler->filter($pattern)->count();
		if ($count) {
			$crawler->filter($pattern)->first()->each(function(Symfony\Component\DomCrawler\Crawler $node, $i) {
				global $content;
				$content = trim($node->text()). " ". trim($node->attr('href'));
			});
			return $content;
		}

	}
}

function extractUsefulData($raw_data){
	$raw_data = strtolower($raw_data);
	$mobile_regex="";
	$email_regex="";
	$useful_address = getUsefulAddress($raw_data);
	$useful_mobile = getUsefulMobile($raw_data);
	print_r($useful_mobile);
	print_r($useful_address);

}

function getUsefulAddress($raw_data){
	$address_list=getAddress();
	$useful_address = array();
	foreach($address_list as $popular_place){
		$popular_place = strtolower($popular_place);
		if (strpos($raw_data,$popular_place) !== false) {
			array_push($useful_address,$popular_place);
		}
	}
	return $useful_address;
}

function getUsefulMobile($raw_data){
	$mobile_pattern="/\(?\+?(\d\d)?\)?[. -]?\d{4}[ .]?\d{4}[. ]?/";
	preg_match($mobile_pattern, $raw_data, $matches, PREG_OFFSET_CAPTURE);
	return $matches;
}
function getAddress(){
	return array(' Admiralty',
              ' Aljunied',
              ' Amber',
              ' Ang Mo Kio',
              ' Bartley',
              ' Bayfront',
              ' Bayshore',
              ' Beauty World',
              ' Bedok',
              ' Bedok North',
              ' Bedok Reservoir',
              ' Bedok South',
              ' Bencoolen',
              ' Bendemeer',
              ' Bishan',
              ' Boon Keng',
              ' Boon Lay',
              ' Botanic Gardens',
              ' Braddell',
              ' Bras Basah',
              ' Bright Hill',
              ' Buangkok',
              ' Bugis',
              ' Bukit Batok',
              ' Bukit Brown',
              ' Bukit Gombak',
              ' Bukit Panjang',
              ' Buona Vista',
              ' Caldecott',
              ' Canberra',
              ' Cashew',
              ' Changi Airport',
              ' Chinatown',
              ' Chinese Garden',
              ' Choa Chu Kang',
              ' City Hall',
              ' Clarke Quay',
              ' Clementi',
              ' Commonwealth',
              ' Dakota',
              ' Dhoby Ghaut',
              ' Dover',
              ' Downtown',
              ' Esplanade',
              ' Eunos',
              ' Expo',
              ' Farrer Park',
              ' Farrer Road',
              ' Fort Canning',
              ' Gardens by the Bay',
              ' Geylang Bahru',
              ' Great World',
              ' Gul Circle',
              ' HarbourFront',
              ' Havelock',
              ' Haw Par Villa',
              ' Hillview',
              ' Holland Village',
              ' Hougang',
              ' Hume Avenue',
              ' Jalan Besar',
              ' Joo Koon',
              ' Jurong East',
              ' Kaki Bukit',
              ' Kallang',
              ' Katong Park',
              ' Kembangan',
              ' Kent Ridge',
              ' Keppel',
              ' Khatib',
              ' King Albert Park',
              ' Kovan',
              ' Kranji',
              ' Labrador Park',
              ' Lakeside',
              ' Lavender',
              ' Lentor',
              ' Little India',
              ' Lorong Chuan',
              ' MacPherson',
              ' Marina Bay',
              ' Marina South',
              ' Marina South Pier',
              ' Marine Parade',
              ' Marine Terrace',
              ' Marsiling',
              ' Marymount',
              ' Mattar',
              ' Maxwell',
              ' Mayflower',
              ' Mount Pleasant',
              ' Mountbatten',
              ' Napier',
              ' Newton',
              ' Nicoll Highway',
              ' Novena',
              ' One-North',
              ' Orchard',
              ' Orchard Boulevard',
              ' Outram Park',
              ' Pasir Panjang',
              ' Pasir Ris',
              ' Paya Lebar',
              ' Pioneer',
              ' Potong Pasir',
              ' Promenade',
              ' Punggol',
              ' Queenstown',
              ' Raffles Place',
              ' Redhill',
              ' Rochor',
              ' Sembawang',
              ' Sengkang',
              ' Serangoon',
              ' Shenton Way',
              ' Siglap',
              ' Simei',
              ' Sixth Avenue',
              ' Somerset',
              ' Springleaf',
              ' Stadium',
              ' Stevens',
              ' Sungei Bedok',
              ' Sungei Kadut',
              ' Tai Seng',
              ' Tampines',
              ' Tampines East',
              ' Tampines West',
              ' Tan Kah Kee',
              ' Tanah Merah',
              ' Tanjong Pagar',
              ' Tanjong Rhu',
              ' Telok Ayer',
              ' Telok Blangah',
              ' Tiong Bahru',
              ' Toa Payoh',
              ' Tuas Crescent',
              ' Tuas Link',
              ' Tuas West Road',
              ' Ubi',
              ' Upper Changi',
              ' Upper Thomson',
              ' Woodlands',
              ' Woodlands North',
              ' Woodlands South',
              ' Woodleigh',
              ' Xilin',
              ' Yew Tee',
              ' Yio Chu Kang',
              ' Yishun',
	);
}