<?php
namespace App\Traits;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

trait WebscraperTrait {

	public function getHtml($url_get){
		$client = new Client();
 
		//  Hackery to allow HTTPS
		$guzzleclient = new \GuzzleHttp\Client([
		    'timeout' => 60,
		    'verify' => false,
		]);
		 
		//  Hackery to allow HTTPS
		$client->setClient($guzzleclient);
		$crawler = $client->request('GET', $url_get);

		return $crawler;
	}
	// public function getElement($element,$crawler){
	// 	$img = [];
	// 	$result = $crawler->filter($element)->each(function ($node) {
	// 		echo $node->attr('src');
	// 	});
	// }
}