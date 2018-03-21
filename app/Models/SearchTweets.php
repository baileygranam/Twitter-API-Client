<?php

/* Declaring namespace. */
namespace App\Models;

/* Retrieve the configuration file for twitter credentials. */
require_once('config.inc.php');

/* Calling namespace. */
use j7mbo as j7mbo;

/**
 * SearchTweets model class that accesses data from the
 * Twitter API and passes the results back to the 
 * SearchTweetsController. 
 * 
 * @author Bailey Granam
 *
 */
class SearchTweets
{
    /**
    * Method to retrieve specific tweets based on a query from twitter. 
    * @param $query - query to be searched.
    * @return - Json data retrieved from Twitter.
    */
    public static function getTweets($query, $count)
    {
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token'        => OAUTH_ACCESS_TOKEN,
            'oauth_access_token_secret' => OAUTH_ACCESS_TOKEN_SECRET,
            'consumer_key'              => CONSUMER_KEY,
            'consumer_secret'           => CONSUMER_SECRET
        );

        /* Define the API URL. */
        $url = 'https://api.twitter.com/1.1/search/tweets.json';

        /* Define the language. */
        $language = 'en';

        /* Create the paramter fields. */
        $getfield = '?lang='.$language.'&count='.$count.'&tweet_mode=extended&q='.$query;

        /* Define the request method. */
        $requestMethod = 'GET';

        /* Create a new TwitterAPIExchange object. */
        $twitter = new \TwitterAPIExchange($settings);

        /* Retrieve the data from the Twitter API. */
        $result = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

        /* Json decode the data. */
        $result = json_decode($result);

        /* Check to see if there was an error in the query. */
        if(isset($result->errors))
            return false;
        /* Parse the data into a specific format and return to the controller. */
        else 
            return (TweetParser::parse($result->statuses));
    }

}
