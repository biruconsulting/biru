<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">BUYER ADVERTISEMENTS</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-bar-header text-center mt-3">
            <b>BUYER ADVERTISEMENTS</b>
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
                                                <input class="form-check-input" type="checkbox" value="{{ $general_category->id }}" wire:model="selected_general_category" id="flexCheckGeneralCategory{{ $general_category->id }}">
                                                <label class="form-check-label" for="flexCheckGeneralCategory{{ $general_category->id }}">
                                                    {{ $general_category->name }}
                                                </label>
                                                <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('ad_type', 'buyer-general')->where('ad_category', $general_category->id)->count() }}</span>
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
                                                <input class="form-check-input" type="checkbox" value="{{ $property_category->id }}" wire:model="selected_property_category" id="flexCheckPropertyCategory{{ $property_category->id }}">
                                                <label class="form-check-label" for="flexCheckPropertyCategory{{ $property_category->id }}">
                                                    {{ $property_category->name }}
                                                </label>
                                                <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('ad_type', 'buyer-property')->where('ad_category', $property_category->id)->count() }}</span>
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
                                                    <input class="form-check-input" type="checkbox" value="{{ $job_category->id }}" wire:model="selected_job_category" id="flexCheckPropertyCategory{{ $job_category->id }}">
                                                    <label class="form-check-label" for="flexCheckPropertyCategory{{ $job_category->id }}">
                                                        {{ $job_category->name }}
                                                    </label>
                                                    <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('ad_type', 'buyer-job')->where('ad_category', $job_category->id)->count() }}</span>
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
                            <input class="form-check-input" type="checkbox" value="latest" wire:model="latestPost" id="flexCheckLatest">
                            <label class="form-check-label" for="flexCheckLatest">
                                Latest
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="oldest" wire:model="oldestPost" id="flexCheckOldest">
                            <label class="form-check-label" for="flexCheckOldest">
                                Oldest
                            </label>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="side-bar-location mt-5 mb-4">
                        <h6 class="mb-3">LOCATION</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="jaffna" wire:model="selected_location" id="flexCheckJaffna">
                            <label class="form-check-label" for="flexCheckJaffna">
                                Jaffna
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Jaffna')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kilinochchi" wire:model="selected_location" id="flexCheckKilinochchi">
                            <label class="form-check-label" for="flexCheckKilinochchi">
                                Kilinochchi
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Kilinochchi')->count() }}</span>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="mannar" wire:model="selected_location" id="flexCheckMannar">
                            <label class="form-check-label" for="flexCheckMannar">
                                Mannar
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Mannar')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="mullaitivu" wire:model="selected_location" id="flexCheckMullaitivu">
                            <label class="form-check-label" for="flexCheckMullaitivu">
                                Mullaitivu
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Mullaitivu')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="vavuniya" wire:model="selected_location" id="flexCheckVavuniya">
                            <label class="form-check-label" for="flexCheckVavuniya">
                                Vavuniya
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Vavuniya')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="puttalam" wire:model="selected_location" id="flexCheckPuttalam">
                            <label class="form-check-label" for="flexCheckPuttalam">
                                Puttalam
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Puttalam')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kurunegala" wire:model="selected_location" id="flexCheckKurunegala">
                            <label class="form-check-label" for="flexCheckKurunegala">
                                Kurunegala
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Kurunegala')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="gampaha" wire:model="selected_location" id="flexCheckGampaha">
                            <label class="form-check-label" for="flexCheckGampaha">
                                Gampaha
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Gampaha')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="colombo" wire:model="selected_location" id="flexCheckColombo">
                            <label class="form-check-label" for="flexCheckColombo">
                                Colombo
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Colombo')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kalutara" wire:model="selected_location" id="flexCheckKalutara">
                            <label class="form-check-label" for="flexCheckKalutara">
                                Kalutara
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Kalutara')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="anuradhapura" wire:model="selected_location" id="flexCheckAnuradhapura">
                            <label class="form-check-label" for="flexCheckAnuradhapura">
                                Anuradhapura
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Anuradhapura')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="polonnaruwa" wire:model="selected_location" id="flexCheckPolonnaruwa">
                            <label class="form-check-label" for="flexCheckPolonnaruwa">
                                Polonnaruwa
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Polonnaruwa')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="matale" wire:model="selected_location" id="flexCheckMatale">
                            <label class="form-check-label" for="flexCheckMatale">
                                Matale
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Matale')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kandy" wire:model="selected_location" id="flexCheckKandy">
                            <label class="form-check-label" for="flexCheckKandy">
                                Kandy
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Kandy')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="nuwara eliya" wire:model="selected_location" id="flexCheckNuwaraEliya">
                            <label class="form-check-label" for="flexCheckNuwaraEliya">
                                Nuwara Eliya
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Nuwara Eliya')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="kegalle" wire:model="selected_location" id="flexCheckKegalle">
                            <label class="form-check-label" for="flexCheckKegalle">
                                Kegalle
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Kegalle')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ratnapura" wire:model="selected_location" id="flexCheckRatnapura">
                            <label class="form-check-label" for="flexCheckRatnapura">
                                Ratnapura
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Ratnapura')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="trincomalee" wire:model="selected_location" id="flexCheckTrincomalee">
                            <label class="form-check-label" for="flexCheckTrincomalee">
                                Trincomalee
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Trincomalee')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="batticaloa" wire:model="selected_location" id="flexCheckBatticaloa">
                            <label class="form-check-label" for="flexCheckBatticaloa">
                                Batticaloa
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Batticaloa')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ampara" wire:model="selected_location" id="flexCheckAmpara">
                            <label class="form-check-label" for="flexCheckAmpara">
                                Ampara
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Ampara')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="badulla" wire:model="selected_location" id="flexCheckBadulla">
                            <label class="form-check-label" for="flexCheckBadulla">
                                Badulla
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Badulla')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="monaragala" wire:model="selected_location" id="flexCheckMonaragala">
                            <label class="form-check-label" for="flexCheckMonaragala">
                                Monaragala
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Monaragala')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="hambantota" wire:model="selected_location" id="flexCheckHambantota">
                            <label class="form-check-label" for="flexCheckHambantota">
                                Hambantota
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Hambantota')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="matara" wire:model="selected_location" id="flexCheckMatara">
                            <label class="form-check-label" for="flexCheckMatara">
                                Matara
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Matara')->count() }}</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="galle" wire:model="selected_location" id="flexCheckGalle">
                            <label class="form-check-label" for="flexCheckGalle">
                                Galle
                            </label>
                            <span class="badge bg-primary rounded-pill">{{ $sidebar_buyer_ads_data->where('user_district', 'Galle')->count() }}</span>
                        </div>


                    </div>
                </div>
                <!-- Section: Sidebar -->
            </div>
            
            <div class="col-lg-9 col-12">
                <!-- Section: main -->
                <div class="main-bar">
                    @if(count($buyer_ads) > 0)
                        <div class="row row-cols-1 row-cols-md-3 text-center">
                            @foreach ($buyer_ads as $buyer_ad)
                                <div class="col d-flex justify-content-center p-3">
                                    <div class="buyer-ad card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{ $buyer_ad->ad_title }}</b></h5>
                                            <p class="card-text">{{ $buyer_ad->ad_short_description }}</p>
                                            @if ($buyer_ad->ad_type != 'buyer-job')
                                                @if ($buyer_ad->ad_type == 'buyer-property')
                                                    <h6 class="price-header">Expected Amount</h6>
                                                    <span class="buyer-ad-price">{{ 'Rs.'.$buyer_ad->ad_ex_min_price.'.00'.' - '.'Rs.'.$buyer_ad->ad_ex_max_price.'.00' }}</span>
                                                @else
                                                    <h6 class="price-header">Expected Price</h6>
                                                    <span class="buyer-ad-price">{{ 'Rs.'.$buyer_ad->ad_ex_min_price.'.00'.' - '.'Rs.'.$buyer_ad->ad_ex_max_price.'.00' }}</span>
                                                @endif  
                                            @endif  
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{{ 'Posted '.$buyer_ad->created_at->diffForHumans() }}</small>
                                        </div>
                                        <a href="{{ route('buyer_ad.details',['buyer_ad_id'=>$buyer_ad->id]) }}" class="btn buyer-ad-quickview">QuickView</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else 
                        <div class="h-100 w-100 text-center d-flex justify-content-center">
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="240" alt="empty_post">
                                <h4 class="mt-3">Currently buyer advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <div class="row mt-4">
                        {{ $buyer_ads->links() }}
                    </div>
                </div>
                <!-- Section: main -->
            </div>
        </div>
    </div>
</div>