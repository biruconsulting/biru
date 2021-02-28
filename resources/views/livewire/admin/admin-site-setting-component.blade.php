<div>
    <div class="card m-4">
        <div class="card-header font-weight-bold text-primary">
          Site Setting
        </div>
        <div class="card-body">
            <form class="my-0 my-md-4 mx-0 mx-md-5" wire:submit.prevent="submitSiteSetting">
                <input type="hidden" name="site_setting_id" wire:model.defer="site_setting_id">
                
                <div class="form-group">
                    <label for="site_about_us">About Us</label>
                    <textarea class="form-control" id="site_about_us" rows="3" wire:model.defer="site_about_us"></textarea>
                    @error('site_about_us') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                       <label for="site_contact_number">Site Contact Number</label>
                      <input type="text" class="form-control" id="site_contact_number"  wire:model.defer="site_contact_number">
                      @error('site_contact_number') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                       <label for="site_email">Site Email</label>
                      <input type="text" class="form-control" id="site_email"  wire:model.defer="site_email">
                      @error('site_email') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="site_location">Site Location</label>
                    <input type="text" class="form-control" id="site_location"  wire:model.defer="site_location">
                    @error('site_location') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                </div>
                
                <div wire:loading.remove wire:target="submitSiteSetting">
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                  </div>
                  <div wire:loading wire:target="submitSiteSetting">
                      <button class="btn btn-primary" type="button" disabled>
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          Updating
                      </button>
                  </div>
              </form>
        </div>
      </div>  
</div>
