@extends('layouts.master')

@section('content')

<div class="">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Recipe</h3>
        </div>

        <div class="box-body">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Bahan</th>
                        <th>Yang Buat</th>
                        <th>Action</th>
                        {{-- detail,edit,delete --}}
                    </tr>

                </thead>

                <tbody>
                    @foreach ($recipes as $rcp)
                        <tr>
                            <td>{{$rcp->nama}}</td>
                            <td>{{$rcp->bahan}}</td>
                            <td>{{$rcp->user->name}}</td>
                            <td>
                                    <button class="btn btn-info"
                                        data-recipe="{{$rcp}}"
                                        data-recipebahan="{{$rcp->detail}}"
                                    data-toggle="modal"
                                    data-target="#editRecipe">Edit</button>
                                        /
                                        <button class="btn btn-danger" data-recipeid="{{$rcp->id}}" data-toggle="modal" data-target="#deleteRecipe">Delete</button>
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
    <h4 class="modal-title" id="myModalLabel">New Recipe</h4>
  </div>
  <form action="{{url('/cariin/recipe/store')}}" method="post">
          {{csrf_field()}}
      <div class="modal-body">
            @include('recipe.form')
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
<div class="modal fade" id="editRecipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
  </div>
  <form action="{{url('/cariin/recipe/update')}}" method="post">
          {{-- {{method_field('patch')}} --}}
          {{csrf_field()}}
      <div class="modal-body">
              <input type="hidden" name="recipe_id" id="recipe_id" value="">
              <input type="hidden" name="user_id" id="user_id" value="">
            @include('recipe.form')
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
<div class="modal modal-danger fade" id="deleteRecipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
  </div>
  <form action="{{url('/cariin/recipe/delete')}}" method="post">
          {{method_field('delete')}}
          {{csrf_field()}}
      <div class="modal-body">
            <p class="text-center">
                Are you sure you want to delete this?
            </p>
              <input type="hidden" name="delete_recipe_id" id="delete_recipe_id" value="">

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