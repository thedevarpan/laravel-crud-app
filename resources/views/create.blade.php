@extends('layout.master')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
@section('content')
    <div class="container mt-4 d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Create Post</h4>
                </div>
                <div class="card-body">
                    <form id="myForm" action="{{ route('submit.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="postImage" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control" id="postImage"
                                aria-describedby="imageHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="postTitle" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="postTitle"
                                placeholder="Enter title">
                        </div>
                        <label for="" class="form-label">Category</label>
                        <select class="form-select" name="category" aria-label="Default select example">
                            <option selected>Select</option>
                            @foreach ($category as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-group mb-3">
                            <label for="postTitle" class="form-label">Age</label>
                            <input type="text" name="age" class="form-control" id="postTitle"
                                placeholder="Enter title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="postContent" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="postContent" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="postContent" rows="3" placeholder="Enter content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    image: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    age: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    description: {
                        required: true,
                    }


                },
                messages: {
                    image: {
                        required: 'Please Upload Image',
                    },
                    name: {
                        required: 'Please Enter Name',
                    },
                    category: {
                        required: 'Please Select Category',
                    },
                    age: {
                        required: 'Please Enter Age',
                    },
                    address: {
                        required: 'Please Enter Address',
                    },
                    description: {
                        required: 'Please Enter Description',
                    }



                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
