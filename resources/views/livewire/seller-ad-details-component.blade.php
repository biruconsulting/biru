<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">SELLER ADVERTISEMENT DETAIL</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($seller_ad->ad_title) }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="main-detail" wire:ignore>
        <div class="product-detail container my-3">
            <div class="row">
                <!-- left-side -->
                <div class="col-12 col-lg-9">
                    <div class="product-detail-left">
                        <div class="card-wrapper">
                            <div class="card">
                                <!-- card left -->
                                <div class="product-imgs">
                                    <div class="img-display">
                                        <div class="img-showcase">
                                            <img src="{{ asset('storage/'.$seller_ad->ad_thumbnail_image ) }}" alt="Image_1">
                                            @if($seller_ad->ad_images)
                                                @foreach (json_decode($seller_ad->ad_images) as $image)
                                                    <img src="{{ asset('storage/'.$image ) }}" alt="Image_{{ $loop->iteration + 1 }}">     
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="img-select">
                                        @if($seller_ad->ad_images)
                                            <div class="img-item">
                                                <a href="#" data-id="1">
                                                    <img src="{{ asset('storage/'.$seller_ad->ad_thumbnail_image ) }}" alt="Image_1">
                                                </a>
                                            </div>
                                            
                                            @foreach (json_decode($seller_ad->ad_images) as $image)
                                                <div class="img-item">
                                                    <a href="#" data-id="{{ $loop->iteration + 1 }}">
                                                        <img src="{{ asset('storage/'.$image ) }}" alt="Image_{{ $loop->iteration + 1 }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- card right -->
                                <div class="product-content">
                                    <h2 class="product-title">{{ $seller_ad->ad_title }}</h2>
                                    <p><i>{{ 'Posted '.$seller_ad->created_at->diffForHumans() }}, {{ 'From '.$seller_ad->user_district }}</i></p>
                                    <div class="product-price">
                                        @if ($seller_ad->ad_type == 'seller-general')
                                            <p class="fixed-price">Price: <span>{{ 'Rs.'.$seller_ad->ad_price.'.00' }}</span></p>
                                        @elseif ($seller_ad->ad_type == 'seller-property')
                                            <p class="fixed-price">Amount: <span>{{ 'Rs.'.$seller_ad->ad_price.'.00' }}</span></p>
                                        @elseif ($seller_ad->ad_type == 'seller-job')
                                            <p class="fixed-price">Salary: <span>{{ 'Rs.'.$seller_ad->ad_salary.'.00' }}</span></p>
                                        @endif
                                    </div>

                                    <div class="product-detail">
                                        <h4>Short Description: </h4>
                                        <p>{{ $seller_ad->ad_short_description }}</p>
                                        <ul>
                                            @if ($seller_ad->ad_type == 'seller-general')
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Category: <span>{{ $seller_ad->ad_category }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Condition: <span>{{ $seller_ad->ad_condition }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Brand: <span>{{ $seller_ad->ad_brand }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Model: <span>{{ $seller_ad->ad_model }}</span></li>
                                            @elseif ($seller_ad->ad_type == 'seller-property')
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Category: <span>{{ $seller_ad->ad_category }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Condition: <span>{{ $seller_ad->ad_condition }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Property Address: <span>{{ $seller_ad->ad_property_address }}</span></li>
                                            @elseif ($seller_ad->ad_type == 'seller-job')
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Category: <span>{{ $seller_ad->ad_category }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Job Type: <span>{{ $seller_ad->ad_job_type }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Work Address: <span>{{ $seller_ad->ad_work_address }}</span></li>
                                                <li><i class="fas fa-check-circle"></i> &nbsp;Expected Education Level: <span>{{ $seller_ad->ad_education_level }}</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-des">
                            <div class="card">
                                <h2>Description: </h2>
                                <p>{!! $seller_ad->ad_description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- right-side -->
                <div class="col-12 col-lg-3">
                    <div class="product-detail-right">
                        <div class="card">
                            <div class="card-header">
                                Seller Details
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">First name: <span>{{ $seller_ad->user_first_name }}</span></li>
                                <li class="list-group-item">Last name: <span>{{ $seller_ad->user_last_name }}</span></li>
                                <li class="list-group-item">City: <span>{{ $seller_ad->user_district }}</span></li>
                                <li class="list-group-item">Email: <span>{{ $seller_ad->user_email }}</span></li>
                                <li class="list-group-item">Mobile: <span>{{ $seller_ad->user_phone_number }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
