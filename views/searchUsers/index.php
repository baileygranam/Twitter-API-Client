<div class="container">
    <div class="row justify-content-md-center">
    	<div class="col-md-auto">
    		<div class="card" style="width:25em;">
			  <div class="card-body">
			    <h5 class="card-title">
			    	Search Users:
			    </h5>
			    <p>Enter a value to search such as 'POTUS' and the number of users to retrieve.</p>
			    <form method="GET" action="index.php">
			    	<div class="form-group">
				    	<input type="id" class="form-control" name="query" id="query" placeholder="Enter query">
				    	<br />
				    	<input type="id" class="form-control" name="count" id="count" placeholder="# of users">
				    </div>
			    	<input type="hidden" name="controller" value="searchUsers">
			    	<input type="hidden" name="action" value="results">
			    	<input type="submit" class="btn btn-primary" value="Retrieve">
			    </form>
			  </div>
			</div>
    	</div>
    </div>
</div>