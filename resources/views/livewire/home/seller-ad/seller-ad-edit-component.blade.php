<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">SELLER ADVERTISEMENT EDIT</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($seller_general_ad_title ?? $seller_property_ad_title ?? $seller_job_ad_title) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="container bg-white my-4 py-4 py-md-5 px-3 px-md-5">

        <form class="row g-3" wire:submit.prevent="updateSellerAd({{ $seller_ad_id }})">

            <input type="hidden" wire:model.defer="seller_ad_id">

            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="Your name" wire:model.defer="seller_user_first_name" required>
                @error('seller_user_first_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Your last name" wire:model.defer="seller_user_last_name" required>
                @error('seller_user_last_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6">
                <label for="email_address" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email_address" placeholder="Your email" wire:model.defer="seller_user_email" required>
                @error('seller_user_email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" wire:model.defer="seller_user_phone_number" required>
                @error('seller_user_phone_number') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
                <label for="city" class="form-label">Town / City</label>
                <select class="form-select" aria-label="City select" id="city" wire:model.defer="seller_user_district" required>
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
                @error('seller_user_district') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            @if ($seller_ad_type == 'seller-general')

                <div class="row g-2 g-md-3">
                    <div class="col-md-6">
                        <label for="seller_general_name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="seller_general_name" placeholder="Your product name" wire:model.defer="seller_general_ad_title">
                        @error('seller_general_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category Name</label>
                        <select class="form-select" wire:model.defer="seller_general_ad_category">
                            <option value="">Select general category</option>
                            @foreach ($general_categories as $general_category)
                                <option value="{{ $general_category->id }}">{{ $general_category->name }}</option>
                            @endforeach
                        </select>
                        @error('seller_general_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Existing Main Thumbnail Image</label>
                        <br>
                        @if($seller_general_existing_ad_thumbnail_image)
                            <img src="{{ asset('storage/'.$seller_general_existing_ad_thumbnail_image ) }}" alt="Main Thumbnail Image" height="70">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Existing Other Images</label>
                        @if($seller_general_existing_ad_other_images)
                            <div class="col-12 mb-2 d-flex justify-content-center row">
                                @foreach (json_decode($seller_general_existing_ad_other_images) as $image)
                                    <div class="col d-flex justify-content-center">
                                        <img src="{{ asset('storage/'.$image ) }}" alt="Existing Other Images" height="70">     
                                    </div>       
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_general_thumbnail" class="form-label">Main Thumbnail Image</label>
                        @if ($seller_general_ad_thumbnail_image)
                            <div class="col-12 mb-2 d-flex justify-content-center">
                                <img src="{{ $seller_general_ad_thumbnail_image->temporaryUrl() }}" height="70">
                            </div>
                        @endif
                        <input class="form-control" type="file" id="seller_general_thumbnail" wire:model.defer="seller_general_ad_thumbnail_image">
                        @error('seller_general_ad_thumbnail_image') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_general_images" class="form-label">Other Images <small class="text-muted">(Minimum 3*)</small></label>
                        @if ($seller_general_ad_other_images)
                            <div class="col-12 mb-2 d-flex justify-content-center row">
                                @foreach ($seller_general_ad_other_images as $general_image)   
                                    <div class="col d-flex justify-content-center">
                                        <img src="{{ $general_image->temporaryUrl() }}" height="70">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <input class="form-control" type="file" id="seller_general_images" wire:model.defer="seller_general_ad_other_images" multiple>
                        @error('seller_general_ad_other_images.*') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="seller_general_condition" class="form-label">Condition</label>
                        <select class="form-select" id="seller_general_condition" wire:model.defer="seller_general_ad_condition">
                            <option value="">Select product condition</option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                            <option value="Refurbished">Refurbished</option>
                            <option value="Damaged">Damaged</option>
                        </select>
                        @error('seller_general_ad_condition') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="seller_general_brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="seller_general_brand" placeholder="Brand name" wire:model.defer="seller_general_ad_brand">
                        @error('seller_general_ad_brand') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="seller_general_model" class="form-label">Model <small class="text-muted">(Not Mandatory*)</small></label>
                        <input type="text" class="form-control" id="seller_general_model" placeholder="Model name" wire:model.defer="seller_general_ad_model">
                        @error('seller_general_ad_model') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="seller_general_price" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs</span>
                            <input type="text" class="form-control" id="seller_general_price" placeholder="Your product price" wire:model.defer="seller_general_ad_price">
                            <span class="input-group-text">.00</span>
                        </div>
                        @error('seller_general_ad_price') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label for="seller_general_short_description" class="form-label">Thumbnail Short Description</label>
                        <textarea class="form-control" rows="3" id="seller_general_short_description" placeholder="Thumbnail Short Description" wire:model.defer="seller_general_ad_short_description"></textarea>
                        @error('seller_general_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <div wire:ignore>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="seller-general-summernote" wire:model.defer="seller_general_ad_description">{{ $seller_general_ad_description }}</textarea>
                        </div>
                        @error('seller_general_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            @elseif ($seller_ad_type == 'seller-property')
                <div class="row g-2 g-md-3">
                    <div class="col-md-6">
                        <label for="seller_property_name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="seller_property_name" placeholder="Your Property name" wire:model.defer="seller_property_ad_title">
                        @error('seller_property_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category Name</label>
                        <select class="form-select" wire:model.defer="seller_property_ad_category">
                            <option value="">Select property category</option>
                            @foreach ($property_categories as $property_category)
                                <option value="{{ $property_category->id }}">{{ $property_category->name }}</option>
                            @endforeach
                        </select>
                        @error('seller_property_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Existing Main Thumbnail Image</label>
                        <br>
                        @if($seller_property_existing_ad_thumbnail_image)
                            <img src="{{ asset('storage/'.$seller_property_existing_ad_thumbnail_image ) }}" alt="Main Thumbnail Image" height="70">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Existing Other Images</label>
                        @if($seller_property_existing_ad_other_images)
                            <div class="col-12 mb-2 d-flex justify-content-center row">
                                @foreach (json_decode($seller_property_existing_ad_other_images) as $image)
                                    <div class="col d-flex justify-content-center">
                                        <img src="{{ asset('storage/'.$image ) }}" alt="Existing Other Images" height="70">     
                                    </div>       
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_property_thumbnail" class="form-label">Main Thumbnail Image</label>
                        @if ($seller_property_ad_thumbnail_image)
                            <div class="col-12 mb-2 d-flex justify-content-center">
                                <img src="{{ $seller_property_ad_thumbnail_image->temporaryUrl() }}" height="70">
                            </div>
                        @endif
                        <input class="form-control" type="file" id="seller_property_thumbnail" wire:model.defer="seller_property_ad_thumbnail_image">
                        @error('seller_property_ad_thumbnail_image') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_property_images" class="form-label">Other Images <small class="text-muted">(Minimum 3*)</small></label>
                        @if ($seller_property_ad_other_images)
                            <div class="col-12 mb-2 d-flex justify-content-center row">
                                @foreach ($seller_property_ad_other_images as $property_image)   
                                    <div class="col d-flex justify-content-center">
                                        <img src="{{ $property_image->temporaryUrl() }}" height="70">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <input class="form-control" type="file" id="seller_property_images" wire:model.defer="seller_property_ad_other_images" multiple>
                        @error('seller_property_ad_other_images.*') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label for="seller_property_address" class="form-label">Property Address</label>
                        <input type="text" class="form-control" id="seller_property_address" placeholder="Your Property address" wire:model.defer="seller_property_ad_property_address">
                        @error('seller_property_ad_property_address') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="seller_property_condition" class="form-label">Condition</label>
                        <select class="form-select" id="seller_property_condition" wire:model.defer="seller_property_ad_condition">
                            <option value="">Select product condition</option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                            <option value="Refurbished">Refurbished</option>
                            <option value="Damaged">Damaged</option>
                        </select>
                        @error('seller_property_ad_condition') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="seller_property_price" class="form-label">Amount <small class="text-muted">(If rent / lease: Amount Per Month*)</small></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs</span>
                            <input type="text" class="form-control" id="seller_property_price" placeholder="Your property price" wire:model.defer="seller_property_ad_price">
                            <span class="input-group-text">.00</span>
                        </div>
                        @error('seller_property_ad_price') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label for="seller_property_short_description" class="form-label">Thumbnail Short Description</label>
                        <textarea class="form-control" rows="3" id="seller_property_short_description" placeholder="Thumbnail Short Description" wire:model.defer="seller_property_ad_short_description"></textarea>
                        @error('seller_property_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <div wire:ignore>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="seller-property-summernote" wire:model.defer="seller_property_ad_description">{{ $seller_property_ad_description }}</textarea>
                        </div>
                        @error('seller_property_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
            @elseif ($seller_ad_type == 'seller-job')
                <div class="row g-2 g-md-3">
                    <div class="col-md-6">
                        <label for="seller_job_name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="seller_job_name" placeholder="Job name" wire:model.defer="seller_job_ad_title">
                        @error('seller_job_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category Name</label>
                        <select class="form-select" wire:model.defer="seller_job_ad_category">
                            <option value="">Select job category</option>
                            @foreach ($job_categories as $job_category)
                                <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                            @endforeach
                        </select>
                        @error('seller_job_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Existing Main Thumbnail Image</label>
                        <br>
                        @if($seller_job_existing_ad_thumbnail_image)
                            <img src="{{ asset('storage/'.$seller_job_existing_ad_thumbnail_image ) }}" alt="Main Thumbnail Image" height="70">
                        @endif
                    </div>

                    <div class="col-12">
                        <label for="seller_job_thumbnail" class="form-label">Main Thumbnail Image <small class="text-muted">(Work Place / Company Logo*)</small></label>
                        @if ($seller_job_ad_thumbnail_image)
                            <div class="col-12 mb-2 d-flex justify-content-center">
                                <img src="{{ $seller_job_ad_thumbnail_image->temporaryUrl() }}" height="70">
                            </div>
                        @endif
                        <input class="form-control" type="file" id="seller_job_thumbnail" wire:model.defer="seller_job_ad_thumbnail_image">
                        @error('seller_job_ad_thumbnail_image') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_job_education" class="form-label">Job Type</label>
                        <select class="form-select" wire:model.defer="seller_job_ad_job_type">
                            <option selected>Select job type</option>
                            <option value="Full time">Full time</option>
                            <option value="Part time">Part time</option>
                        </select>
                        @error('seller_job_ad_job_type') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_job_address" class="form-label">Work Place Address</label>
                        <input type="text" class="form-control" id="seller_job_address" placeholder="Work place address" wire:model.defer="seller_job_ad_work_address">
                        @error('seller_job_ad_work_address') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_job_salary" class="form-label">Salary Per Month</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rs</span>
                            <input type="text" class="form-control" id="seller_job_salary" placeholder="Job salary per month" wire:model.defer="seller_job_ad_salary">
                            <span class="input-group-text">.00</span>
                        </div>
                        @error('seller_job_ad_salary') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="seller_job_education" class="form-label">Education Level </label>
                        <select class="form-select" id="seller_job_education" wire:model.defer="seller_job_ad_education_level">
                            <option value="">Select education level</option>
                            <option value="O/L">O/L</option>
                            <option value="A/L">A/L</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Degree">Degree</option>
                            <option value="Others">Others</option>
                        </select>
                        @error('seller_job_ad_education_level') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label for="seller_job_short_description" class="form-label">Thumbnail Short Description</label>
                        <textarea class="form-control" rows="3" id="seller_job_short_description" placeholder="Thumbnail Short Description" wire:model.defer="seller_job_ad_short_description"></textarea>
                        @error('seller_job_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <div wire:ignore>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="seller-job-summernote" wire:model.defer="seller_job_ad_description">{{ $seller_job_ad_description }}</textarea>
                        </div>
                        @error('seller_job_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
            @endif

            <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                <div wire:loading.remove wire:target="updateSellerAd">
                    <button class="btn btn-primary edit-ad-btn" type="submit">Update Seller Advertisement</button>
                </div>
                <div wire:loading wire:target="updateSellerAd">
                    <button class="btn btn-primary edit-ad-btn" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Updating Seller Advertisement
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>


@push('scripts')
    <script>
        $('#seller-general-summernote').summernote({
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
                    @this.set('seller_general_ad_description', contents);
                }
            }
        });

        $('#seller-property-summernote').summernote({
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
                    @this.set('seller_property_ad_description', contents);
                }
            }
        });

        $('#seller-job-summernote').summernote({
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
                    @this.set('seller_job_ad_description', contents);
                }
            }
        });
    </script>
@endpush