@extends('admin/admin_master')
@section('admin_content')
<div class="row">
    <div class="py-12 col-md-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-warning alert-dismissible show fade" role="alert">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container text-md-center">
                    <div class="card-header">All Brand</div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                            $i=1
                        @endphp --}}
                                @foreach ($brands as $item)
                                    <tr>
                                        <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                        <td>{{ $item->brand_name }}</td>
                                        <td><img src="{{ asset($item->brand_image) }}" style="width:50px;height:30px;"
                                                alt=""></td>
                                        <td>
                                            @if ($item->created_at == null)
                                                <sapn class="text-danger">No data found</sapn>
                                            @else
                                                {{ $item->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href=" {{ url('brand/edit/' . $item->id) }} "
                                                class="btn btn-sm btn-info">Edit</a>
                                            <a href=" {{ url('brand/delete/' . $item->id) }} "
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure ! you want to delete it') ">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container card">
                    <div class="text-md-center">
                        <div class="card-header ">Add Brand</div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('store.brand') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" id="brand_name"
                                    aria-describedby="emailHelp">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group my-3">
                                <label for="brand_image">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control" id="brand_image"
                                    aria-describedby="emailHelp">
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class=" my-1 btn btn-primary">Add Brand</button>
                        </form>




                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection