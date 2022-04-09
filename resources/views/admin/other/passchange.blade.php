@extends('admin/admin_master')
@section('admin_content')
<div class="card card-default m-md-5">
    <div class="card-header card-header-border-bottom">
        <h2>password Change Form</h2>
    </div>
    <div class="card-body">
        <form action="{{route('password.save')}}" method="POST"  class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input name="oldpassword" type="password" class="form-control" id="current_password" placeholder="Enter Current password">
                @error('oldpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm  Password</label>
                <input type="password" name="confirm_password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
            </div>

            <button type="submit" class="btn btn-primary ">Save</button>
            
        </form>
    </div>
</div>
@endsection