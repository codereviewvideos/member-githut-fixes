<?php

namespace AppBundle\Service;

class BuzzHttpClient implements HttpClientInterface
{
	private $client;

	public function __construct()
	{
		$this->client = new \Buzz\Client\Curl();
		$this->client->setOption(CURLOPT_USERAGENT, 'https://udger.com/resources/online-parser?Fuas=Mozilla/5.0%20(Macintosh;%20U;%20PPC%20Mac%20OS%20X;%20fi-fi)%20AppleWebKit/420+%20(KHTML,%20like%20Gecko)%20Safari/419.3');
	}

	public function get($url)
	{
		$request = new request('GET', $url);
		$response = new response();

		$this->client->send($request, $response);
		
		return json_decode($response->getContent(), true);
	}

	public function post($url, $data)
	{

	}

}