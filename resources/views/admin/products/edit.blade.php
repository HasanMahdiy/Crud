@extends('layouts.app')
@section('title', "Organize Guns")
@section('content')
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('product.update', $item->id)}}" class="form form-vertical" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="categories" class="form-label">Categories</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $k)
                                    <option value="{{$k->id}}"
                                    @if($k->id == $item->category_id || old('category') == $k->id)
                                       selected
                                    @endif>{{$k->name}}</option>
                                @endforeach
                            </select>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="guns-name-vertical">Guns</label>
                                <input type="text" id="guns-name-vertical" value="{{ old('name') ?? $item->name }}" class="form-control" name="name" placeholder="Guns Name">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" value="{{ old('price') ?? $item->price  }}" class="form-control">
                                @error('price')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">Image</label>
                                <img src="{{ asset( '/images/'.$item->image) }}" width="100" height="100">
                                <input class="form-control" type="file" id="image" name="image" value="">
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
