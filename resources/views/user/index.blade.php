@extends('layouts.master')

@section('content')

<div class="">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All User</h3>
        </div>

        <div class="box-body">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>username</th>
                        <th>email</th>
                        <th>modify</th>
                    </tr>
                    
                </thead>

                <tbody>

                    @foreach($users as $us)
                        <tr>
                            <td>{{$us->name}}</td>
                            <td>{{$us->username}}</td>
                            <td>{{$us->email}}</td>
                            <td>
                            <button class="btn btn-info"
                                data-myname="{{$us->name}}"
                                data-myusername="{{$us->username}}"
                                data-myemail="{{$us->email}}"
                                data-myuserid="{{$us->id}}"
                            data-toggle="modal"
                            data-target="#editUser">Edit</button>
                                /
                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>


            </table>				
        </div>
    </div>
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 Add New
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">New User</h4>
  </div>
  <form action="{{url('/cariin/user/store')}}" method="post">
          {{csrf_field()}}
      <div class="modal-body">
            @include('user.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
  </form>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
  </div>
  <form action="{{url('/cariin/user/update')}}" method="post">
          {{-- {{method_field('patch')}} --}}
          {{csrf_field()}}
      <div class="modal-body">
              <input type="hidden" name="user_id" id="user_id" value="">
            @include('user.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
  </form>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
  </div>
  <form action="{{route('category.destroy','test')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
      <div class="modal-body">
            <p class="text-center">
                Are you sure you want to delete this?
            </p>
              <input type="hidden" name="category_id" id="cat_id" value="">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
        <button type="submit" class="btn btn-warning">Yes, Delete</button>
      </div>
  </form>
</div>
</div>
</div>

@endsection