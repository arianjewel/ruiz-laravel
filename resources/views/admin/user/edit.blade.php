<div class="modal fade" id="edit{{$user->id}}">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Edit User Role</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <form action="{{route('user.update')}}" method="post">
	                    @csrf
	                    <div class="form-group">
	                        <label>User Role</label>
	                        <input type="radio" name="role" value="user" {{$user->role == 'user'?'Checked':''}}>
	                        <span>User</span>
	                        <input type="radio" name="role" value="admin" {{$user->role == 'admin'?'Checked':''}}>
	                        <span>Admin</span>
	                    </div>
	                    
	                    <input type="hidden" value="{{$user->id}}" name="id">
	                    <div class="form-group">
	                        <button type="submit" name="btn" class="btn btn-primary">Update Role</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>