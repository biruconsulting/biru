<div>
    @if (count($user_buyer_ads) > 0)
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>AD Title</th>
                        <th>AD Type</th>
                        <th>AD Created At</th>
                        <th>AD Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_buyer_ads as $user_buyer_ad)
                        <tr>
                            <td>{{ $user_buyer_ad->ad_title }}</td>
                            <td>{{ $user_buyer_ad->ad_type }}</td>
                            <td>{{ $user_buyer_ad->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('buyer_ad.details', ['buyer_ad_id'=>$user_buyer_ad->id]) }}" class="btn btn-success btn-circle" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('buyer_ad.edit', ['buyer_ad_id'=>$user_buyer_ad->id]) }}" class="btn btn-primary btn-circle" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle" wire:click.prevent="buyerAdDeleteConfirmation({{ $user_buyer_ad->id }})" title="Delete">
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
            {{ $user_buyer_ads->links() }}
        </div>
    @else 
        <div class="my-4 text-center">
            <img src="{{ asset('storage/images/no_post.svg') }}" height="140" alt="empty_post">
            <h4 class="mt-3">You did't post any buyer advertisements.</h4>
            <p>Make your advertisement <a href="{{ route('post_ad') }}">here</a>.</p>
        </div>
    @endif
</div>
