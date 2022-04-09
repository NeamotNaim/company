
   @extends('admin/admin_master')
   @section('admin_content')
  <div class="row">
       <div class="py-12 col-md-8">
           
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
                   <div class="card-header">Brand Update</div>
                     <div class="card-body">
                        <form action=" {{url('brand/update/'.$brands->id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value=" {{$brands->brand_image}} ">
                            <div class="form-group">
                             <label for="ExampleInputEmail">Brand Name</label>
                             <input type="text" name="brand_name" class="form-control" id="ExampleInputEmail" 
                             aria-describedby="emailHelp"
                             value=" {{$brands->brand_name}} ">
                             @error('brand_name')
                             <span class="text-danger">{{$message}}</span>
                                 
                             @enderror
                            </div>

                            <div class="form-group my-lg-3">
                             <label for="ExampleInputEmail">Brand Image</label>
                             <input type="file" name="brand_image" class="form-control my-lg-1" id="ExampleInputEmail" 
                             aria-describedby="emailHelp" >
                            
                             @error('brand_image')
                             <span class="text-danger">{{$message}}</span>
                                 
                             @enderror
                            </div>
                            <div>
                                <img src="{{asset($brands->brand_image)}}" style="max-width: 400px;max-height:200px;" >
                            </div>
                            <button type="submit" class=" my-1 btn btn-primary">Update</button>
                        </form> 
                         
                     </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection
  
 

