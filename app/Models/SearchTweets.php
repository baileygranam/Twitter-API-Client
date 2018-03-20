<?php

/* Declaring namespace. */
namespace App\Models;

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
            'oauth_access_token' => "744391147884273664-k4HVkfq4oCQtvm0zRzoBv4SOX9OkKzx",
            'oauth_access_token_secret' => "WWJ47e2gZaUOvjOHzqgqJbyGKfAJ2pletRLkdCYBYiYjz",
            'consumer_key' => "VEKAllSJ4Kohy28sMUsRZRXXs",
            'consumer_secret' => "BZpt2UwcOWFwkodFFuKXgBjqmDQBEuNMVv4e3JXBNdzlvy7POj"
        );

        /* Define the API URL. */
        $url = 'https://api.twitter.com/1.1/search/tweets.json';

        /* Define the GET 'screen_name' request field. */
        $getfield = '?lang=en&count='.$count.'&tweet_mode=extended&q='.$query;

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
        {
            return false;
        }
        else
        {
            /* Parse the data into a specific format and return to the controller. */
            return (TweetParser::parse($result->statuses));
        }
    }

}
