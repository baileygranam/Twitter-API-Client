<div class="container">
    <div class="row justify-content-lg-center">
    	<?php foreach($this->userInformation as $user) { ?>
	    	<div class="col-md-3">
	    		<?php require("views/templates/profile_card.php"); ?>
	    	</div>
	    <?php } ?>
	</div>
</div>
