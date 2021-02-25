{{-- <div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">POST YOUR ADVERTISEMENT</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="post-ad my-5">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link btn active" id="seller_ad-tab" data-bs-toggle="tab" href="#seller_ad" role="tab" aria-controls="seller_ad" aria-selected="true">SELLER ADVERTISEMENT</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link btn" id="buyer-ad-tab" data-bs-toggle="tab" href="#buyer-ad" role="tab" aria-controls="buyer-ad" aria-selected="false">BUYER ADVERTISEMENT</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane pt-3 fade show active" id="seller_ad" role="tabpanel" aria-labelledby="seller_ad-tab">
                    <h2 class="ad-h2">Create Your <span>Seller Advertisement</span></h2>
                    <p class="ad-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero itaque nobis quos iste sapiente possimus aliquam eligendi explicabo minus officia? Nam laborum incidunt earum, consequuntur expedita explicabo? Nisi, laborum minima.</p>

                    <div class="form-section" wire:ignore>
                        <form class="row g-3" method="post" action="{{ route('seller_ad.post') }}" enctype="multipart/form-data">
                            @csrf

                            <h6>USER DETAILS</h6>
                            <hr>

                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="Your name" name="seller_user_first_name" required>
                            </div>
                            {!! $errors->first('seller_user_first_name', '<p class="help-block text-danger">:message</p>') !!}

                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Your last name" name="seller_user_last_name" required>
                            </div>
                            {!! $errors->first('seller_user_last_name', '<p class="help-block text-danger">:message</p>') !!}

                            <div class="col-md-6">
                                <label for="email_address" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email_address" placeholder="Your email" name="seller_user_email" required>
                            </div>
                            {!! $errors->first('seller_user_email', '<p class="help-block text-danger">:message</p>') !!}

                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" name="seller_user_phone_number" required>
                            </div>
                            {!! $errors->first('seller_user_phone_number', '<p class="help-block text-danger">:message</p>') !!}

                            <div class="col-md-6">
                                <label for="city" class="form-label">Town / City</label>
                                <select class="form-select" aria-label="City select" id="city" name="seller_user_district" required>
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
                            </div>
                            {!! $errors->first('seller_user_district', '<p class="help-block text-danger">:message</p>') !!}

                            <h6 class="mt-5">ADVERTISEMENT DETAILS</h6>
                            <small class="text-muted"> General Advertisement - Ex: Electronics, Bikes, Books, Cloths, Computer, Appliance, Phones, Video games ... </small>
                            <small class="text-muted"> Properties Advertisement - Ex: Home sale, Home rent, Land sale, Land lease ...</small>
                            <small class="text-muted"> Job Advertisement - Ex: Accounting, Engineering, Computer, Healthcare, Management, Labour ...</small>
                            <hr>

                            <div class="col-md-12">
                                <label for="advertisement_type" class="form-label">Advertisement Type</label>
                                <select class="form-select seller-type-select" id="advertisement_type" name="seller_ad_type" required>
                                    <option selected>Select Advertisement Type</option>
                                    <option value="seller-general">General Advertisement</option>
                                    <option value="seller-properties">Properties Advertisement</option>
                                    <option value="seller-job">Job Advertisement</option>
                                </select>
                                {!! $errors->first('seller_ad_type', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            
                            <div class="seller-general box">
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="seller_general_name" placeholder="Your product name" name="seller_general_ad_title">
                                        {!! $errors->first('seller_general_ad_title', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_ad_category" class="form-label">Category Name</label>
                                        <select class="form-select" id="seller_general_ad_category" name="seller_general_ad_category">
                                            <option selected>Select general category</option>
                                            @foreach ($general_categories as $general_category)
                                                <option value="{{ $general_category->id }}">{{ $general_category->name }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('seller_general_ad_category', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_thumbnail" class="form-label">Main Thumbnail Image</label>
                                        <input class="form-control" type="file" id="seller_general_thumbnail" name="seller_general_ad_thumbnail_image">
                                        {!! $errors->first('seller_general_ad_thumbnail_image', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_images" class="form-label">Other Images (3)</label>
                                        <input class="form-control" type="file" id="seller_general_images" name="seller_general_ad_other_images[]" multiple>
                                        {!! $errors->first('seller_general_ad_other_images', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_condition" class="form-label">Condition</label>
                                        <input type="text" class="form-control" id="seller_general_condition" placeholder="Product condition"name="seller_general_ad_condition">
                                        {!! $errors->first('seller_general_ad_condition', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control" id="seller_general_brand" placeholder="Brand name" name="seller_general_ad_brand">
                                        {!! $errors->first('seller_general_ad_brand', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    
                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_model" class="form-label">Model</label>
                                        <input type="text" class="form-control" id="seller_general_model" placeholder="Model name" name="seller_general_ad_model">
                                        {!! $errors->first('seller_general_ad_model', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_price" class="form-label">Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="seller_general_price" placeholder="Your product price" name="seller_general_ad_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        {!! $errors->first('seller_general_ad_price', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>         

                                    <div class="col-12">
                                        <label for="seller_general_short_description" class="form-label">Thumbnail Short Description</label>
                                        <textarea class="form-control" rows="3" id="seller_general_short_description" placeholder="Thumbnail Short Description" name="seller_general_ad_short_description"></textarea>
                                        {!! $errors->first('seller_general_ad_short_description', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" id="seller-general-summernote" name="seller_general_ad_description"></textarea>
                                        {!! $errors->first('seller_general_ad_description', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                </div>
                            </div>
                            <div class="seller-properties box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="seller_property_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="seller_property_name" placeholder="Your Property name" name="seller_property_ad_title">
                                        {!! $errors->first('seller_property_ad_title', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" name="seller_property_ad_category">
                                            <option selected>Select property category</option>
                                            @foreach ($property_categories as $property_category)
                                                <option value="{{ $property_category->id }}">{{ $property_category->name }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('seller_property_ad_category', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_property_thumbnail" class="form-label">Main Thumbnail Image</label>
                                        <input class="form-control" type="file" id="seller_property_thumbnail" name="seller_property_ad_thumbnail_image">
                                        {!! $errors->first('seller_property_ad_thumbnail_image', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_property_images" class="form-label">Other Images (3)</label>
                                        <input class="form-control" type="file" id="seller_property_images" name="seller_property_ad_other_images" multiple>
                                        {!! $errors->first('seller_property_ad_other_images', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12">
                                        <label for="seller_property_address" class="form-label">Property Address</label>
                                        <input type="text" class="form-control" id="seller_property_address" placeholder="Your Property address" name="seller_property_ad_property_address">
                                        {!! $errors->first('seller_property_ad_property_address', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6">
                                        <label for="seller_property_condition" class="form-label">Condition</label>
                                        <input type="text" class="form-control" id="seller_property_condition" placeholder="Property condition" name="seller_property_ad_condition">
                                        {!! $errors->first('seller_property_ad_condition', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6">
                                        <label for="seller_property_price" class="form-label">Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="seller_property_price" placeholder="Your property price" name="seller_property_ad_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        {!! $errors->first('seller_property_ad_price', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12">
                                        <label for="seller_property_short_description" class="form-label">Thumbnail Short Description</label>
                                        <textarea class="form-control" rows="3" id="seller_property_short_description" placeholder="Thumbnail Short Description" name="seller_property_ad_short_description"></textarea>
                                        {!! $errors->first('seller_property_ad_short_description', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" id="seller-property-summernote" name="seller_property_ad_description"></textarea>
                                        {!! $errors->first('seller_property_ad_description', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>

                                </div>
                            </div>
                            <div class="seller-job box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="seller_job_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="seller_job_name" placeholder="Job name" wire:model.defer="seller_job_ad_title">
                                    </div>
                                    @error('seller_job_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="seller_job_ad_category">
                                            <option selected>Select job category</option>
                                            @foreach ($job_categories as $job_category)
                                                <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('seller_job_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12 col-md-6">
                                        <label for="seller_job_thumbnail" class="form-label">Main Thumbnail Image (Work Place / Company Logo ...)</label>
                                        <input class="form-control" type="file" id="seller_job_thumbnail" wire:model.defer="seller_job_ad_thumbnail_image">
                                    </div>
                                    @error('seller_job_ad_thumbnail_image') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12 col-md-6">
                                        <label for="seller_job_education" class="form-label">Job Type</label>
                                        <select class="form-select" wire:model.defer="seller_job_ad_job_type">
                                            <option selected>Select job type</option>
                                            <option value="Full time">Full time</option>
                                            <option value="Part time">Part time</option>
                                        </select>
                                    </div>
                                    @error('seller_job_ad_job_type') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label for="seller_job_address" class="form-label">Work Place Address</label>
                                        <input type="text" class="form-control" id="seller_job_address" placeholder="Work place address" wire:model.defer="seller_job_ad_work_address">
                                    </div>
                                    @error('seller_job_ad_work_address') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12 col-md-6">
                                        <label for="seller_job_salary" class="form-label">Salary Per Month</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="seller_job_salary" placeholder="Job salary per month" wire:model.defer="seller_job_ad_salary">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    @error('seller_job_ad_salary') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12 col-md-6">
                                        <label for="seller_job_education" class="form-label">Education Level </label>
                                        <input type="text" class="form-control" id="seller_job_education" placeholder="Required education level" wire:model.defer="seller_job_ad_education_level">
                                    </div>
                                    @error('seller_job_ad_education_level') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label for="seller_job_short_description" class="form-label">Thumbnail Short Description</label>
                                        <textarea class="form-control" rows="3" id="seller_job_short_description" placeholder="Thumbnail Short Description" wire:model.defer="seller_job_ad_short_description"></textarea>
                                    </div>
                                    @error('seller_job_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" id="seller-job-summernote" wire:model.defer="seller_job_ad_description"></textarea>
                                    </div>
                                    @error('seller_job_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                                <button class="btn btn-primary post-ad-btn" type="submit">Post Advertisement</button>
                            </div>

                        </form>
                    </div>

                </div>
                <div class="tab-pane pt-3 fade" id="buyer-ad" role="tabpanel" aria-labelledby="buyer-ad-tab">
                    <h2 class="ad-h2">Create Your <span>Buyer Advertisement</span></h2>
                    <p class="ad-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero itaque nobis quos iste sapiente possimus aliquam eligendi explicabo minus officia? Nam laborum incidunt earum, consequuntur expedita explicabo? Nisi, laborum minima.</p>

                    <div class="form-section">
                        <form class="row g-3" wire:submit.prevent="submitBuyerAd">
                            <h6>USER DETAILS</h6>
                            <hr>

                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="Your name" wire:model.defer="buyer_user_first_name" required>
                            </div>
                            @error('buyer_user_first_name') <span class="error text-danger">{{ $message }}</span> @enderror

                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Your last name" wire:model.defer="buyer_user_last_name" required>
                            </div>
                            @error('buyer_user_last_name') <span class="error text-danger">{{ $message }}</span> @enderror

                            <div class="col-md-6">
                                <label for="email_address" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email_address" placeholder="Your email" wire:model.defer="buyer_user_email" required>
                            </div>
                            @error('buyer_user_email') <span class="error text-danger">{{ $message }}</span> @enderror

                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" wire:model.defer="buyer_user_phone_number" required>
                            </div>
                            @error('buyer_user_phone_number') <span class="error text-danger">{{ $message }}</span> @enderror

                            <div class="col-md-6">
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
                            </div>
                            @error('buyer_user_district') <span class="error text-danger">{{ $message }}</span> @enderror

                            <h6 class="mt-5">ADVERTISEMENT DETAILS</h6>
                            <small class="text-muted"> General Advertisement - Ex: Electronics, Bikes, Books, Cloths, Computer, Appliance, Phones, Video games ... </small>
                            <small class="text-muted"> Properties Advertisement - Ex: Home sale, Home rent, Land sale, Land lease ...</small>
                            <small class="text-muted"> Job Advertisement - Ex: Accounting, Engineering, Computer, Healthcare, Management, Labour ...</small>
                            <hr>

                            <div class="col-md-12">
                                <label for="advertisement_type" class="form-label">Advertisement Type</label>
                                <select class="form-select buyer-type-select" id="advertisement_type" wire:model.defer="buyer_ad_type" required>
                                    <option selected>Select Advertisement Type</option>
                                    <option value="buyer-general">General Advertisement</option>
                                    <option value="buyer-properties">Properties Advertisement</option>
                                    <option value="buyer-job">Job Advertisement</option>
                                </select>
                            </div>
                            @error('buyer_ad_type') <span class="error text-danger">{{ $message }}</span> @enderror

                            <div wire:ignore.self class="buyer-general box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="buyer_general_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="buyer_general_name" placeholder="Expected product name" wire:model.defer="buyer_general_ad_title">
                                    </div>
                                    @error('buyer_general_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="buyer_general_ad_category">
                                            <option selected>Select general category</option>
                                            @foreach ($general_categories as $general_category)
                                                <option value="{{ $general_category->id }}">{{ $general_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('buyer_general_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_general_brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control" id="buyer_general_brand" placeholder="Expected Brand name" wire:model.defer="buyer_general_ad_brand">
                                    </div>
                                    @error('buyer_general_ad_brand') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_general_model" class="form-label">Model</label>
                                        <input type="text" class="form-control" id="buyer_general_model" placeholder="Expected Model name" wire:model.defer="buyer_general_ad_model">
                                    </div>
                                    @error('buyer_general_ad_model') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_general_min_price" class="form-label">Expected Minimum Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="buyer_general_min_price" placeholder="Minimum price" wire:model.defer="buyer_general_ad_ex_min_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    @error('buyer_general_ad_ex_min_price') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_general_max_price" class="form-label">Expected Maximum Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="buyer_general_max_price" placeholder="Maximum price" wire:model.defer="buyer_general_ad_ex_max_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    @error('buyer_general_ad_ex_max_price') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label for="buyer_general_short_description" class="form-label">Thumbnail Short Description</label>
                                        <textarea class="form-control" rows="3" id="buyer_general_short_description" placeholder="Thumbnail Short Description" wire:model.defer="buyer_general_ad_short_description"></textarea>
                                    </div>
                                    @error('buyer_general_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" id="buyer-general-summernote" wire:model.defer="buyer_general_ad_description"></textarea>
                                    </div>
                                    @error('buyer_general_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div wire:ignore.self class="buyer-properties box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="buyer_property_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="buyer_property_name" placeholder="Expected Property name" wire:model.defer="buyer_property_ad_title">
                                    </div>
                                    @error('buyer_property_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="buyer_property_ad_category">
                                            <option selected>Select property category</option>
                                            @foreach ($property_categories as $property_category)
                                                <option value="{{ $property_category->id }}">{{ $property_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('buyer_property_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_property_address" class="form-label">Expected District</label>
                                        <select class="form-select" id="buyer_property_address" wire:model.defer="buyer_property_ad_ex_district">
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
                                    </div>
                                    @error('buyer_property_ad_ex_district') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_property_min_price" class="form-label">Expected Minimum Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="buyer_property_min_price" placeholder="Minimum price" wire:model.defer="buyer_property_ad_ex_min_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    @error('buyer_property_ad_ex_min_price') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_property_max_price" class="form-label">Expected Maximum Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="buyer_property_max_price" placeholder="Maximum price" wire:model.defer="buyer_property_ad_ex_max_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    @error('buyer_property_ad_ex_max_price') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label for="buyer_property_short_description" class="form-label">Thumbnail Short Description</label>
                                        <textarea class="form-control" rows="3" id="buyer_property_short_description" placeholder="Thumbnail Short Description" wire:model.defer="buyer_property_ad_short_description"></textarea>
                                    </div>
                                    @error('buyer_property_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" id="buyer-property-summernote" wire:model.defer="buyer_property_ad_description"></textarea>
                                    </div>
                                    @error('buyer_property_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div wire:ignore.self class="buyer-job box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="buyer_job_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="buyer_job_name" placeholder="Expected job name" wire:model.defer="buyer_job_ad_title">
                                    </div>
                                    @error('buyer_job_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="buyer_job_ad_category">
                                            <option selected>Select job category</option>
                                            @foreach ($job_categories as $job_category)
                                                <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('buyer_job_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_job_address" class="form-label">Expected District</label>
                                        <select class="form-select" id="buyer_job_address" wire:model.defer="buyer_job_ad_ex_district">
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
                                    </div>
                                    @error('buyer_job_ad_ex_district') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-md-6">
                                        <label for="buyer_job_education" class="form-label">Expected Job Type</label>
                                        <select class="form-select" wire:model.defer="buyer_job_ad_ex_job_type">
                                            <option selected>Select job type</option>
                                            <option value="Full time">Full time</option>
                                            <option value="Part time">Part time</option>
                                        </select>
                                    </div>
                                    @error('buyer_job_ad_ex_job_type') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label for="buyer_job_education" class="form-label">Expected Education Level </label>
                                        <input type="text" class="form-control" id="buyer_job_education" placeholder="Expected Education level" wire:model.defer="buyer_job_ad_ex_education_level">
                                    </div>
                                    @error('buyer_job_ad_ex_education_level') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label for="buyer_job_short_description" class="form-label">Thumbnail Short Description</label>
                                        <textarea class="form-control" rows="3" id="buyer_job_short_description" placeholder="Thumbnail Short Description" wire:model.defer="buyer_job_ad_short_description"></textarea>
                                    </div>
                                    @error('buyer_job_ad_short_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" id="buyer-job-summernote" wire:model.defer="buyer_job_ad_description"></textarea>
                                    </div>
                                    @error('buyer_job_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                                <button class="btn btn-primary post-ad-btn" type="submit">Post Advertisement</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

 <div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">POST ADVERTISEMENT</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="post-ad my-5">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist" wire:ignore>
                <li class="nav-item" role="presentation">
                    <a class="nav-link btn active" id="seller_ad-tab" data-bs-toggle="tab" href="#seller_ad" role="tab" aria-controls="seller_ad" aria-selected="true">SELLER ADVERTISEMENT</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link btn" id="buyer-ad-tab" data-bs-toggle="tab" href="#buyer-ad" role="tab" aria-controls="buyer-ad" aria-selected="false">BUYER ADVERTISEMENT</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div wire:ignore.self class="tab-pane pt-3 fade show active" id="seller_ad" role="tabpanel" aria-labelledby="seller_ad-tab">
                    <h2 class="ad-h2">Create Your <span>Seller Advertisement</span></h2>
                    <p class="ad-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero itaque nobis quos iste sapiente possimus aliquam eligendi explicabo minus officia? Nam laborum incidunt earum, consequuntur expedita explicabo? Nisi, laborum minima.</p>

                    <div class="form-section">
                        <form class="row g-3" wire:submit.prevent="submitSellerAd">
                            <h6>USER DETAILS</h6>
                            <hr>

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

                            <div class="col-md-6">
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

                            <h6 class="mt-5">ADVERTISEMENT DETAILS</h6>
                            <small class="text-muted"> General Advertisement - Ex: Electronics, Bikes, Books, Cloths, Computer, Appliance, Phones, Video games ... </small>
                            <small class="text-muted"> Properties Advertisement - Ex: Home sale, Home rent, Land sale, Land lease ...</small>
                            <small class="text-muted"> Job Advertisement - Ex: Accounting, Engineering, Computer, Healthcare, Management, Labour ...</small>
                            <hr>

                            <div class="col-md-12">
                                <div wire:ignore>
                                    <label for="advertisement_type" class="form-label">Advertisement Type</label>
                                    <select class="form-select seller-type-select" name="ad_type" id="advertisement_type" wire:model.defer="seller_ad_type" required>
                                        <option selected>Select Advertisement Type</option>
                                        <option value="seller-general">General Advertisement</option>
                                        <option value="seller-property">Properties Advertisement</option>
                                        <option value="seller-job">Job Advertisement</option>
                                    </select>
                                </div>
                                @error('seller_ad_type') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div wire:ignore.self class="seller-general box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="seller_general_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="seller_general_name" placeholder="Your product name" wire:model.defer="seller_general_ad_title">
                                        @error('seller_general_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="seller_general_ad_category">
                                            <option selected>Select general category</option>
                                            @foreach ($general_categories as $general_category)
                                                <option value="{{ $general_category->id }}">{{ $general_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('seller_general_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_thumbnail" class="form-label">Main Thumbnail Image</label>
                                        <div class="col-12 mb-2 d-flex justify-content-center">
                                            @if ($seller_general_ad_thumbnail_image)
                                                <img src="{{ $seller_general_ad_thumbnail_image->temporaryUrl() }}" height="70">
                                            @endif
                                        </div>
                                        <input class="form-control" type="file" id="seller_general_thumbnail" wire:model.defer="seller_general_ad_thumbnail_image">
                                        @error('seller_general_ad_thumbnail_image') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_general_images" class="form-label">Other Images (3)</label>
                                        <div class="col-12 mb-2 d-flex justify-content-center row">
                                            @if ($seller_general_ad_other_images)
                                                @foreach ($seller_general_ad_other_images as $general_image)   
                                                    <div class="col d-flex justify-content-center">
                                                        <img src="{{ $general_image->temporaryUrl() }}" height="70">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <input class="form-control" type="file" id="seller_general_images" wire:model.defer="seller_general_ad_other_images" multiple>
                                        @error('seller_general_ad_other_images.*') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="seller_general_condition" class="form-label">Condition</label>
                                        <input type="text" class="form-control" id="seller_general_condition" placeholder="Product condition" wire:model.defer="seller_general_ad_condition">
                                        @error('seller_general_ad_condition') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="seller_general_brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control" id="seller_general_brand" placeholder="Brand name" wire:model.defer="seller_general_ad_brand">
                                        @error('seller_general_ad_brand') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="seller_general_model" class="form-label">Model</label>
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
                                            <textarea class="form-control" id="seller-general-summernote" wire:model.defer="seller_general_ad_description"></textarea>
                                        </div>
                                        @error('seller_general_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div wire:ignore.self class="seller-property box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="seller_property_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="seller_property_name" placeholder="Your Property name" wire:model.defer="seller_property_ad_title">
                                        @error('seller_property_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="seller_property_ad_category">
                                            <option selected>Select property category</option>
                                            @foreach ($property_categories as $property_category)
                                                <option value="{{ $property_category->id }}">{{ $property_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('seller_property_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_property_thumbnail" class="form-label">Main Thumbnail Image</label>
                                        <div class="col-12 mb-2 d-flex justify-content-center">
                                            @if ($seller_property_ad_thumbnail_image)
                                                <img src="{{ $seller_property_ad_thumbnail_image->temporaryUrl() }}" height="70">
                                            @endif
                                        </div>
                                        <input class="form-control" type="file" id="seller_property_thumbnail" wire:model.defer="seller_property_ad_thumbnail_image">
                                        @error('seller_property_ad_thumbnail_image') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_property_images" class="form-label">Other Images (3)</label>
                                        <div class="col-12 mb-2 d-flex justify-content-center row">
                                            @if ($seller_property_ad_other_images)
                                                @foreach ($seller_property_ad_other_images as $property_image)   
                                                    <div class="col d-flex justify-content-center">
                                                        <img src="{{ $property_image->temporaryUrl() }}" height="70">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
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
                                        <input type="text" class="form-control" id="seller_property_condition" placeholder="Property condition" wire:model.defer="seller_property_ad_condition">
                                        @error('seller_property_ad_condition') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="seller_property_price" class="form-label">Price</label>
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
                                            <textarea class="form-control" id="seller-property-summernote" wire:model.defer="seller_property_ad_description"></textarea>
                                        </div>
                                        @error('seller_property_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>
                            <div wire:ignore.self class="seller-job box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="seller_job_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="seller_job_name" placeholder="Job name" wire:model.defer="seller_job_ad_title">
                                        @error('seller_job_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="seller_job_ad_category">
                                            <option selected>Select job category</option>
                                            @foreach ($job_categories as $job_category)
                                                <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('seller_job_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="seller_job_thumbnail" class="form-label">Main Thumbnail Image (Work Place / Company Logo ...)</label>
                                        <div class="col-12 mb-2 d-flex justify-content-center">
                                            @if ($seller_job_ad_thumbnail_image)
                                                <img src="{{ $seller_job_ad_thumbnail_image->temporaryUrl() }}" height="70">
                                            @endif
                                        </div>
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

                                    <div class="col-12">
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
                                        <input type="text" class="form-control" id="seller_job_education" placeholder="Required education level" wire:model.defer="seller_job_ad_education_level">
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
                                            <textarea class="form-control" id="seller-job-summernote" wire:model.defer="seller_job_ad_description"></textarea>
                                        </div>
                                        @error('seller_job_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                                <div wire:loading.remove wire:target="submitSellerAd">
                                    <button class="btn btn-primary post-ad-btn" type="submit">Post Advertisement</button>
                                </div>
                                <div wire:loading wire:target="submitSellerAd">
                                    <button class="btn btn-primary post-ad-btn" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Posting Advertisement
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
                <div wire:ignore.self class="tab-pane pt-3 fade" id="buyer-ad" role="tabpanel" aria-labelledby="buyer-ad-tab">
                    <h2 class="ad-h2">Create Your <span>Buyer Advertisement</span></h2>
                    <p class="ad-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero itaque nobis quos iste sapiente possimus aliquam eligendi explicabo minus officia? Nam laborum incidunt earum, consequuntur expedita explicabo? Nisi, laborum minima.</p>

                    <div class="form-section">
                        <form class="row g-3" wire:submit.prevent="submitBuyerAd">
                            <h6>USER DETAILS</h6>
                            <hr>

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

                            <div class="col-md-6">
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

                            <h6 class="mt-5">ADVERTISEMENT DETAILS</h6>
                            <small class="text-muted"> General Advertisement - Ex: Electronics, Bikes, Books, Cloths, Computer, Appliance, Phones, Video games ... </small>
                            <small class="text-muted"> Properties Advertisement - Ex: Home sale, Home rent, Land sale, Land lease ...</small>
                            <small class="text-muted"> Job Advertisement - Ex: Accounting, Engineering, Computer, Healthcare, Management, Labour ...</small>
                            <hr>

                            <div class="col-md-12">
                                <div wire:ignore>
                                    <label for="advertisement_type" class="form-label">Advertisement Type</label>
                                    <select class="form-select buyer-type-select" id="advertisement_type" wire:model.defer="buyer_ad_type" required>
                                        <option selected>Select Advertisement Type</option>
                                        <option value="buyer-general">General Advertisement</option>
                                        <option value="buyer-property">Properties Advertisement</option>
                                        <option value="buyer-job">Job Advertisement</option>
                                    </select>
                                </div>
                                @error('buyer_ad_type') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div wire:ignore.self class="buyer-general box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="buyer_general_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="buyer_general_name" placeholder="Expected product name" wire:model.defer="buyer_general_ad_title">
                                        @error('buyer_general_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="buyer_general_ad_category">
                                            <option selected>Select general category</option>
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
                                        <label for="buyer_general_model" class="form-label">Model</label>
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
                                            <textarea type="text" class="form-control" id="buyer-general-summernote"  wire:model.defer="buyer_general_ad_description"></textarea>
                                        </div>
                                        @error('buyer_general_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>
                            <div wire:ignore.self class="buyer-property box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="buyer_property_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="buyer_property_name" placeholder="Expected Property name" wire:model.defer="buyer_property_ad_title">
                                        @error('buyer_property_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="buyer_property_ad_category">
                                            <option selected>Select property category</option>
                                            @foreach ($property_categories as $property_category)
                                                <option value="{{ $property_category->id }}">{{ $property_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('buyer_property_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="buyer_property_address" class="form-label">Expected District</label>
                                        <select class="form-select" id="buyer_property_address" wire:model.defer="buyer_property_ad_ex_district">
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
                                        @error('buyer_property_ad_ex_district') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="buyer_property_min_price" class="form-label">Expected Minimum Price</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs</span>
                                            <input type="text" class="form-control" id="buyer_property_min_price" placeholder="Minimum price" wire:model.defer="buyer_property_ad_ex_min_price">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                        @error('buyer_property_ad_ex_min_price') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="buyer_property_max_price" class="form-label">Expected Maximum Price</label>
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
                                            <textarea class="form-control" id="buyer-property-summernote" wire:model.defer="buyer_property_ad_description"></textarea>
                                        </div>
                                        @error('buyer_property_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>
                            <div wire:ignore.self class="buyer-job box">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="buyer_job_name" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="buyer_job_name" placeholder="Expected job name" wire:model.defer="buyer_job_ad_title">
                                        @error('buyer_job_ad_title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Category Name</label>
                                        <select class="form-select" wire:model.defer="buyer_job_ad_category">
                                            <option selected>Select job category</option>
                                            @foreach ($job_categories as $job_category)
                                                <option value="{{ $job_category->id }}">{{ $job_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('buyer_job_ad_category') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="buyer_job_address" class="form-label">Expected District</label>
                                        <select class="form-select" id="buyer_job_address" wire:model.defer="buyer_job_ad_ex_district">
                                            <option selected>Choose expected district</option>
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
                                        <input type="text" class="form-control" id="buyer_job_education" placeholder="Education level" wire:model.defer="buyer_job_ad_ex_education_level">
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
                                            <textarea class="form-control" id="buyer-job-summernote" wire:model.defer="buyer_job_ad_description"></textarea>
                                        </div>
                                        @error('buyer_job_ad_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                                <div wire:loading.remove wire:target="submitBuyerAd">
                                    <button class="btn btn-primary post-ad-btn" type="submit">Post Advertisement</button>
                                </div>
                                <div wire:loading wire:target="submitBuyerAd">
                                    <button class="btn btn-primary post-ad-btn" type="button" disabled>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Posting Advertisement
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
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

    })
</script>

 <script>
    document.addEventListener('livewire:load', function () {
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
    })
</script>

