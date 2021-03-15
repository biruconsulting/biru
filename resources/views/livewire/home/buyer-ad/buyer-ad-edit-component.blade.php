<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">UPDATE BUYER ADVERTISEMENT</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($buyer_general_ad_title ?? $buyer_property_ad_title ?? $buyer_job_ad_title) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="container">

        <div class="main-bar-header text-center mt-3">
            <b>UPDATE {{ strtoupper($buyer_general_ad_title ?? $buyer_property_ad_title ?? $buyer_job_ad_title) }} ADVERTISEMENT</b>
        </div>
        
        <div class="bg-white my-3 py-4 py-md-5 px-3 px-md-5">
            <form class="row g-3" wire:submit.prevent="updateBuyerAd({{ $buyer_ad_id }})">

                <input type="hidden" wire:model.defer="buyer_ad_id">

                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="Your name" wire:model.defer="buyer_user_first_name" required>
                    @error('buyer_user_first_name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Your last name" wire:model.defer="buyer_user_last_name" required>
                    @error('buyer_user_last_name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label for="email_address" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email_address" placeholder="Your email" wire:model.defer="buyer_user_email" required>
                    @error('buyer_user_email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" wire:model.defer="buyer_user_phone_number" required>
                    @error('buyer_user_phone_number') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-12">
                    <label for="city" class="form-label">Town / City</label>
                    <select class="form-select" aria-label="City select" id="city" wire:model.defer="buyer_user_district" required>
                        <option selected>Select your district</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Moneragala">Moneragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                    @error('buyer_user_district') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                @if ($buyer_ad_type == 'buyer-general')

                    <div class="row g-2 g-md-3">
                        <div class="col-md-6">
                            <label for="buyer_general_name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="buyer_general_name" placeholder="Expected product name" wire:model.defer="buyer_general_ad_title">
                            @error('buyer_general_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category Name</label>
                            <select class="form-select" wire:model.defer="buyer_general_ad_category">
                                <option value="">Select general category</option>
                                @foreach ($general_categories as $general_category)
                                    <option value="{{ $general_category->id }}">{{ $general_category->name }}</option>
                                @endforeach
                            </select>
                            @error('buyer_general_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_general_brand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="buyer_general_brand" placeholder="Expected Brand name" wire:model.defer="buyer_general_ad_brand">
                            @error('buyer_general_ad_brand') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_general_model" class="form-label">Model <small class="text-muted">(Not Mandatory*)</small></label>
                            <input type="text" class="form-control" id="buyer_general_model" placeholder="Expected Model name" wire:model.defer="buyer_general_ad_model">
                            @error('buyer_general_ad_model') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_general_min_price" class="form-label">Expected Minimum Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs</span>
                                <input type="text" class="form-control" id="buyer_general_min_price" placeholder="Minimum price" wire:model.defer="buyer_general_ad_ex_min_price">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('buyer_general_ad_ex_min_price') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_general_max_price" class="form-label">Expected Maximum Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs</span>
                                <input type="text" class="form-control" id="buyer_general_max_price" placeholder="Maximum price" wire:model.defer="buyer_general_ad_ex_max_price">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('buyer_general_ad_ex_max_price') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="buyer_general_short_description" class="form-label">Thumbnail Short Description</label>
                            <textarea class="form-control" rows="3" id="buyer_general_short_description" placeholder="Thumbnail Short Description" wire:model.defer="buyer_general_ad_short_description"></textarea>
                            @error('buyer_general_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <div wire:ignore>
                                <label class="form-label">Description</label>
                                <textarea type="text" class="form-control" id="buyer-general-summernote"  wire:model.defer="buyer_general_ad_description">{{ $buyer_general_ad_description }}</textarea>
                            </div>
                            @error('buyer_general_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                @elseif ($buyer_ad_type == 'buyer-property')

                    <div class="row g-2 g-md-3">
                        <div class="col-md-6">
                            <label for="buyer_property_name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="buyer_property_name" placeholder="Expected Property name" wire:model.defer="buyer_property_ad_title">
                            @error('buyer_property_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category Name</label>
                            <select class="form-select" wire:model.defer="buyer_property_ad_category">
                                <option value="">Select property category</option>
                                @foreach ($property_categories as $property_category)
                                    <option value="{{ $property_category->id }}">{{ $property_category->name }}</option>
                                @endforeach
                            </select>
                            @error('buyer_property_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="buyer_property_address" class="form-label">Expected District</label>
                            <select class="form-select" id="buyer_property_address" wire:model.defer="buyer_property_ad_ex_district">
                                <option value="">Select expected district</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Moneragala">Moneragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>
                            @error('buyer_property_ad_ex_district') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_property_min_price" class="form-label">Expected Minimum Amount <small class="text-muted">(If rent / lease: Amount Per Month*)</small></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs</span>
                                <input type="text" class="form-control" id="buyer_property_min_price" placeholder="Minimum price" wire:model.defer="buyer_property_ad_ex_min_price">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('buyer_property_ad_ex_min_price') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_property_max_price" class="form-label">Expected Maximum Amount <small class="text-muted">(If rent / lease: Amount Per Month*)</small></label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs</span>
                                <input type="text" class="form-control" id="buyer_property_max_price" placeholder="Maximum price" wire:model.defer="buyer_property_ad_ex_max_price">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('buyer_property_ad_ex_max_price') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="buyer_property_short_description" class="form-label">Thumbnail Short Description</label>
                            <textarea class="form-control" rows="3" id="buyer_property_short_description" placeholder="Thumbnail Short Description" wire:model.defer="buyer_property_ad_short_description"></textarea>
                            @error('buyer_property_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <div wire:ignore>
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="buyer-property-summernote" wire:model.defer="buyer_property_ad_description">{{ $buyer_property_ad_description }}</textarea>
                            </div>
                            @error('buyer_property_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                @elseif ($buyer_ad_type == 'buyer-job')

                    <div class="row g-2 g-md-3">
                        <div class="col-md-6">
                            <label for="buyer_job_name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="buyer_job_name" placeholder="Expected job name" wire:model.defer="buyer_job_ad_title">
                            @error('buyer_job_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category Name</label>
                            <select class="form-select" wire:model.defer="buyer_job_ad_category">
                                <option value="">Select job category</option>
                                @foreach ($job_categories as $job_category)
                                    <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                @endforeach
                            </select>
                            @error('buyer_job_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_job_address" class="form-label">Expected District</label>
                            <select class="form-select" id="buyer_job_address" wire:model.defer="buyer_job_ad_ex_district">
                                <option value="">Choose expected district</option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Moneragala">Moneragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>
                            @error('buyer_job_ad_ex_district') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="buyer_job_education" class="form-label">Expected Job Type</label>
                            <select class="form-select" wire:model.defer="buyer_job_ad_ex_job_type">
                                <option selected>Select job type</option>
                                <option value="Full time">Full time</option>
                                <option value="Part time">Part time</option>
                            </select>
                            @error('buyer_job_ad_ex_job_type') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="buyer_job_education" class="form-label">Education Level </label>
                            <select class="form-select" id="buyer_job_education" wire:model.defer="buyer_job_ad_ex_education_level">
                                <option value="">Select education level</option>
                                <option value="O/L">O/L</option>
                                <option value="A/L">A/L</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Degree">Degree</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('buyer_job_ad_ex_education_level') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="buyer_job_short_description" class="form-label">Thumbnail Short Description</label>
                            <textarea class="form-control" rows="3" id="buyer_job_short_description" placeholder="Thumbnail Short Description" wire:model.defer="buyer_job_ad_short_description"></textarea>
                            @error('buyer_job_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <div wire:ignore>
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="buyer-job-summernote" wire:model.defer="buyer_job_ad_description">{{ $buyer_job_ad_description }}</textarea>
                            </div>
                            @error('buyer_job_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                @endif

                <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                    <div wire:loading.remove wire:target="updateBuyerAd">
                        <button class="btn btn-primary edit-ad-btn" type="submit">Update Buyer Advertisement</button>
                    </div>
                    <div wire:loading wire:target="updateBuyerAd">
                        <button class="btn btn-primary edit-ad-btn" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Updating Buyer Advertisement
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $('#buyer-general-summernote').summernote({
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
                    @this.set('buyer_general_ad_description', contents);
                }
            }
        });

        $('#buyer-property-summernote').summernote({
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
                    @this.set('buyer_property_ad_description', contents);
                }
            }
        });

        $('#buyer-job-summernote').summernote({
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
                    @this.set('buyer_job_ad_description', contents);
                }
            }
        });
    </script>
@endpush