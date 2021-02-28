<div class="container-fluid">
    <!-- Users DataTable -->
    <div class="card shadow mb-4">
      <div class="card-header py-2">
        <div class="row">
          <div class="col-12 col-md-7 mt-2 d-flex justify-content-md-start justify-content-center">
            <p class="m-0 font-weight-bold text-primary">Carousel Slider DataTable</p>
          </div>
          <div class="col-12 col-md-3 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-center">
            <input type="text" class="form-control" placeholder="Search..." wire:model="Search">
          </div>
          <div class="col-12 col-md-2 my-2 my-md-0 d-flex justify-content-md-end justify-content-center">
            <button class="btn btn-primary btn-icon-split" type="button" data-toggle="modal" data-target="#addCarouselSlider">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Add New Slider</span>
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Link</th>
                <th>Description</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($carousel_sliders as $carousel_slider)
                <tr>
                  <td>{{ $carousel_slider->id }}</td>
                  <td><img src="{{ asset('storage/'.$carousel_slider->image) }}" height="50" alt="{{ $carousel_slider->title }}"></td>
                  <td>{{ $carousel_slider->title }}</td>
                  <td>{{ $carousel_slider->link }}</td>
                  <td>{!! $carousel_slider->description !!}</td>
                  <td>
                      <a href="#" class="btn btn-danger btn-circle" wire:click.prevent="carouselSliderDeleteConfirmation({{ $carousel_slider->id }})" title="Delete">
                          <i class="fas fa-trash"></i>
                      </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
          <div class="w-100" style="margin-left: 0px;">
            {{ $carousel_sliders->links() }}
          </div>
      </div>
    </div>

    <!-- Modal for add -->
    <div wire:ignore.self class="modal fade" id="addCarouselSlider" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Carousel Slider</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form wire:submit.prevent="createCarouselSlider">

            <div class="modal-body">   
              <div class="form-group">
                  <label for="carousel_title">Carousel Title</label>
                  <input type="text" class="form-control" id="carousel_title" placeholder="Carousel Slider Title" wire:model.defer="carousel_title">
                  @error('carousel_title') <span class="error text-danger" style="font-size: 15px;">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <label for="carousel_image">Carousel Image</label>
                  <div class="col-12 my-2">
                    @if ($carousel_image)
                        <img src="{{ $carousel_image->temporaryUrl() }}" height="70">
                    @endif
                  </div>
                  <input type="file" class="form-control-file" id="carousel_image" wire:model.defer="carousel_image">
                  @error('carousel_image') <span class="error text-danger" style="font-size: 15px;">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <label for="carousel_link">Carousel Link</label>
                  <select class="custom-select" id="carousel_link" wire:model.defer="carousel_link">
                    <option selected>Choose the navigation page</option>
                    <option value="seller_ad">Seller Advertisements Page</option>
                    <option value="buyer_ad">Buyer Advertisements Page</option>
                    <option value="post_ad">Post Advertisement Page</option>
                    <option value="contact_us">Contact Us Page</option>
                    <option value="profile">User Profile Page</option>
                    <option value="profile.change_password">Change Password Page</option>
                    <option value="#">No need navigation button</option>
                  </select>
                  @error('carousel_link') <span class="error text-danger" style="font-size: 15px;">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <div wire:ignore>
                      <label for="carousel_description">Carousel Description</label>
                      <textarea class="form-control" id="carousel_description" wire:model.defer="carousel_description"></textarea>
                  </div>
                  @error('carousel_description') <span class="error text-danger" style="font-size: 15px;">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="modal-footer">
              <div wire:loading.remove wire:target="createCarouselSlider">
                <button class="btn btn-primary" type="submit">Create Carousel Slider</button>
              </div>
              <div wire:loading wire:target="createCarouselSlider">
                  <button class="btn btn-primary" type="button" disabled>
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      Creating Carousel Slider
                  </button>
              </div>
            </div>

        </form>
        </div>
      </div>
    </div>

  </div>


  <script>
    document.addEventListener('livewire:load', function () {
        $('#carousel_description').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('carousel_description', contents);
                }
            }
        });
    })
</script>