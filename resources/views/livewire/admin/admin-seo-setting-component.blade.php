<div>
    <div class="card m-4">
        <div class="card-header font-weight-bold text-primary">
          Seo Setting
        </div>
        <div class="card-body">
            <form class="my-0 my-md-4 mx-0 mx-md-5" wire:submit.prevent="submitSeoSetting">
                <input type="hidden" name="seo_setting_id" wire:model.defer="seo_setting_id">
        
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" wire:model.defer="seo_meta_title">
                            @error('seo_meta_title') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="meta_author">Meta Author</label>
                            <input type="text" class="form-control" id="meta_author" wire:model.defer="seo_meta_author">
                            @error('seo_meta_author') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" wire:model.defer="seo_meta_keywords">
                    @error('seo_meta_keywords') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" id="meta_description" rows="3" wire:model.defer="seo_meta_description"></textarea>
                    @error('seo_meta_description') <span class="error text-danger" style="font-size: 16px;">{{ $message }}</span> @enderror
                  </div>
        
                  <div wire:loading.remove wire:target="submitSeoSetting">
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                  </div>
                  <div wire:loading wire:target="submitSeoSetting">
                      <button class="btn btn-primary mt-4" type="button" disabled>
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          Updating
                      </button>
                  </div>
            </form>
        </div>
      </div> 
</div>
