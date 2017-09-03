@extends('layouts.main')

@section('content')

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add Photo:
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                     <div class="col-md-4">
        <h1 class="page-header">{!! $post->subject !!}</h1>
        <h4>
            <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $post->address}} 
        </h4>
            <br><i> Posted </i> <b>{{ $post->created_at->diffForHumans() }}</b>
        
        <h3>{!! $post->amount !!}</h3>

        <div class="description">{!! nl2br($post->description) !!}</div>
    </div>
        
    <!div class="col-md-8">
        @if(empty($photos))
            <div class="row" style="margin-top:20px;">
                <h4 style="align:center;margin-left:100px;">No images for this listing</h4>
            </div>
        @else
                            
           <div class="row" style="margin-top:20px;">
                    @foreach($photos as $photo)
                        <img src="{{ $photo->path }}" alt=""/>
                    @endforeach 
                </div>
            
        @endif 
    </div>
                        
                            <br>
                        @if(count($photos) < 10)
                            <div class="col-lg-12">
                                <h3>Add your photos here</h3>
                                <form id="addPhotosForm" 
                                        action="uploadImage/{{$post->id}}" 
                                        method="POST" class="dropzone">
                                    {{ csrf_field() }}
                                </form>
                            </div>
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
                </div>
            </div>
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
            resizeWidth: 300,
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

