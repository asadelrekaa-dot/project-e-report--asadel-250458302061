      <div class="modal fade" id="edit{{ $jay->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Data Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('update.category') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $jay->id }}">
                  <input type="text" name="category" value="{{ $jay->category }}" class="form-control" placeholder="Masukan Data Category !">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </form>
        </div>
      </div>