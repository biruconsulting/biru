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
        <div class="my-3">
            <div>
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
                    <div class="h-100 w-100 text-center d-flex align-items-center justify-content-center">
                        <div class="my-4">
                            <img src="{{ asset('storage/images/no_post.svg') }}" height="240" alt="empty_post">
                            <h4 class="mt-3">Currently seller advertisements are not available.</h4>
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