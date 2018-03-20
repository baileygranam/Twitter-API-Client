<?php //print_r($this->userTimeline); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
			<?php foreach($this->userTimeline as $tweet) { ?>
			<div class="card" style="width: 40rem;">
				<div class="card-header">
					<a href="<?php echo $tweet->user->url; ?>">
						<span id="profile-image"><img src="<?php echo $tweet->user->profile_image_url; ?>"></span>
			    		<span id="name"><?php echo $tweet->user->name; ?></span>
			    		<span id="screen-name"> &#8211; @<?php echo $tweet->user->screen_name; ?> </span>
			    	</a>
			    	<span id="date"><?php echo (new DateTime($tweet->created_at))->format('M j'); ?></span>
			  	</div>
			  	<?php if(isset($tweet->entities->media)){ ?>
				<img class="card-img-top" src="<?php echo $tweet->entities->media[0]->media_url; ?>" alt="Card image cap">
				<?php }?>
				<div class="card-body">
					<p class="card-text"><?php echo $tweet->full_text; ?></p>
					<span id="tweet-stats">
						<img src="https://image.flaticon.com/icons/svg/126/126471.svg" width="18">
						<?php echo $tweet->favorite_count; ?>
						<img src="https://image.flaticon.com/icons/svg/127/127998.svg" width="18">
						<?php echo $tweet->retweet_count; ?>
						<img src="https://image.flaticon.com/icons/svg/126/126481.svg" width="18">
					</span>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
