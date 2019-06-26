<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class MainController extends Controller
{
    public $endpoint = 'http://staging.quran.com:3000/api/v3/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getChapters(Client $client)
    {
        $response = $client->request('GET', sprintf('%s%s', $this->endpoint, 'chapters'))->getBody();
        return $response;
    }

    public function getChapter(Client $client, $id)
    {
        $response = $client->request('GET', sprintf('%s%s/%s/%s/%s', $this->endpoint, 'chapter', $id, 'verses'))->getBody();
        return $response;
    }
}
