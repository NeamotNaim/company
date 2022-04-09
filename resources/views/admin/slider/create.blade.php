@extends('admin/admin_master')
@section('admin_content')
<div class="col-md-12 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container card">
                    <div class="text-md-center">
                        <div class="card-header ">Create Slider</div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('store.slider') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_title">Slider Title</label>
                                <input type="text" name="slider_title" class="form-control" id="slider_title"
                                    aria-describedby="emailHelp">
                                @error('slider_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slider_description">Slider Description</label>
                                <textarea rows="7" name="slider_description" class="form-control" id="slider_description"
                                    aria-describedby="emailHelp">
                                
                                @error('slider_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </textarea>
                            </div>


                            <div class="form-group my-3">
                                <label for="slider_image">Slider Image</label>
                                <input type="file" name="slider_image" class="form-control" id="slider_image"
                                    aria-describedby="emailHelp">
                                @error('slider_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class=" my-1 btn btn-primary">Add Slider</button>
                        </form>




                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection