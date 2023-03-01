<!-- Modal -->
<div class="modal fade search-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<form action="<?php echo home_url(); ?>" id="search-form" method="get">
			<input class="search-input" type="text" name="s" id="s" value="Cauta..." onblur="if(this.value=='')this.value='Cauta...'"
			onfocus="if(this.value=='Cauta...')this.value=''" />
			<input type="hidden" value="submit" />
		</form>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <div class="modal-body">
      </div> -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>