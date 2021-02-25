<div class="container-fluid">
    <!-- Users DataTable -->
    <div class="card shadow mb-4">
      <div class="card-header py-2">
        <div class="row">
          <div class="col-12 col-md-9 mt-2 d-flex justify-content-md-start justify-content-center">
            <p class="m-0 font-weight-bold text-primary">Buyer Property Ad DataTable</p>
          </div>
          <div class="col-12 col-md-3 d-flex justify-content-md-end justify-content-center">
            <input type="text" class="form-control" placeholder="Search..." wire:model="Search">
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered text-center" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>AD Title</th>
                <th>AD Created At</th>
                <th>AD Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($buyer_property_ads as $buyer_property_ad)
                  
                <tr>
                  <td>{{ $buyer_property_ad->id }}</td>
                  <td>{{ $buyer_property_ad->ad_title }}</td>
                  <td>{{ $buyer_property_ad->created_at }}</td>
                  <td>
                    {{-- <a href="#" class="btn btn-danger btn-icon-split"  wire:click.prevent="userDeleteConfirmation({{ $seller_general_ad->id }})">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Delete</span>
                    </a> --}}
                    <a href="{{ route('buyer_ad.details', ['buyer_ad_id'=>$buyer_property_ad->id]) }}" class="btn btn-success btn-circle" title="View">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle" wire:click.prevent="buyerPropertyAdDeleteConfirmation({{ $buyer_property_ad->id }})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
          <div class="w-100" style="margin-left: 0px;">
            {{ $buyer_property_ads->links() }}
          </div>
      </div>
    </div>

  </div>
