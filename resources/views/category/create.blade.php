@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Create Categories
                            <a href="{{url('category')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')<span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Description</label>
                                <textarea rows="3" type="text" name="description" class="form-control"></textarea>
                                @error('description')<span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>     <br/>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" value="1" style="width:20px; height: 20px;"/>    Checked = Visible. unchecked=hidden
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
