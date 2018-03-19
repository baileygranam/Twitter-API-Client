
<?php


foreach($this->userTimeline as $tweet)
{
	//print_r($tweet);

  echo "{$tweet->text} {$tweet->created_at}<br>";

  print ($tweet->entities->media[0]->media_url);
}

?>