
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
                   <div class="card-header">Contact Message</div>
                    <div class="card-body">
                   
                            <label for="brand_title">Contact Name      :   </lab>
                            <div class="form-group">  
                                <label class="font-weight: 700;">  {{$message->name}}</label>  
                            </div>

                            <label for="brand_title">Contact Email     :   </label>
                            <div class="form-group">  
                                <label class="">  {{$message->email}}</label>  
                            </div>

                            <label for="brand_title">Contact Message     :   </label>
                            <div class="form-group">  
                                <label class="">  {{$message->message}}</label>  
                            </div>




                            <a href="{{url('contact/message/delete/'.$message->id)}}" onclick="return confirm('Are you sure ! you want to delete it') " class=" my-1 btn btn-small  btn-danger">Delete Message</a>
                       
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@endsection
  
 

