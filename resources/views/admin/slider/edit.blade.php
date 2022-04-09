
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
                   <div class="card-header">Slider Update</div>
                    <div class="card-body">
                        <form action=" {{url('slider/update/'.$slider->id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value=" {{$slider->image}} ">
                            <div class="form-group">
                                <label for="brand_title">Slider Title</label>
                                <input type="text" name="slider_title" class="form-control" id="slider_title"
                                    aria-describedby="emailHelp" value=" {{$slider->title}} ">
                                @error('slider_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slider_description">Slider Description</label>
                                <textarea rows="6"  name="slider_description" class="form-control" id="slider_description"
                                    aria-describedby="emailHelp" >

                                {{$slider->description}}
                                @error('slider_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </textarea>
                            </div>


                            <div class="form-group my-3">
                                <label for="slider_image">Slider Image</label>
                            <div class="text-center">
                                <img src="{{asset($slider->image)}}" style="max-width: 1600px;max-height:600px;" >
                            </div>
                                <input type="file" name="slider_image" class="form-control" id="slider_image"
                                    aria-describedby="emailHelp">
                                @error('slider_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class=" my-1 btn btn-primary">Update Slider</button>
                        </form>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection
  
 

