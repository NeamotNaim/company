@extends('admin/admin_master')
@section('admin_content')
<div class="col-md-12 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container card">
                    <div class="text-md-center">
                        <div class="card-header ">Create About us</div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('store.about') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_title">About  Title</label>
                                <input type="text" name="about_title" class="form-control" id="about_title"
                                    aria-describedby="emailHelp">
                                @error('about_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_short_des">About Short Description</label>
                                <textarea rows="4" name="about_short_des" class="form-control" id="about_short_des"
                                    aria-describedby="emailHelp">
                                
                                @error('about_short_des')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_long_des">About Long Description</label>
                                <textarea rows="7" name="about_long_des" class="form-control" id="about_long_des"
                                    aria-describedby="emailHelp">
                                
                                @error('about_long_des')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </textarea>
                            </div>

                            <button type="submit" class=" my-1 btn btn-primary">Add About</button>
                        </form>




                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection