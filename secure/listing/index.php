
<?php
include_once '../authorize.php';
include_once '../../includes/config.php';
include_once '../../includes/imagehandler.php';
include_once '../../includes/listing.php';

$listings = Listing::getListings();

//$temp = new Listing("Test Address", "Brampton", "Ontario", "Canada", "Desc", 450000, "4", 3, 134000);
//$temp->Published = true;
//$temp->Save();

?>
 
<?php  
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	require_once '../secureheader.php';
?>	

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<form>
				<div class="form-group">
					<select id="PublishedFilter" class="form-control">
						<option value="all">All</option>
						<option value="published">Published</option>
						<option value="unpublished">Unpublished</option>
					</select>
				</div>
			</form>
		</div>
		<div class="col-md-8">
		<form id="ListingSearchForm">
		    <div class="typeahead-container form-group">
		        <div class="typeahead-field">
		            <span class="typeahead-query">
		                <input id="ListingSearchInput" class="form-control" name="ListingSearchInput[query]" type="search" placeholder="Search" autocomplete="off">
		            </span>
	                <button type="submit" class="btn btn-primary">
	                    <i class="glyphicon glyphicon-search"></i>
	                </button>	
		        </div>
		    </div>
		</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<?php
					for ($i = 0; $i < sizeOf($listings); $i++) {
						$listing = $listings[$i];
				?>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail" data-address="<?php echo($listing->Address); ?>">
						<div id="StatusForms">
							<form class="form-inline pull-left">
								<div class="checkbox">
									<label for="Sold">
										Sold
										<input type="checkbox" id="Sold" <?php echo(($listing->Sold == 1) ? "checked=\"checked\"" : ""); ?>>
									</label>
									<input type="hidden" name="id" value="<?php echo($listing->Id); ?>" />
									<input type="hidden" name="status" value="sold">
								</div>
							</form>
							<form class="form-inline pull-left">
								<div class="checkbox">
									<label for="Published">
										Published
										<input type="checkbox" id="Published" <?php echo(($listing->Published == 1) ? "checked=\"checked\"" : ""); ?>>
									</label>
									<input type="hidden" name="id" value="<?php echo($listing->Id); ?>" />
									<input type="hidden" name="status" value="published">
								</div>
							</form>
						</div>
						<img class="lazy" data-original="<?php echo(SITE_ROOT . "uploads/" . $listing->Images[0]) ?>" alt="...">
						<div class="caption">
							<h3>$<?php echo(number_format($listing->Price, 0, '.', ',')); ?></h3>
							<p>
								<?php echo($listing->Address) ?>, <?php echo($listing->City) ?><br>
								<?php echo($listing->Bedrooms) ?> bed / <?php echo($listing->Bathrooms) ?> bath / <?php echo($listing->LivingSpace) ?> sq. ft
							</p>
							<p class="buttons"><a href="edit.php?Id=<?php echo($listing->Id) ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-warning" role="button" data-listing-remove="<?php echo($listing->Id) ?>"><span class="glyphicon glyphicon-trash"></span> Remove</a></p>
						</div>
					</div>
				</div>
				<?php
				} 
				?>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="PublishConfirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Publish Confirmation</h4>
      </div>
      <div class="modal-body">
     	<strong>The below information has not been provided for this listing. Are you sure you want to publish?</strong>
     	<ul>
     	</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Publish</button>
      </div>
    </div>
  </div>
</div>

<?php include_once '../footerscripts.php' ?>
<script src="<?php echo(SITE_ROOT . '/secure/content/js/jquery.lazyload.min.js') ?>"></script>
<script src="<?php echo(SITE_ROOT . '/secure/content/js/jquery.typeahead.min.js') ?>"></script>
<script>
	re.views.secure.listing.init();
</script>
<?php include_once '../footer.php' ?>
<?php  
}
?>