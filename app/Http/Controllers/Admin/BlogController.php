<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\BlogRequest;
use Illuminate\Support\Facades\Log;
use Exception;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')->latest()->paginate(3);
        return view('admin.blog.index', compact('blogs'));
    }
    public function create(){
        return view('admin.blog.create');
    }
    public function store(BlogRequest $request)
    {
        try{
            $data = array();
            $data['blog_title'] = $request->blog_title;
            $data['blog_author'] = $request->blog_author;
            $data['blog_description'] = $request->blog_description;
            $data['publish_date'] = $request->publish_date;
            $data['blog_status'] = $request->blog_status;
            $data['created_at'] = Carbon::now();
            DB::table('blogs')->insert($data);
            return redirect(route('blogs.index'))->with('success','New Blog has been Created Successfully');
        }catch(\Exception $e){
            // throw new Exception($e->getMessage()) ;
            Log::info('Blog Store Error: '.$e->getMessage());
            return back()->with('error','New Blog insertion failed !!!');
        }
    }
}
