@extends('layouts.main')

@section('content')

    <div class="wrapper">
        <div class="page-wrapper" style="margin:10px;">
            <!-- <div class="form-group input-group" style="padding-top:5px;padding-bottom:5px;">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div> -->
            
            <div class="row">
                @foreach ($listings as $listing)
                <div class="col-md-12 well">
                    <div class="col-md-2">
                        @if (count($listing->photo) > 0)
                            <img src="{{ $listing->photo->first()->path }}" alt="Photo" width="120px"/>
                        @else
                            <img src="{{asset('img/sbdefault.png')}}" alt="" width="120px"/>
                        @endif
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                        <div class="col-md-6">
                        <h4><a href="/post/{!! $listing->id !!}"> {!! $listing->subject !!} </a> : {{ number_format($listing->amount) }} Php</h4>
                        <p>{!! str_limit(nl2br($listing->description), 500) !!}</p>
                        <p>{!! str_limit(nl2br($listing->address), 500) !!}</p>
                        <p>{!! str_limit(nl2br($listing->area), 500) !!} - {!! str_limit(nl2br($listing->city), 500) !!}</p>
                        </div>
                        <div class="col-md-6">
                        @if (!empty($listing->user->name))
                            <p>Seller : {!! $listing->user->name !!}</p>
                        @endif
                        @if (!empty($listing->user->officeno))
                            <p>Tel : {!! $listing->user->officeno !!}</p>
                        @endif
                        @if (!empty($listing->user->mobileno1))
                            <p>Mobile : {!! $listing->user->mobileno1 !!}</p>
                        @endif
                        @if (!empty($listing->user->email))
                            <p>Email : {!! $listing->user->email !!}</p>
                        @endif
                        @if (!empty($listing->user->website))
                            <p>Website : {!! $listing->user->website !!}</p>
                        @endif
                        @if (!empty($listing->user->skype))
                            <p>Skype : {!! $listing->user->skype !!}</p>
                        @endif
                        </div>
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection