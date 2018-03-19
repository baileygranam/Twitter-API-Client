<?php //print_r($this->userTimeline); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
			<?php foreach($this->userTimeline as $tweet) { ?>
			<div class="card" style="width: 35rem;">
				<div class="card-header">
					<span id="profile-image"><img src="<?php echo $tweet->user->profile_image_url; ?>"></span>
			    	<span id="name"><?php echo $tweet->user->name; ?></span>
			    	<a id="screen-name" href="<?php echo $tweet->user->url; ?>"> &#8211; @<?php echo $tweet->user->screen_name; ?> </a>
			    	<span id="date"><?php echo (new DateTime($tweet->created_at))->format('M j'); ?></span>
			  	</div>
			  	<?php if(isset($tweet->entities->media)){ ?>
				<img class="card-img-top" src="<?php echo $tweet->entities->media[0]->media_url; ?>" alt="Card image cap">
				<?php }?>
				<div class="card-body">
					<p class="card-text"><?php echo $tweet->text; ?></p>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
