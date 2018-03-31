<?php namespace Integration\Lastfm;

use GuzzleHttp\Client;


class Lastfm {

	protected $lastfm_apiKey;

	protected $base_url;

	protected $query;

	protected $data;

	protected $httpClient;

	public function __construct() 
	{

		$this->lastfm_apiKey = env('LASTFM_API_KEY');  // LASTFM_API_KEY parametter in .env file.
		
		$this->base_url = env('LASTFM_BASEURL');      // LASTFM_BASEURL parametter in .env file.

		$this->httpClient = new Client();

	}

	public function get($method_name,$query)
    {
       

        if (method_exists($this, $method_name))
	    {
	         $this->$method_name();

	         $this->query = array_merge(array_merge($this->query,$query), ["api_key" => $this->lastfm_apiKey , "format" => "json"]);

	     } else {
	       
	         return "Method is not exit.";

	     }
        
       $this->responseString = $this->httpClient->get($this->base_url, [
											            'http_errors' => false,
											            'query' => $this->query,
											        ]);

        $this->data = json_decode((string) $this->responseString->getBody(), true);

        if (200 !== $this->responseString->getStatusCode() || null === $this->data) {
        	
            return "Something went wrong";

        }
        
        return $this->data;
    }

	
	public function album_addTags()
	{
		$this->query = ["method" => "album.addTags"];
	}

	public function album_getInfo()
	{
		$this->query = ["method" => "album.getInfo"];
	}

	public function album_getTags()
	{
		$this->query = ["method" => "album.getTags"];
	}

	public function album_getTopTags()
	{
		$this->query = ["method" => "album.getTopTags"];
	}

	public function album_removeTag()
	{
		$this->query = ["method" => "album.removeTag"];
	}

	public function album_search()
	{
		$this->query = ["method" => "album.search"];
	}

	public function artist_addTags()
	{
		$this->query = ["method" => "artist.addTags"];
	}

	public function artist_getCorrection()
	{
		$this->query = ["method" => "artist.getCorrection"];
	}

	public function artist_getInfo()
	{
		$this->query = ["method" => "artist.getInfo"];
	}

	public function artist_getSimilar()
	{
		$this->query = ["method" => "artist.getSimilar"];
	}

	public function artist_getTags()
	{
		$this->query = ["method" => "artist.getTags"];
	}

	public function artist_getTopAlbums()
	{
		$this->query = ["method" => "artist.getTopAlbums"];
	}

	public function artist_getTopTags()
	{
		$this->query = ["method" => "artist.getTopTags"];
	}

	public function artist_getTopTracks()
	{
		$this->query = ["method" => "artist.getTopTracks"];
	}

	public function artist_removeTag()
	{
		$this->query = ["method" => "artist.removeTag"];
	}

	public function artist_search()
	{
		$this->query = ["method" => "artist.search"];
	}

	public function auth_getMobileSession()
	{
		$this->query = ["method" => "auth.getMobileSession"];
	}

	public function auth_getSession()
	{
		$this->query = ["method" => "auth.getSession"];
	}

	public function auth_getToken()
	{
		$this->query = ["method" => "auth.getToken"];
	}

	public function chart_getTopArtists()
	{
		$this->query = ["method" => "chart.getTopArtists"];
	}

	public function chart_getTopTags()
	{
		$this->query = ["method" => "chart.getTopTags"];
	}

	public function chart_getTopTracks()
	{
		$this->query = ["method" => "chart.getTopTracks"];
	}

	public function geo_getTopArtists()
	{
		$this->query = ["method" => "geo.getTopArtists"];
		
	}

	public function geo_getTopTracks()
	{
		$this->query = ["method" => "geo.getTopTracks"];
	}

	public function library_getArtists()
	{
		$this->query = ["method" => "library.getArtists"];
	}

	public function tag_getInfo()
	{
		$this->query = ["method" => "tag.getInfo"];
	}

	public function tag_getSimilar()
	{
		$this->query = ["method" => "tag.getSimilar"];
	}

	public function tag_getTopAlbums()
	{
		$this->query = ["method" => "tag.getTopAlbums"];
	}

	public function tag_getTopArtists()
	{
		$this->query = ["method" => "tag.getTopArtists"];
	}

	public function tag_getTopTags()
	{
		$this->query = ["method" => "tag.getTopTags"];
	}

	public function tag_getTopTracks()
	{
		$this->query = ["method" => "tag.getTopTracks"];
	}

	public function tag_getWeeklyChartList()
	{
		$this->query = ["method" => "tag.getWeeklyChartList"];
	}

	public function track_addTags()
	{
		$this->query = ["method" => "track.addTags"];
	}

	public function track_getCorrection()
	{
		$this->query = ["method" => "track.getCorrection"];
	}

	public function track_getInfo()
	{
		$this->query = ["method" => "track.getInfo"];
	}

	public function track_getSimilar()
	{
		$this->query = ["method" => "track.getSimilar"];
	}

	public function track_getTags()
	{
		$this->query = ["method" => "track.getTags"];
	}

	public function track_getTopTags()
	{
		$this->query = ["method" => "track.getTopTags"];
	}

	public function track_love()
	{
		$this->query = ["method" => "track.love"];
	}

	public function track_removeTag()
	{
		$this->query = ["method" => "track.removeTag"];
	}

	public function track_scrobble()
	{
		$this->query = ["method" => "track.scrobble"];
	}

	public function track_search()
	{
		$this->query = ["method" => "track.search"];
	}

	public function track_unlove()
	{
		$this->query = ["method" => "track.unlove"];
	}

	public function track_updateNowPlaying()
	{
		$this->query = ["method" => "track.updateNowPlaying"];
	}

	public function user_getArtistTracks()
	{
		$this->query = ["method" => "user.getArtistTracks"];
	}

	public function user_getFriends()
	{
		$this->query = ["method" => "user.getFriends"];
	}

	public function user_getInfo()
	{
		$this->query = ["method" => "user.getInfo"];
	}

	public function user_getLovedTracks()
	{
		$this->query = ["method" => "user.getLovedTracks"];
	}

	public function user_getPersonalTags()
	{
		$this->query = ["method" => "user.getPersonalTags"];
	}

	public function user_getRecentTracks()
	{
		$this->query = ["method" => "user.getRecentTracks"];
	}

	public function user_getTopAlbums()
	{
		$this->query = ["method" => "user.getTopAlbums"];
	}

	public function user_getTopArtists()
	{
		$this->query = ["method" => "user.getTopArtists"];
	}

	public function user_getTopTags()
	{
		$this->query = ["method" => "user.getTopTags"];
	}

	public function user_getTopTracks()
	{
		$this->query = ["method" => "user.getTopTracks"];
	}

	public function user_getWeeklyAlbumChart()
	{
		$this->query = ["method" => "user.getWeeklyAlbumChart"];
	}

	public function user_getWeeklyArtistChart()
	{
		$this->query = ["method" => "user.getWeeklyArtistChart"];
	}

	public function user_getWeeklyChartList()
	{
		$this->query = ["method" => "user.getWeeklyChartList"];
	}

	public function user_getWeeklyTrackChart()
	{
		 $this->query = ["method" => "user.getWeeklyTrackChart"];
	}

}