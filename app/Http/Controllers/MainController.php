<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;

/**
 * MainController
 *
 * Main Controller containing API calls and returning responses
 */
class MainController extends Controller
{
    /**
     * endpoint
     *
     * @var string
     */
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

    /**
     * getChapters
     *
     * @param  GuzzleHttp\Client $client
     *
     * @return GuzzleHttp\Psr7\Stream
     */
    public function getChapters(Client $client): Stream
    {
        return $client->request('get', sprintf('%s%s', $this->endpoint, 'chapters'))->getBody();
    }

    /**
     * getChapter
     *
     * @param  GuzzleHttp\Client $client
     * @param  int $id
     *
     * @return GuzzleHttp\Psr7\Stream
     */
    public function getChapter(Client $client, int $id): Stream
    {
        return $client->request('get', sprintf('%s%s/%s/%s/%s', $this->endpoint, 'chapter', $id, 'verses'))->getBody();
    }
}
