<?php namespace Tests;

require '../vendor/autoload.php';

use Integration\Lastfm\Lastfm; 

use PHPunit\Framework\TestCase;

class UnitTest extends TestCase
{
    
    protected $httpClient;

    public function init()
    {
    	$this->httpClient = new Lastfm();
    }

    public function Test_geo_getTopArtists()
    {

         $data =  $this->httpClient->get('geo_getTopArtists',['country'=>'spain','page' => 2, 'limit' => 5]) ;

         $this->assertNotEmpty($data);
         
         $this->assertArrayHasKey('mbid', $data);

    }


}