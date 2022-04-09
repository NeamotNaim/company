
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
                   <div class="card-header">About  Update</div>
                    <div class="card-body">
                        <form action=" {{url('about/update/'.$home_about->id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="brand_title">About Title</label>
                                <input type="text" name="about_title" class="form-control" id="about_title"
                                    aria-describedby="emailHelp" value=" {{$home_about->title}} ">
                                @error('about_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_short_description">About Short Description</label>
                                <textarea rows="6"  name="about_short_description" class="form-control" id="about_short_description"
                                    aria-describedby="emailHelp" >

                                {{$home_about->short_des}}
                                @error('about_short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </textarea>
                            </div>

                            <div class="form-group">
                                <label for="about_long_description">About Long Description</label>
                                <textarea rows="6"  name="about_long_description" class="form-control" id="about_long_description"
                                    aria-describedby="emailHelp" >

                                {{$home_about->long_des}}
                                @error('about_long_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </textarea>
                            </div>


                            <button type="submit" class=" my-1 btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection
  
 

