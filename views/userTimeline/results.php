<div class="container">
    <div class="row justify-content-md-center">
    	<div class="col-md-3">
    		<?php $user = $this->userInformation; require("views/templates/profile_card.php"); ?>
    	</div>
        <div class="col-md-9">
			<?php require("views/templates/tweet.php"); ?>
		</div>
	</div>
</div>
