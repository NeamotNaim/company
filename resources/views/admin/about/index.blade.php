@extends('admin/admin_master')
@section('admin_content')
<div class="row">
    <div class="py-12 col-md-12">

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
                    <div class="card-header ">About us
                        <a href="{{route('add.about')}}" class="btn btn-primary float-right btn-sm">Add about</a></div>
                     
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">About Title</th>
                                    <th scope="col">Short Desc</th>
                                    <th scope="col">Long Desc</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                            $i=1
                        @endphp --}}
                                @foreach ($home_about as $item)
                                    <tr>
                                        <th width="5%" scope="row">{{ $home_about->firstItem() + $loop->index }}</th>
                                        <td width="15%">{{ $item->title }}</td>
                                        <td width="15%">{{ $item->short_des }}</td>
                                        <td width="45%">{{ $item->long_des }}</td>
                                        
                                        <td width="9%">
                                            @if ($item->created_at == null)
                                                <sapn class="text-danger">No data found</sapn>
                                            @else
                                                {{ $item->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td width="15%">
                                            <a href=" {{ url('about/edit/' . $item->id) }} "
                                                class="btn btn-sm btn-info">Edit</a>
                                            <a href=" {{ url('about/delete/' . $item->id) }} "
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure ! you want to delete it') ">Delete</a>
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