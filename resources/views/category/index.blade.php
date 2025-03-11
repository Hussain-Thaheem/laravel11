@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @session('success')
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Categories List
                            <a href="{{url('category/create')}}" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->status ==1 ? 'Visible':'Hidden'}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
                                        <button class="btn btn-info show-category" data-id="{{ $category->id }}">Show</button>
                                   <form action="{{route('category.destroy',$category->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" href="" class="btn btn-danger">Delete</button>
                                   </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Bootstrap Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Category Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="categoryId"></span></p>
                <p><strong>Name:</strong> <span id="categoryName"></span></p>
                <p><strong>Description:</strong> <span id="categoryDescription"></span></p>
                <p><strong>Status:</strong> <span id="categoryStatus"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $(document).on('click', '.show-category', function(){
        var categoryId = $(this).data('id');
       // console.log("Fetching category ID:", categoryId);

        $.ajax({
            url: "/category/" + categoryId,  // Ensure this route exists in web.php
            type: "GET",
            dataType: "json",
            success: function(response) {
              //  console.log("AJAX Response:", response); // Debugging

                $('#categoryId').text(response.id);
                $('#categoryName').text(response.name);
                $('#categoryDescription').text(response.description);
                $('#categoryStatus').text(response.status ? 'Visible' : 'Hidden');

                var categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
                categoryModal.show();
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", xhr.responseText); // Log the exact error
                alert("Failed to load category data.");
            }
        });
    });
});


</script>

@endsection