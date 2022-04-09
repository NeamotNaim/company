@extends('admin/admin_master')
@section('admin_content')
<div class="col-md-12 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container card">
                    <div class="text-md-center">
                        <div class="card-header ">Create Contact </div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('store.contact') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_title">Contact Address</label>
                                <input type="text" name="contact_address" class="form-control" id="contact_address"
                                    aria-describedby="emailHelp">
                                @error('contact_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_short_des">Contact Email</label>
                                <input type="email"  name="contact_email" class="form-control" id="contact_email"
                                    aria-describedby="emailHelp">
                                
                                @error('contact_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                            </div>

                            <div class="form-group">
                                <label for="about_long_des">Contact Phone</label>
                                <input type="text" name="contact_phone" class="form-control" id="contact_phone"
                                    aria-describedby="emailHelp">
                                
                                @error('contact_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                            </div>

                            <button type="submit" class=" my-1 btn btn-primary">Add Contact</button>
                        </form>




                    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection