
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
                   <div class="card-header">Portfolio Update</div>
                     <div class="card-body">
                        <form action=" {{url('portfolio/update/'.$portfolio->id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value=" {{$portfolio->image}} ">
                            <div class="form-group">
                             <label for="ExampleInputEmail">Portfolio Type</label>
                             <input type="text" name="portfolio_type" class="form-control" id="ExampleInputEmail" 
                             aria-describedby="emailHelp"
                             value=" {{$portfolio->type}} ">
                             @error('portfolio_type')
                             <span class="text-danger">{{$message}}</span>
                                 
                             @enderror
                            </div>

                            <div class="form-group my-lg-3">
                             <label for="ExampleInputEmail">Portfolio Image</label>
                             <input type="file" name="portfolio_image" class="form-control my-lg-1" id="ExampleInputEmail" 
                             aria-describedby="emailHelp" >
                            
                             @error('portfolio_image')
                             <span class="text-danger">{{$message}}</span>
                                 
                             @enderror
                            </div>
                            <div>
                                <img src="{{asset($portfolio->image)}}" style="max-width: 400px;max-height:200px;" >
                            </div>
                            <button type="submit" class=" my-1 btn btn-primary">Update</button>
                        </form> 
                         
                     </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection
  
 

