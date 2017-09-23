<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PostController extends Controller
{   
    public function __construct(){
        $this->middleware('auth', ['except'=>['index','show','allPosts']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'All';
    }

    public function allPosts(Request $request){
         $listings = Post::all(); 
         
        if (count($listings)) {
            return view('posts.posts', compact('listings'));
            // return $listings;

        }else{
            return "no records!! Please create new listings";
        }
    }

    public function myPosts($id){
        $listings = Post::find($id)->all(); 
        
         //$listings = Post::where('id',$id)->first();
        if (count($listings)) {
            return view('posts.posts', compact('listings'));
            // return $listings;

        }else{
            return "no records!! Please create new listings";
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$files = $request->files->get('photo');
        
        
        //return 'Test';
        //$photo=$request->file('photo');
        
        $id = Auth::user()->id;
        $post = new Post($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();
        
        //$request->session()->flash('Success', 'New listing created successfully!');
        
        ////flash()->success('Success', 'New listing created successfully!');

        //return redirect()->back(); //return back
        return redirect()->route('post.show',['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!empty($id)){
        $post = Post::find($id);
        $photos = $post->photo;
        $maxFiles = 6 - count($photos);
        //echo $photo;    
        return view('posts.show', compact('post','photos','maxFiles'));
        } else {
            //return 'Empty';
        }
        
    }

    


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'Edit :'.$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function uploadImages($id, Request $request){
        
        //$flyer=Flyer::find($id);
        
        $image=$request->file('photo');
        if($image){
            $imageName=$image->getClientOriginalName();
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $submitTime = Carbon::now();
            $email = Auth::user()->email;
            $email = str_replace(array('.', '@'),'-',$email);
                
            $imageName = $email . '-' . $submitTime->format('Y-m-d-H-m-s') . '.' . $extension;
            
            $image->move('img/photos',$imageName);
            //$formInput['image']=$imageName;
            $path = "/img/photos/$imageName";
            //return $path;
            
            //$flyer->photo()->create(['path'=>$path]);
            $photo = new Photo;
            $photo->post_id = $id;
            $photo->path = $path;
            $photo->save();
            
        }
       
        
        return $extension;
        
    }
}
