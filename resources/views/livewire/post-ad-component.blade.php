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

                <div class="form-section">
                    <form class="row g-3">
                        <h6>USER DETAILS</h6>
                        <hr>

                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Your name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Your last name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email_address" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email_address" placeholder="Your email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Town / City</label>
                            <select class="form-select" aria-label="City select" id="city" required>
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

                        <h6 class="mt-5">ADVERTISEMENT DETAILS</h6>
                        <small class="text-muted"> General Advertisement - Ex: Electronics, Bikes, Books, Cloths, Computer, Appliance, Phones, Video games ... </small>
                        <small class="text-muted"> Properties Advertisement - Ex: Home sale, Home rent, Land sale, Land lease ...</small>
                        <small class="text-muted"> Job Advertisement - Ex: Accounting, Engineering, Computer, Healthcare, Management, Labour ...</small>
                        <hr>

                        <div class="col-md-12">
                            <label for="advertisement_type" class="form-label">Advertisement Type</label>
                            <select class="form-select seller-type-select" id="advertisement_type" required>
                                <option selected>Select Advertisement Type</option>
                                <option value="seller-general">General Advertisement</option>
                                <option value="seller-properties">Properties Advertisement</option>
                                <option value="seller-job">Job Advertisement</option>
                            </select>
                        </div>
                        <div class="seller-general box">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="general_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="general_name" placeholder="Your product name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_category" class="form-label">Category name</label>
                                    <input type="text" class="form-control" id="general_category" placeholder="Electronics, Bikes, Books, Cloths, Computer, Phones ..." required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="general_thumbnail" class="form-label">Main thumbnail image</label>
                                    <input class="form-control" type="file" id="general_thumbnail" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="general_images" class="form-label">Images (3)</label>
                                    <input class="form-control" type="file" id="general_images" multiple required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_condition" class="form-label">Condition</label>
                                    <input type="text" class="form-control" id="general_condition" placeholder="Product condition" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_brand" class="form-label">Brand</label>
                                    <input type="text" class="form-control" id="general_brand" placeholder="Brand name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_model" class="form-label">Model</label>
                                    <input type="text" class="form-control" id="general_model" placeholder="Model name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_price" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="general_price" placeholder="Your product price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="general_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="seller-general-summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="seller-properties box">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="property_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="property_name" placeholder="Your Property name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="property_category" class="form-label">Category name</label>
                                    <input type="text" class="form-control" id="property_category" placeholder="Home sale, Home rent, Land sale, Land lease ..." required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="property_thumbnail" class="form-label">Main thumbnail image</label>
                                    <input class="form-control" type="file" id="property_thumbnail" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="property_images" class="form-label">Images (3)</label>
                                    <input class="form-control" type="file" id="property_images" multiple required>
                                </div>
                                <div class="col-12">
                                    <label for="property_address" class="form-label">Property Address</label>
                                    <input type="text" class="form-control" id="property_address" placeholder="Your Property address" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="property_condition" class="form-label">Condition</label>
                                    <input type="text" class="form-control" id="property_condition" placeholder="Property condition" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="property_price" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="property_price" placeholder="Your property price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="seller-property-summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="seller-job box">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="job_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="job_name" placeholder="Job name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="job_category" class="form-label">Category name</label>
                                    <input type="text" class="form-control" id="job_category" placeholder="Accounting, Engineering, Healthcare, Management, Labour ..." required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="job_thumbnail" class="form-label">Main thumbnail image</label>
                                    <input class="form-control" type="file" id="job_thumbnail" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="job_images" class="form-label">Images (3)</label>
                                    <input class="form-control" type="file" id="job_images" multiple required>
                                </div>
                                <div class="col-12">
                                    <label for="job_address" class="form-label">Work Place Address</label>
                                    <input type="text" class="form-control" id="job_address" placeholder="Work place address" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="job_salary" class="form-label">Salary Per Month</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="job_salary" placeholder="Job salary per month" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="job_education" class="form-label">Education Level </label>
                                    <input type="text" class="form-control" id="job_education" placeholder="Required education level" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="job_education" class="form-label">Job Type</label>
                                    <select class="form-select" required>
                                        <option selected>Select job type</option>
                                        <option value="Full time">Full time</option>
                                        <option value="Part time">Part time</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="seller-job-summernote" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                            <button class="btn btn-primary post-ad-btn" type="button">Post Advertisement</button>
                        </div>

                    </form>

                </div>



            </div>
            <div class="tab-pane pt-3 fade" id="buyer-ad" role="tabpanel" aria-labelledby="buyer-ad-tab">
                <h2 class="ad-h2">Create Your <span>Buyer Advertisement</span></h2>
                <p class="ad-p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero itaque nobis quos iste sapiente possimus aliquam eligendi explicabo minus officia? Nam laborum incidunt earum, consequuntur expedita explicabo? Nisi, laborum minima.</p>

                <div class="form-section">
                    <form class="row g-3">
                        <h6>USER DETAILS</h6>
                        <hr>

                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Your name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Your last name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email_address" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email_address" placeholder="Your email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="phone_number" placeholder="Your phone number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Town / City</label>
                            <select class="form-select" aria-label="City select" id="city" required>
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

                        <h6 class="mt-5">ADVERTISEMENT DETAILS</h6>
                        <small class="text-muted"> General Advertisement - Ex: Electronics, Bikes, Books, Cloths, Computer, Appliance, Phones, Video games ... </small>
                        <small class="text-muted"> Properties Advertisement - Ex: Home sale, Home rent, Land sale, Land lease ...</small>
                        <small class="text-muted"> Job Advertisement - Ex: Accounting, Engineering, Computer, Healthcare, Management, Labour ...</small>
                        <hr>

                        <div class="col-md-12">
                            <label for="advertisement_type" class="form-label">Advertisement Type</label>
                            <select class="form-select buyer-type-select" id="advertisement_type" required>
                                <option selected>Select Advertisement Type</option>
                                <option value="buyer-general">General Advertisement</option>
                                <option value="buyer-properties">Properties Advertisement</option>
                                <option value="buyer-job">Job Advertisement</option>
                            </select>
                        </div>
                        <div class="buyer-general box">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="general_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="general_name" placeholder="Expected product name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_category" class="form-label">Category name</label>
                                    <input type="text" class="form-control" id="general_category" placeholder="Electronics, Bikes, Books, Cloths, Computer, Phones ..." required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_brand" class="form-label">Brand</label>
                                    <input type="text" class="form-control" id="general_brand" placeholder="Expected Brand name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_model" class="form-label">Model</label>
                                    <input type="text" class="form-control" id="general_model" placeholder="Expected Model name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_min_price" class="form-label">Expected minimum price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="general_min_price" placeholder="Minimum price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="general_max_price" class="form-label">Expected maximum price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="general_max_price" placeholder="Maximum price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="buyer-general-summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="buyer-properties box">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="property_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="property_name" placeholder="Expected Property name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="property_category" class="form-label">Category name</label>
                                    <input type="text" class="form-control" id="property_category" placeholder="Home sale, Home rent, Land sale, Land lease ..." required>
                                </div>

                                <div class="col-12">
                                    <label for="property_address" class="form-label">Expected district</label>
                                    <input type="text" class="form-control" id="property_address" placeholder="Expected Property district" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="property_min_price" class="form-label">Expected minimum price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="property_min_price" placeholder="Minimum price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="property_max_price" class="form-label">Expected maximum price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" id="property_max_price" placeholder="Maximum price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="buyer-property-summernote" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="buyer-job box">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="job_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="job_name" placeholder="Expected job name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="job_category" class="form-label">Category name</label>
                                    <input type="text" class="form-control" id="job_category" placeholder="Accounting, Engineering, Healthcare, Management, Labour ..." required>
                                </div>
                                <div class="col-12">
                                    <label for="job_address" class="form-label">Expected district</label>
                                    <input type="text" class="form-control" id="job_address" placeholder="Expected district" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="job_education" class="form-label">Education Level </label>
                                    <input type="text" class="form-control" id="job_education" placeholder="Education level" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="job_education" class="form-label">Expected Job Type</label>
                                    <select class="form-select" required>
                                        <option selected>Select job type</option>
                                        <option value="Full time">Full time</option>
                                        <option value="Part time">Part time</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" id="buyer-job-summernote" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 d-flex justify-content-md-end justify-content-center">
                            <button class="btn btn-primary post-ad-btn" type="button">Post Advertisement</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>