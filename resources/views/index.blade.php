@extends('layout.master')

@section('content')
    {{-- <h1>Hello Imran</h1> --}}
    <div class="row d-flex justify-content-center mt-4">
        <div>
            <a href="{{ route('create.post') }}" class="btn btn-warning float-end">Create</a>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postData as $value)
                        <tr>
                            <th scope="row">{{ $value->id }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->age }}</td>
                            <td><img style="width: 100px;height:80px" src="{{ asset('upload/' . $value->image) }}"
                                    alt=""></td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->address }}</td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-info">Restore</a>
                                <a href="" class="btn btn-danger mt-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
