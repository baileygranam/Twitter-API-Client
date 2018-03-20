<?php

/* Declaring namespace. */
namespace App\Models;

/* Calling namespace. */
use j7mbo as j7mbo;

/**
 * UserTimeline model class that accesses data from the
 * Twitter API and passes the results back to the 
 * UserTimelineController. 
 * 
 * @author Bailey Granam
 *
 */
class UserTimeline
{
    /**
    * Method to retrieve a specific user's timeline from twitter. 
    * @param $username - Username to be accessed.
    * @return - Json data retrieved from Twitter.
    */
    public static function find($username)
    {
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "744391147884273664-k4HVkfq4oCQtvm0zRzoBv4SOX9OkKzx",
            'oauth_access_token_secret' => "WWJ47e2gZaUOvjOHzqgqJbyGKfAJ2pletRLkdCYBYiYjz",
            'consumer_key' => "VEKAllSJ4Kohy28sMUsRZRXXs",
            'consumer_secret' => "BZpt2UwcOWFwkodFFuKXgBjqmDQBEuNMVv4e3JXBNdzlvy7POj"
        );

        /* Define the API URL. */
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

        /* Define the GET 'screen_name' request field. */
        $getfield = '?count=1&tweet_mode=extended&include_rts=false&screen_name='.$username;

        /* Define the request method. */
        $requestMethod = 'GET';

        /* Create a new TwitterAPIExchange object. */
        $twitter = new \TwitterAPIExchange($settings);

        /* Retrieve the data from the Twitter API. */
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

        /* Json decode the data and return it to the controller. */
        return json_decode($result);
    }
}
