@extends('layouts.app')
@section('title', "Categories")
@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Guns Names</h4>
                    <a href="{{route('category.create')}}" class="btn btn-outline-primary">Add New</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>ACTIONS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $item)
                                <tr>
                                    <td class="text-bold-500">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-bold-500"><img src="{{ asset('/images/'.$item->image) }}" alt="" width="100" height="100"></td>
                                    <td>
                                        <form action="{{route('category.destroy', $item->id)}}" method="post">
                                            {!! csrf_field() !!}
                                            @method('DELETE')
                                            <a href="{{route('category.edit', $item->id)}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                            <button onclick="return confirm('are you sure?')" class="btn icon btn-danger"><i class="bi bi-x"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
