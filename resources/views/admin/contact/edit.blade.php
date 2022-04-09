
   @extends('admin/admin_master')
   @section('admin_content')
  <div class="row">
       <div class="py-12 col-md-12">
           
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
           <div class="alert alert-warning alert-dismissible show fade" role="alert"> 
          <strong> {{session('success')}} </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container ">
                   <div class="card-header">Contact  Update</div>
                    <div class="card-body">
                        <form action=" {{url('contact/update/'.$contact->id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_title">Contact Address</label>
                                <input value="{{$contact->address}}" type="text" name="contact_address" class="form-control" id="contact_address"
                                    aria-describedby="emailHelp">
                                @error('contact_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_short_des">Contact Email</label>
                                <input value="{{$contact->email}}" type="email"  name="contact_email" class="form-control" id="contact_email"
                                    aria-describedby="emailHelp">
                                
                                @error('contact_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                            </div>

                            <div class="form-group">
                                <label for="about_long_des">Contact Phone</label>
                                <input value="{{$contact->phone}}" type="text" name="contact_phone" class="form-control" id="contact_phone"
                                    aria-describedby="emailHelp">
                                
                                @error('contact_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            
                            </div>


                            <button type="submit" class=" my-1 btn btn-primary">Update Contact</button>
                        </form>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection
  
 

