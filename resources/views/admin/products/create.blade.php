@extends('layouts.app')
@section('title', "Add Guns")
@section('content')
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('product.store')}}" class="form form-vertical" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="categories" class="form-label">Categories</label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}" {{old('category') == $item->id ? "selected" : ""}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? ''}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{old('price') ?? ''}}">
                                @error('price')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image" value="{{old('image') ?? ''}}">
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">
                                Save
                            </button>
                            <a href="{{'/product'}}" class="btn btn-danger me-1 mb-1">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
