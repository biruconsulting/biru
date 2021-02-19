<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">BUYER ADVERTISEMENTS</li>
                    <li class="breadcrumb-item active" aria-current="page">SEARCH RESULT</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-bar-header text-center mt-3">
            <b>SEARCHED BUYER ADVERTISEMENTS</b>
        </div>
        <div class=" my-3">
            <div >
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
                    <div class="h-100 w-100 text-center d-flex align-items-center justify-content-center">
                        <div class="my-4">
                            <img src="{{ asset('storage/images/no_post.svg') }}" height="240" alt="empty_post">
                            <h4 class="mt-3">Sorry, Your searched Ad currently not available.</h4>
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