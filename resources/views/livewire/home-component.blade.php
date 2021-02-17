<div class="container">

    <!-- carousel -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://static.livebooks.com/abc61dbc6e9c403b917975eb48d2d97d/i/f2c81f819c994f5eb2312f9948520c2a/1/4SoifmQp7LJ6yDtMuFY2x/Swan-Optic-22089.jpg" width="100%" height="100%" alt="">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <a class="btn btn-lg btn-primary" href="seller_ad_detail.html" role="button">See more</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b55e?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OXx8cHJvZHVjdHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" width="100%" height="100%" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <a class="btn btn-lg btn-primary" href="seller_ad_detail.html" role="button">See more</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://neilpatel.com/wp-content/uploads/2018/05/ecommerce-product-images.jpg" width="100%" height="100%" alt="">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <a class="btn btn-lg btn-primary" href="seller_ad_detail.html" role="button">See more</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <!-- carousel - end -->


    <!-- All Seller ADs in OWL carousel -->
    <div class="ad-quickview-card-bar">
        <div class="bar-card card">
            <div class="card-header">
                SELLER ADVERTISEMENTS
            </div>
            <div class="bar-card-body card-body">
                @if (count($seller_ads) > 0)
                    <div class="owl-carousel owl-theme">
                        @foreach ($seller_ads as $seller_ad)
                            <div class="item">
                                <div class="seller-ad card">
                                    <img src="{{ asset('storage/'. $seller_ad->ad_thumbnail_image) }}" class="card-img-top" alt="{{ $seller_ad->ad_title }}">
                                    <a href="{{ route('seller_ad.details', ['ad_id'=>$seller_ad->id]) }}" class="btn seller-ad-quickview">QuickView</a>
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
                                        <small class="text-muted">{{ 'Posted '.$seller_ad->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach                 
                    </div>
                @else
                    <div class="my-4">
                        <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                        <h4 class="mt-3">Currently seller advertisements are not available.</h4>
                        <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('seller_ad') }}" class="btn seller-ad-footer-button">SEE MORE &nbsp;<i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
    <!-- All Seller ADs in OWL carousel - end -->


    <!-- All Buyer ADs in OWL carousel -->
    <div class="ad-quickview-card-bar">
        <div class="bar-card card">
            <div class="card-header">
                BUYER ADVERTISEMENTS
            </div>
            <div class="bar-card-body card-body">
                @if (count($buyer_ads) > 0)
                    <div class="owl-carousel owl-theme">
                        @foreach ($buyer_ads as $buyer_ad)
                            <div class="item">
                                <div class="buyer-ad card">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{ $buyer_ad->ad_title }}</b></h5>
                                        <p class="card-text">{{ $buyer_ad->ad_short_description }}</p>
                                        @if ($buyer_ad->ad_type != 'job')
                                            <h6 class="price-header">Expected Price</h6>
                                            <span class="buyer-ad-price">{{ 'Rs.'.$buyer_ad->ad_ex_min_price.'.00'.' - '.'Rs.'.$buyer_ad->ad_ex_max_price.'.00' }}</span>
                                        @endif                  
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">{{ $buyer_ad->created_at->diffForHumans() }}</small>
                                    </div>
                                    <a href="buyer_ad_detail.html" class="btn buyer-ad-quickview">QuickView</a>
                                </div>
                            </div>
                        @endforeach      
                    </div>
                @else 
                    <div class="my-4">
                        <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                        <h4 class="mt-3">Currently buyer advertisements are not available.</h4>
                        <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('buyer_ad') }}" class="btn seller-ad-footer-button">SEE MORE &nbsp;<i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
    <!-- All Buyer ADs in OWL carousel - end -->

    <!-- All Seller ADs Category in OWL carousel -->
    <div class="ad-quickview-card-bar">
        <div class="bar-card card">
            <div class="card-header">
                SELLER ADVERTISEMENT MAJOR CATEGORIES
            </div>
            <div class="bar-card-body card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="seller-general-tab" data-bs-toggle="tab" href="#seller-general" role="tab" aria-controls="seller-general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seller-properties-tab" data-bs-toggle="tab" href="#seller-properties" role="tab" aria-controls="seller-properties" aria-selected="false">Properties</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seller-job-tab" data-bs-toggle="tab" href="#seller-job" role="tab" aria-controls="seller-job" aria-selected="false">Job</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="seller-general" role="tabpanel" aria-labelledby="seller-general-tab">
                        @if(count($seller_general_ads) > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($seller_general_ads as $seller_general_ad)
                                    <div class="item">
                                        <div class="seller-ad card">
                                            <img src="{{ asset('storage/'. $seller_general_ad->ad_thumbnail_image) }}" class="card-img-top" alt="{{ $seller_general_ad->ad_title }}">
                                            <a href="{{ route('seller_ad.details', ['ad_id'=>$seller_general_ad->id]) }}" class="btn seller-ad-quickview">QuickView</a>
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $seller_general_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $seller_general_ad->ad_short_description }}</p>
                                                <h6>Price: <span>{{ 'Rs.'.$seller_general_ad->ad_price.'.00' }}</span></h6>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $seller_general_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach 
                            </div> 
                        @else 
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                                <h4 class="mt-3">Currently seller general advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        @endif         
                    </div>
                    <div class="tab-pane fade" id="seller-properties" role="tabpanel" aria-labelledby="seller-properties-tab">
                        @if(count($seller_property_ads) > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($seller_property_ads as $seller_property_ad)
                                    <div class="item">
                                        <div class="seller-ad card">
                                            <img src="{{ asset('storage/'. $seller_property_ad->ad_thumbnail_image) }}" class="card-img-top" alt="{{ $seller_property_ad->ad_title }}">
                                            <a href="{{ route('seller_ad.details', ['ad_id'=>$seller_property_ad->id]) }}" class="btn seller-ad-quickview">QuickView</a>
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $seller_property_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $seller_property_ad->ad_short_description }}</p>
                                                <h6>Amount: <span>{{ 'Rs.'.$seller_ad->ad_price.'.00' }}</span></h6>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $seller_property_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach     
                            </div>
                        @else 
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                                <h4 class="mt-3">Currently seller property advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="seller-job" role="tabpanel" aria-labelledby="seller-job-tab">
                        @if(count($seller_job_ads) > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($seller_job_ads as $seller_job_ad)
                                    <div class="item">
                                        <div class="seller-ad card">
                                            <img src="{{ asset('storage/'. $seller_job_ad->ad_thumbnail_image) }}" class="card-img-top" alt="{{ $seller_job_ad->ad_title }}">
                                            <a href="{{ route('seller_ad.details', ['ad_id'=>$seller_job_ad->id]) }}" class="btn seller-ad-quickview">QuickView</a>
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $seller_job_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $seller_job_ad->ad_short_description }}</p>
                                                <h6>Salary: <span>{{ 'Rs.'.$seller_job_ad->ad_salary.'.00' }}</span></h6>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $seller_job_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach  
                            </div>
                        @else 
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                                <h4 class="mt-3">Currently seller job advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('seller_ad') }}" class="btn seller-ad-footer-button">SEE MORE &nbsp;<i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
    <!-- All Seller ADs category in OWL carousel - end -->

    <!-- All Buyer ADs category in OWL carousel -->
    <div class="ad-quickview-card-bar">
        <div class="bar-card card">
            <div class="card-header">
                BUYER ADVERTISEMENT MAJOR CATEGORIES
            </div>
            <div class="bar-card-body card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="wants-general-tab" data-bs-toggle="tab" href="#wants-general" role="tab" aria-controls="wants-general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="wants-properties-tab" data-bs-toggle="tab" href="#wants-properties" role="tab" aria-controls="wants-properties" aria-selected="false">Properties</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="wants-job-tab" data-bs-toggle="tab" href="#wants-job" role="tab" aria-controls="wants-job" aria-selected="false">Job</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="wants-general" role="tabpanel" aria-labelledby="wants-general-tab">
                        @if(count($buyer_general_ads) > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($buyer_general_ads as $buyer_general_ad)
                                    <div class="item">
                                        <div class="buyer-ad card">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $buyer_general_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $buyer_general_ad->ad_short_description }}</p>
                                                @if ($buyer_general_ad->ad_type != 'job')
                                                    <h6 class="price-header">Expected Price</h6>
                                                    <span class="buyer-ad-price">{{ 'Rs.'.$buyer_general_ad->ad_ex_min_price.'.00'.' - '.'Rs.'.$buyer_general_ad->ad_ex_max_price.'.00' }}</span>
                                                @endif  
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $buyer_general_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                            <a href="buyer_ad_detail.html" class="btn buyer-ad-quickview">QuickView</a>
                                        </div>
                                    </div>
                                @endforeach   
                            </div>
                        @else 
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                                <h4 class="mt-3">Currently buyer general advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="wants-properties" role="tabpanel" aria-labelledby="wants-properties-tab">
                        @if(count($buyer_property_ads) > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($buyer_property_ads as $buyer_property_ad)
                                    <div class="item">
                                        <div class="buyer-ad card">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $buyer_property_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $buyer_property_ad->ad_short_description }}</p>
                                                @if ($buyer_property_ad->ad_type != 'job')
                                                    <h6 class="price-header">Expected Price</h6>
                                                    <span class="buyer-ad-price">{{ 'Rs.'.$buyer_property_ad->ad_ex_min_price.'.00'.' - '.'Rs.'.$buyer_property_ad->ad_ex_max_price.'.00' }}</span>
                                                @endif  
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $buyer_property_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                            <a href="buyer_ad_detail.html" class="btn buyer-ad-quickview">QuickView</a>
                                        </div>
                                    </div>
                                @endforeach   
                            </div>
                        @else 
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                                <h4 class="mt-3">Currently buyer property advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="wants-job" role="tabpanel" aria-labelledby="wants-job-tab">
                        @if(count($buyer_job_ads) > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($buyer_job_ads as $buyer_job_ad)
                                    <div class="item">
                                        <div class="buyer-ad card">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $buyer_job_ad->ad_title }}</b></h5>
                                                <p class="card-text">{{ $buyer_job_ad->ad_short_description }}</p>
                                                @if ($buyer_job_ad->ad_type != 'job')
                                                    <h6 class="price-header">Expected Price</h6>
                                                    <span class="buyer-ad-price">{{ 'Rs.'.$buyer_job_ad->ad_ex_min_price.'.00'.' - '.'Rs.'.$buyer_job_ad->ad_ex_max_price.'.00' }}</span>
                                                @endif  
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">{{ $buyer_job_ad->created_at->diffForHumans() }}</small>
                                            </div>
                                            <a href="buyer_ad_detail.html" class="btn buyer-ad-quickview">QuickView</a>
                                        </div>
                                    </div>
                                @endforeach   
                            </div>
                        @else 
                            <div class="my-4">
                                <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
                                <h4 class="mt-3">Currently buyer job advertisements are not available.</h4>
                                <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('buyer_ad') }}" class="btn seller-ad-footer-button">SEE MORE &nbsp;<i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
    <!-- All Buyer ADs category in OWL carousel - end -->

</div>