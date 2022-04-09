@extends('admin/admin_master')
@section('admin_content')
<div class="col-md-12 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container card">
                    <div class="text-md-center">
                        <div class="card-header ">Create POrtfolio</div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('store.portfolio') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="portfolio_type">Portfolio Type</label>
                                <input type="text" name="portfolio_type" class="form-control" id="portfolio_type"
                                    aria-describedby="emailHelp">
                                @error('portfolio_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="slider_image">Portfolio Image</label>
                                <input multiple="" type="file" name="portfolio_image[]" class="form-control" id="portfolio_image"
                                    aria-describedby="emailHelp">
                                @error('portfolio_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class=" my-1 btn btn-primary">Add Portfolio</button>
                        </form>




                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection