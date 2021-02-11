<div class="container-fluid">
    <!-- Users DataTable -->
    <div class="card shadow mb-4">
      <div class="card-header py-2">
        <div class="row">
          <div class="col-12 col-md-9 mt-2 d-flex justify-content-md-start justify-content-center">
            <p class="m-0 font-weight-bold text-primary">Users DataTable</p>
          </div>
          <div class="col-12 col-md-3 d-flex justify-content-md-end justify-content-center">
            <input type="text" class="form-control" placeholder="Search..." wire:model="Search">
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                  
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>

                    @if ($user->user_type === 'ADM')
                      <a href="#" class="btn btn-info btn-icon-split" wire:click.prevent="MakeNormalUser({{ $user->id }})">
                        <span class="icon text-white-50">
                          <i class="fas fa-user"></i>
                        </span>
                        <span class="text">Make as a Normal User</span>
                      </a>
                    @else
                      <a href="#" class="btn btn-warning btn-icon-split" wire:click.prevent="makeAdminConfirmation({{ $user->id }})">
                        <span class="icon text-white-50">
                          <i class="fas fa-user-cog"></i>
                        </span>
                        <span class="text">Make as an Admin</span>
                      </a>
                    @endif
                    
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger btn-icon-split"  wire:click.prevent="userDeleteConfirmation({{ $user->id }})">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Delete</span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
          <div class="w-100" style="margin-left: 0px;">
            {{ $users->links() }}
          </div>
      </div>
    </div>

  </div>
