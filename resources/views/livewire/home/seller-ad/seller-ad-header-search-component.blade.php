<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">SELLER ADVERTISEMENTS</li>
                    <li class="breadcrumb-item active" aria-current="page">SEARCH RESULT</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-bar-header text-center mt-3">
            <b>SEARCHED SELLER ADVERTISEMENTS</b>
        </div>
        <div class="row my-3">
            <div class="col-lg-3 col-12">
                <!-- Section: Sidebar -->
                <div class="side-bar">
                    <!-- Search Widget -->
                    <div class="input-group side-bar-search mt-3">
                        <input type="text" class="form-control" placeholder="Search..." wire:model="Search">
                        <span class="input-group-text" id="side-bar-search"><i class="fas fa-search"></i></span>
                    </div>
                    
                    <!-- Major Category -->
                    <div class="side-bar-categories mt-5">
                        <h6>MAJOR CATEGORIES</h6>

                        <div wire:ignore class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        General
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush">
                                    <div class="accordion-body">
                                        @foreach ($general_categories as $general_category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $general_category->id }}" wire:model="selected_general_category">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $general_category->name }}
                                                </label>
                                                <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('ad_type', 'seller-general')->where('ad_category', $general_category->id)->count() }}</span>
                                            </div>
                                        @endforeach 
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Properties
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush">
                                    <div class="accordion-body">
                                        @foreach ($property_categories as $property_category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $property_category->id }}" wire:model="selected_property_category" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $property_category->name }}
                                                </label>
                                                <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('ad_type', 'seller-property')->where('ad_category', $property_category->id)->count() }}</span>
                                            </div>
                                        @endforeach   
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Jobs
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush">
                                    <div class="accordion-body">
                                        <div class="accordion-body">
                                            @foreach ($job_categories as $job_category)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{ $job_category->id }}" wire:model="selected_job_category" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $job_category->name }}
                                                    </label>
                                                    <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('ad_type', 'seller-job')->where('ad_category', $job_category->id)->count() }}</span>
                                                </div>
                                            @endforeach                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="side-bar-sort mt-4">
                        <h6 class="mb-3">SORT BY</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="latest" wire:model="latestPost" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Latest
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="oldest" wire:model="oldestPost" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Oldest
                            </label>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="side-bar-location mt-5 mb-4">
                        <h6 class="mb-3">LOCATION</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="jaffna" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Jaffna
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Jaffna')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kilinochchi" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kilinochchi
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Kilinochchi')->count() }}</span>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="mannar" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Mannar
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Mannar')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="mullaitivu" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Mullaitivu
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Mullaitivu')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="vavuniya" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Vavuniya
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Vavuniya')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="puttalam" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Puttalam
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Puttalam')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kurunegala" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kurunegala
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Kurunegala')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="gampaha" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Gampaha
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Gampaha')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="colombo" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Colombo
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Colombo')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kalutara" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kalutara
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Kalutara')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="anuradhapura" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Anuradhapura
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Anuradhapura')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="polonnaruwa" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Polonnaruwa
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Polonnaruwa')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="matale" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Matale
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Matale')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kandy" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kandy
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Kandy')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="nuwara eliya" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Nuwara Eliya
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Nuwara Eliya')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kegalle" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kegalle
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Kegalle')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ratnapura" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ratnapura
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Ratnapura')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="trincomalee" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Trincomalee
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Trincomalee')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="batticaloa" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Batticaloa
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Batticaloa')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ampara" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ampara
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Ampara')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="badulla" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Badulla
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Badulla')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="monaragala" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Monaragala
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Monaragala')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="hambantota" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Hambantota
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Hambantota')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="matara" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Matara
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Matara')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="galle" wire:model="selected_location" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Galle
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_seller_ads_data->where('user_district', 'Galle')->count() }}</span>
                        </div>


                    </div>
                </div>
                <!-- Section: Sidebar -->
            </div>
            <div class="col-lg-9 col-12">
                <!-- Section: main -->
                <div class="main-bar"> 
                    @if(count($seller_ads) > 0)
                        <div class="row row-cols-1 row-cols-md-3 text-center">
                            @foreach ($seller_ads as $seller_ad)
                                    <div class="col d-flex justify-content-center p-3">
                                        <div class="seller-ad card">
                                            <img src="{{ asset('storage/'. $seller_ad->ad_thumbnail_image) }}" class="card-img-top" alt="{{ $seller_ad->ad_title }}">
                                            <a href="{{ route('seller_ad.details', ['seller_ad_id'=>$seller_ad->id]) }}" class="btn seller-ad-quickview">QuickView</a>
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $seller_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $seller_ad->ad_short_description }}</p>
                                                @if($seller_ad->ad_type == 'seller-job')
                                                    <h6>Salary: <span>{{ 'Rs.'.$seller_ad->ad_salary.'.00' }}</span></h6>
                                                @elseif($seller_ad->ad_type == 'seller-property')
                                                    <h6>Amount: <span>{{ 'Rs.'.$seller_ad->ad_price.'.00' }}</span></h6>
                                                @else 
                                                    <h6>Price: <span>{{ 'Rs.'.$seller_ad->ad_price.'.00' }}</span></h6>
                                                @endif
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $seller_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    @else 
                    <div class="h-100 w-100 text-center d-flex justify-content-center">
                        <div class="my-4">
                            <img src="{{ asset('storage/images/no_post.svg') }}" height="240" alt="empty_post">
                            <h4 class="mt-3">Sorry, Your searched seller Ad currently not available.</h4>
                            <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                        </div>
                    </div>
                    @endif 
                    <hr>
                    <div class="row mt-4">
                        {{ $seller_ads->links() }}
                    </div>
                </div>
                <!-- Section: main -->
            </div>
        </div>
    </div>
</div>