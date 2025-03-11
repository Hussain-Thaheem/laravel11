@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Categories
                            <a href="{{url('category')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label >Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                @error('name')<span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label >Description</label>
                                <textarea rows="3" type="text" name="description" class="form-control" >{!!$category->description!!}</textarea>
                                @error('description')<span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>     <br/>
                            <div class="mb-3">
                                <label >Status</label>
                                <input type="hidden" name="status" value="0">
<input type="checkbox" name="status" value="1" {{ $category->status == 1 ? 'checked' : '' }} style="width:20px; height:20px;"/> Checked = Visible. Unchecked = Hidden.
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
