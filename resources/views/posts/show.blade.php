@extends('layouts.main')

@section('content')
<div class="panel-body">
                    <div class="col-md-12">
        <h3 class="page-header">{!! $post->subject !!} : {!! number_format($post->amount) !!} Php</h3>
        <h4>
            <b>Address : </b>  
            {{ $post->address}}, {{ $post->area}}, {{ $post->city}}   
        </h4>
        
                         <h4 class="description"><b>Description :</b> {!! nl2br($post->description) !!}</h4>
        <i> Added : </i> <b>{{ $post->created_at->diffForHumans() }}</b>                 
    
        
   
        @if(empty($photos))
               <div class="row" style="margin-top:20px;">
                <h4 style="align:center;margin-left:100px;">No images for this listing</h4>
              </div>
        @else
    <hr>    
    <h4 >Photos: </h4>     
            
               <div class="container row" style="margin-top:20px;">
                    @foreach($photos as $photo)
                        <img src="{{ $photo->path }}" alt="" height="120" width="140" class="img-thumbnail"/>
                    @endforeach 
                </div>
            
        @endif 
    
                        
                            <br>
                    @if (Auth::guest())

                        
                    @else
                        @if(count($photos) < 7)
                            <div class="container row col-lg-12">
                                <h4>Add your photos here : </h4>
                                <form id="addPhotosForm" 
                                        action="uploadImage/{{$post->id}}" 
                                        method="POST" class="dropzone">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        @endif
                    @endif
                    
                            <div class="row">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </div>
                    </div>
              
       
    

@endsection

@section('scripts.footer')
    <!--<script src="{{asset('js/dropzone.js')}}"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            
            paramName: 'photo',
            maxFiles: '<?php echo $maxFiles ?>',
            resizeWidth: 600,
            filesizeBase: 1024,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
            
            
        
            /*
            paramName: 'photo',
            //maxFile: 4,
            resizeWidth: 400,
            filesizeBase: 1024,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp',
            //autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 6,
            thumbnailWidth: 120,
            thumbnailHeight: null,
            //addRemoveLinks: true,
            //maxFilesize: 8
            //dictFileTooBig: 'Image is bigger than 8MB'
            //dictRemoveFile: 'Remove',
            //dictDefaultMessage: 'Drop photos here...',
            // The setting up of the dropzone
          */
          
            
        }
    </script>
@stop

