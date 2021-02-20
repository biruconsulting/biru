<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">BUYER ADVERTISEMENT DETAIL</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($buyer_ad->ad_title) }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="main-detail">
        <div class="product-detail container my-3">
            <div class="row">
                <!-- left-side -->
                <div class="col-12 col-lg-9">
                    <div class="product-detail-left">
                        <div class="card-wrapper">
                            <div class="card buyer_ad_detail_card">
                                <div class="product-content">
                                    <h2 class="product-title">{{ $buyer_ad->ad_title }}</h2>
                                    <p><i>{{ 'Posted '.$buyer_ad->created_at->diffForHumans() }}, {{ 'From '.$buyer_ad->user_district }}</i></p>
                                    <div class="product-price">
                                        @if ($buyer_ad->ad_type != 'buyer-job')
                                            @if ($buyer_ad->ad_type == 'buyer-general')
                                                <p class="fixed-price"> Expected Price: <span>{{ 'Rs.'.$buyer_ad->ad_ex_min_price.'.00' }} - {{ 'Rs.'.$buyer_ad->ad_ex_max_price.'.00' }}</span></p>
                                            @elseif ($buyer_ad->ad_type == 'buyer-property')
                                                <p class="fixed-price"> Expected Amount: <span>{{ 'Rs.'.$buyer_ad->ad_ex_min_price.'.00' }} - {{ 'Rs.'.$buyer_ad->ad_ex_max_price.'.00' }}</span></p>
                                            @endif 
                                        @endif
                                    </div>

                                    <div class="product-detail">
                                        <h4>Short Description: </h4>
                                        <p>{{ $buyer_ad->ad_short_description }}</p>
                                        <ul>
                                            @if ($buyer_ad->ad_type == 'buyer-general')
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Category: <span>{{ $buyer_category->name }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Brand: <span>{{ $buyer_ad->ad_brand }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Model: <span>{{ $buyer_ad->ad_model }}</span></li>
                                            @elseif ($buyer_ad->ad_type == 'buyer-property')
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Category: <span>{{ $buyer_category->name }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Property District: <span>{{ $buyer_ad->ad_ex_district }}</span></li>
                                            @elseif ($buyer_ad->ad_type == 'buyer-job')
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Category: <span>{{ $buyer_category->name }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Job Type: <span>{{ $buyer_ad->ad_ex_job_type }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Work District: <span>{{ $buyer_ad->ad_ex_district }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Education Level: <span>{{ $buyer_ad->ad_ex_education_level }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-des">
                            <div class="card">
                                <h2>Description: </h2>
                                <p>{!! $buyer_ad->ad_description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- right-side -->
                <div class="col-12 col-lg-3">
                    <div class="product-detail-right">
                        @if ($buyer_ad->user_id == Auth::user()->id)
                            <div class="text-center mb-3">
                                <a href="#" class="btn btn-danger btn-icon-split" wire:click.prevent="buyerAdDeleteConfirmation({{ $buyer_ad->id }})" title="Delete">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text"><b>Delete Advertisement</b></span>
                                </a>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                Buyer Details
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">First name: <span>{{ $buyer_ad->user_first_name }}</span></li>
                                <li class="list-group-item">Last name: <span>{{ $buyer_ad->user_last_name }}</span></li>
                                <li class="list-group-item">City: <span>{{ $buyer_ad->user_district }}</span></li>
                                <li class="list-group-item">Email: <span>{{ $buyer_ad->user_email }}</span></li>
                                <li class="list-group-item">Mobile: <span>{{ $buyer_ad->user_phone_number }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
