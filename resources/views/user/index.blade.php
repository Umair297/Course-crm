@extends('home')
@section('content')

<div class="container mt-3">
      <div class="text-end my-2">
        <a data-bs-toggle="modal" data-bs-target="#adduser" class="btn btn-primary text-white">
            <span class="svg-icon svg-icon-2">
                <i class="ti ti-plus me-2"></i>
            </span>
            Add User
        </a>
    </div>


   <!--Crete Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add User</h5>
            <button
               type="button"
               class="btn-close"
               data-bs-dismiss="modal"
               aria-label="Close"
               ></button>
         </div>
         <form action="{{route('user-save')}}" method="post">
            @csrf
            <div class="modal-body">
               <div class="row m-2">
                  <label >Name</label>
                  <input type="text" name="name" class="form-control" require>
               </div>
               <div class="row m-2">
                  <label >Email</label>
                  <input type="email" name="email" class="form-control" require>
               </div>
               <div class="row m-2">
                  <label >Password</label>
                  <input type="password" name="password" class="form-control" require>
               </div>
               <div class="row m-2">
                  <label >Role</label>
                  <select name="role" class="form-control">
                     <option value="User">User</option>
                     <option value="Admin">Admin</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
               Close
               </button>
               <button type="submit" class="btn btn-primary">Create User</button>
            </div>
         </form>
      </div>
   </div>
</div>







    <div class="row ">
        <div class="card col">
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edituser{{$user->id}}">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="{{ route('user-delete', ['id' => $user->id]) }}" class="text-danger">
                                    <i class="ti ti-trash"></i>
                                </a>  
                            </td>
                        </tr>

<div class="modal fade" id="edituser{{$user->id}}" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
            <button
               type="button"
               class="btn-close"
               data-bs-dismiss="modal"
               aria-label="Close"
               ></button>
         </div>
         <form action="{{ route('user-update', ['id' => $user->id]) }}" method="post">
            @csrf
            <div class="modal-body">
               <div class="row m-2">
                  <label >Name</label>
                  <input type="text" name="name" class="form-control" require value="{{$user->name}}">
               </div>
               <div class="row m-2">
                  <label >Email</label>
                  <input type="email" name="email" class="form-control" require value="{{$user->email}}">
               </div>
               <div class="row m-2">
                  <label >Password</label>
                  <input type="password" name="password" class="form-control">
               </div>
               <div class="row m-2">
                  <label >Role</label>
                  <select name="role" class="form-control">
                     <option value="User" @if($user->role == 'User') selected @endif>User</option>
                     <option value="Admin" @if($user->role == 'Admin') selected @endif>Admin</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
               Close
               </button>
               <button type="submit" class="btn btn-primary">Update User</button>
            </div>
         </form>
      </div>
   </div>
</div>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection