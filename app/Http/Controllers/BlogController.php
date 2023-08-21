<?php
namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str ;

class BlogController extends Controller
{
    public function index(){
        $blogs=blog::all();
        return view('admin.blog.index' , compact('blogs'));
    }
    public function store(){
        return view('admin.blog.create');
    }
    public function create(Request $request){
      
            $data = $request->only('title' , 'description');
            $data['user_id']=auth()->user()->id;
           $data['slug']= Str::slug($request->title);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $image->move('images/blogs/', $fileName);
            $data['image'] = $fileName;
            
        }
          Blog::create($data);
          return redirect('blogs');

    }
   
    public function destory($id){
        $blog=Blog::find($id);
        $blog->delete();
        return back();
    }
    public function edit($id){
        $blog=Blog::find($id);
        return view('admin.blog.edit' , compact('blog'));
    }
    /////////////////////////////////
    public function update(Request $request , Blog $blog){
        $data = $request->only('title' , 'description');
        $data['user_id']=auth()->user()->id;
       $data['slug']= Str::slug($request->title);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $extension;
        $image->move('images/blogs/', $fileName);
        $data['image'] = $fileName;
        
    }
    // dd($blog->id);
    //  dd($data);

    $blog->update($data);
    $notification = array(
        'message' => 'Blog has been update successfully.',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.blog.index')->with($notification);

    }
}
