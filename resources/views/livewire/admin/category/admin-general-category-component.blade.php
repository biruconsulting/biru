<div class="container-fluid">
    <!-- Users DataTable -->
    <div class="card shadow mb-4">
      <div class="card-header py-2">
        <div class="row">
          <div class="col-12 col-md-7 mt-2 d-flex justify-content-md-start justify-content-center">
            <p class="m-0 font-weight-bold text-primary">General Category DataTable</p>
          </div>
          <div class="col-12 col-md-3 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-center">
            <input type="text" class="form-control" placeholder="Search..." wire:model="Search">
          </div>
          <div class="col-12 col-md-2 my-2 my-md-0 d-flex justify-content-md-end justify-content-center">
            <button class="btn btn-primary btn-icon-split" type="button" data-toggle="modal" data-target="#addCategory">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Add Category</span>
            </button>
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
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($general_categories as $general_category)
                  
                <tr>
                  <td>{{ $general_category->id }}</td>
                  <td>{{ $general_category->name }}</td>
                  <td>
                    <a href="#" class="btn btn-danger btn-icon-split"  wire:click.prevent="categoryDeleteConfirmation({{ $general_category->id }})">
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
            {{ $general_categories->links() }}
          </div>
      </div>
    </div>

    <!-- Modal -->
      <div wire:ignore.self class="modal fade" id="addCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="addCategory">
              <div class="modal-body">   
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="category-name"><i class="fas fa-tasks"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Category Name" aria-describedby="category-name" wire:model.defer="name" required>
                </div> 
                @error('name') <span class="error text-danger" style="font-size: 15px;">{{ $message }}</span> @enderror 
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
          </form>
          </div>
        </div>
      </div>
</div>

