
<?php

foreach($this->userTimeline as $tweet)

{

  echo "	{$tweet->text} {$tweet->created_at}\n";

}

?>