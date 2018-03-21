<?php

/* Declaring namespace. */
namespace App\Models;

/* Retrieve the configuration file for twitter credentials. */
require_once('config.inc.php');

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
    public static function getTimeline($username, $count)
    {
        /* API Keys/Settings to retrieved from the configuration file. */
        $settings = array(
            'oauth_access_token'        => OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key'              => CONSUMER_KEY,
            'consumer_secret'           => CONSUMER_SECRET
        );

        /* Define the API URL. */
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

        /* Define the GET 'screen_name' request field. */
        $getfield = '?count='.$count.'&tweet_mode=extended&screen_name='.$username;

        /* Define the request method. */
        $requestMethod = 'GET';

        /* Create a new TwitterAPIExchange object. */
        $twitter = new \TwitterAPIExchange($settings);

        /* Retrieve the data from the Twitter API. */
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

        /* Json decode the data. */
        $result = json_decode($result);

        /* Check to see if there was an error in the request. */
        if(isset($result->errors))
            return false;
        /* Parse the data into a specific format and return to the controller. */
        else
            return (TweetParser::parse($result));
    }
}
