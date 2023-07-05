@extends('layouts.app')
@section('title', "Add Category")
@section('content')
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('category.store')}}" class="form form-vertical" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="guns-name-vertical">Guns</label>
                                <input type="text" id="guns-name-vertical" value="{{old('name') ?? ''}}" class="form-control" name="name" placeholder="Guns Name">
                                @error('name')
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
                            <a href="{{'/category'}}" class="btn btn-danger me-1 mb-1">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
