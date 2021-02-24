<div class="container-fluid">
    <!-- Users DataTable -->
    <div class="card shadow mb-4">
      <div class="card-header py-2">
        <div class="row">
          <div class="col-12 col-md-9 mt-2 d-flex justify-content-md-start justify-content-center">
            <p class="m-0 font-weight-bold text-primary">User Contact DataTable</p>
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
                <th>Username</th>
                <th>Email</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contact_submissions as $contact_submission)
                  
                <tr>
                  <td>{{ $contact_submission->id }}</td>
                  <td>{{ $contact_submission->username }}</td>
                  <td>{{ $contact_submission->email }}</td>
                  <td>{{ $contact_submission->message }}</td>
                  <td>{{ $contact_submission->created_at }}</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-icon-split"  wire:click.prevent="userContactDeleteConfirmation({{ $contact_submission->id }})">
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
            {{ $contact_submissions->links() }}
          </div>
      </div>
    </div>

  </div>
