<div>
    @if (count($user_seller_ads) > 0)
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Thumbnail Image</th>
                        <th>AD Title</th>
                        <th>AD Type</th>
                        <th>AD Created At</th>
                        <th>AD Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_seller_ads as $user_seller_ad)
                        <tr>
                            <th><img src="{{ asset('storage/'.$user_seller_ad->ad_thumbnail_image) }}" height="50" alt="{{ $user_seller_ad->ad_title }}"></th>
                            <td>{{ $user_seller_ad->ad_title }}</td>
                            <td>{{ $user_seller_ad->ad_type }}</td>
                            <td>{{ $user_seller_ad->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('seller_ad.details', ['seller_ad_id'=>$user_seller_ad->id]) }}" class="btn btn-success btn-circle" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle" wire:click.prevent="sellerAdDeleteConfirmation({{ $user_seller_ad->id }})" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        <hr>
        <div class="row mt-4">
            {{ $user_seller_ads->links() }}
        </div>
    @else 
        <div class="my-4 text-center">
            <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
            <h4 class="mt-3">You did't post any seller advertisements.</h4>
            <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
        </div>
    @endif
</div>
