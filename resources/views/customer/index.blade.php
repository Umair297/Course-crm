@extends('home')
@section('content')

<style>
   .text-white{
      color: white;
   }
</style>

<div class="container mt-3">
      <div class="text-end my-2">
        <a data-bs-toggle="modal" data-bs-target="#addcustomer" class="btn btn-primary text-white">
            <span class="svg-icon svg-icon-2">
                <i class="ti ti-plus me-2"></i>
            </span>
            Add Custmer
        </a>

        <a data-bs-toggle="modal" data-bs-target="#addtwocustomer" class="btn btn-primary text-white">
         <span class="svg-icon svg-icon-2">
             <i class="ti ti-plus me-2"></i>
         </span>
         Add Remaing Custmer
     </a>
    </div>


   <!--Crete Modal -->
<div class="modal fade" id="addcustomer" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
         </div>
         <form action="{{route('customer-save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             <label>Import File</label>
             <input type="file" name="file" class="form-control">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="modal fade" id="addtwocustomer" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Add Customer Remaining</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
         </div>
         <form action="{{route('customer-two-save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             <label>Import File</label>
             <input type="file" name="file" class="form-control">
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Submit</button>
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
                        <th>GDC Number</th>
                        <th>Status</th>
                        <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($customers as $index => $customer)
                  <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                        <td>{{$customer->gdc_number}}</td>
                        <td><a href="{{route('customer.status',['id' => $customer->id])}}">
                           @if($customer->status == null)
                                 <span class="badge bg-label-dark me-1 status-toggle" data-id="{{ $customer->id }}">No Status</span>
                           @elseif($customer->status == 'Complete')
                                 <span class="badge bg-label-success me-1 status-toggle" data-id="{{ $customer->id }}">Complete</span>
                           @else
                                 <span class="badge bg-label-danger me-1 status-toggle" data-id="{{ $customer->id }}">Incomplete</span>
                           @endif
                        </a>
                        </td>
                        
                        
                        <td>
                           
                        <a href="{{ route('comment.index', ['id' => $customer->id]) }}">
                           <i class="ti ti-message-2"></i>
                        </a>

                        <a href="#" data-bs-toggle="modal" data-bs-target="#viewcustomer{{$customer->id}}">
                           <i class="ti ti-eye"></i>
                        </a>
                        
                           <a href="#" data-bs-toggle="modal" data-bs-target="#editcustomer{{$customer->id}}">
                              <i class="ti ti-edit"></i>
                           </a>
                           <a href="{{ route('customer-delete', ['id' => $customer->id]) }}" class="text-danger">
                              <i class="ti ti-trash"></i>
                           </a>  
                        </td>
                  </tr>
                     {{-- Edit Customer Model --}}
               <div class="modal fade" id="editcustomer{{$customer->id}}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title mb-3" id="exampleModalLabel1">Update Customer</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                        </div>
                        <form action="{{route('customer-update')}}" method="post">
                           @csrf
                           <div class="modal-body" style="padding: 0px !important">
                              <input type="hidden" name="id" value="{{$customer->id}}">
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{$customer->first_name}}" required>
                                 </div>
                                 <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{$customer->last_name}}" required>
                                 </div>
                              </div>
                              
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label>GDC Number</label>
                                    <input type="text" name="gdc_number" class="form-control" value="{{$customer->gdc_number}}" required>
                                 </div>
                                 <div class="col-md-6">
                                    <label>Course Date</label>
                                    <input type="text" name="course_date" class="form-control" value="{{$customer->course_date}}" required>
                                 </div>
                              </div>
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label >Email Address</label>
                                    <input type="text" name="email_address" class="form-control" value="{{$customer->email_address}}" require>
                                 </div>
                                 <div class="col-md-6">
                                    <label >On Portal</label>
                                    <input type="text" name="on_portal" class="form-control" value="{{$customer->on_portal}}" require>
                                 </div>
                              </div>
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label >Design</label>
                                    <input type="number" name="design" class="form-control" value="{{$customer->design}}" require>
                                 </div>
                                 <div class="col-md-6">
                                    <label >Refine</label>
                                    <input type="number" name="refine" class="form-control" value="{{$customer->refine}}" require>
                                 </div>
                              </div>
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label >direct</label>
                                    <input type="number" name="direct" class="form-control" value="{{$customer->direct}}" require>
                                 </div>
                                 <div class="col-md-6">
                                    <label >InDirect</label>
                                    <input type="number" name="inDirect" class="form-control" value="{{$customer->inDirect}}" require>
                                 </div>
                              </div>
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label >Styloso</label>
                                    <input type="number" name="styloso" class="form-control" value="{{$customer->styloso}}" require>
                                 </div>
                                 <div class="col-md-6">
                                    <label >Flo</label>
                                    <input type="number" name="flo" class="form-control" value="{{$customer->flo}}" require>
                                 </div>
                              </div>
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label >Solo</label>
                                    <input type="number" name="solo" class="form-control" value="{{$customer->solo}}" require>
                                 </div>
                                 <div class="col-md-6">
                                    <label >Align</label>
                                    <input type="number" name="align" class="form-control" value="{{$customer->align}}" require>
                                 </div>
                              </div>
                              <div class="row m-2">
                                 <div class="col-md-6">
                                    <label >Follow up</label>
                                    <input type="date" name="follow_up" class="form-control" value="{{$customer->follow_up}}" require>
                                 </div>
                                 <div class="col-md-6">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                       <option value="Complete" {{ $customer->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                                       <option value="Incomplete" {{ $customer->status == 'Incomplete' ? 'selected' : '' }}>Incomplete</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update Customer</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               {{-- End Edit Model --}}

               {{-- View Customer Modal --}}
               <div class="modal fade" id="viewcustomer{{$customer->id}}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel1">View Customer</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body my-5" style="padding: 0px !important">
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label>First Name</label>
                                 <input type="text" name="first_name" readonly class="form-control" value="{{$customer->first_name}}" required>
                              </div>
                              <div class="col-md-6">
                                 <label>Last Name</label>
                                 <input type="text" name="last_name" readonly class="form-control" value="{{$customer->last_name}}" required>
                              </div>
                           </div>
                           
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label>GDC Number</label>
                                 <input type="text" name="gdc_number" readonly class="form-control" value="{{$customer->gdc_number}}" required>
                              </div>
                              <div class="col-md-6">
                                 <label>Course Date</label>
                                 <input type="text" name="course_date" readonly class="form-control" value="{{$customer->course_date}}" required>
                              </div>
                           </div>
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label >Email Address</label>
                                 <input type="text" name="email_address" readonly class="form-control" value="{{$customer->email_address}}" require>
                              </div>
                              <div class="col-md-6">
                                 <label >On Portal</label>
                                 <input type="text" name="on_portal" readonly class="form-control" value="{{$customer->on_portal}}" require>
                              </div>
                           </div>
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label >Design</label>
                                 <input type="number" name="design" readonly class="form-control" value="{{$customer->design}}" require>
                              </div>
                              <div class="col-md-6">
                                 <label >Refine</label>
                                 <input type="number" name="refine" readonly class="form-control" value="{{$customer->refine}}" require>
                              </div>
                           </div>
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label >direct</label>
                                 <input type="number" name="direct" readonly class="form-control" value="{{$customer->direct}}" require>
                              </div>
                              <div class="col-md-6">
                                 <label >InDirect</label>
                                 <input type="number" name="inDirect" readonly class="form-control" value="{{$customer->inDirect}}" require>
                              </div>
                           </div>
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label >Styloso</label>
                                 <input type="number" name="styloso" readonly class="form-control" value="{{$customer->styloso}}" require>
                              </div>
                              <div class="col-md-6">
                                 <label >Flo</label>
                                 <input type="number" name="flo" readonly class="form-control" value="{{$customer->flo}}" require>
                              </div>
                           </div>
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label >Solo</label>
                                 <input type="number" name="solo" readonly class="form-control" value="{{$customer->solo}}" require>
                              </div>
                              <div class="col-md-6">
                                 <label >Align</label>
                                 <input type="number" name="align" readonly class="form-control" value="{{$customer->align}}" require>
                              </div>
                           </div>
                           <div class="row m-2">
                              <div class="col-md-6">
                                 <label >Follow up</label>
                                 <input type="date" name="follow_up" readonly class="form-control" value="{{$customer->follow_up}}" require>
                              </div>
                              <div class="col-md-6">
                                 <label>Status</label>
                                 <select name="status" readonly class="form-control" required>
                                    <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Complete</option>
                                    <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>Incomplete</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               {{-- End Customer Modal --}}

                  @endforeach
               </tbody>
            </table>
      </div>
   </div>
</div>
</div>


@endsection