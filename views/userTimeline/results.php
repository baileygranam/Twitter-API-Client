<?php //print_r($this->userTimeline); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
			<?php foreach($this->userTimeline as $tweet) { ?>
			<div class="card" style="width: 35rem;">
				<div class="card-header">
			    	<span id="name"><?php echo $tweet->user->name; ?></span>
			    	<span id="screen-name"> &#8211; @<?php echo $tweet->user->screen_name; ?> </span>
			    	<span><?php 
$date = new DateTime($tweet->created_at);

			    	echo $date->format('M j'); ?></span>
			  	</div>
				<img class="card-img-top" src="<?php echo $tweet->entities->media[0]->media_url; ?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Card title</h5>
					<p class="card-text"><?php echo $tweet->text; ?></p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
