<?php

namespace yuridik\Http\Controllers\Web;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use yuridik\Http\Requests;

class BlogController extends Controller
{
     
    public function showBlogList(){

        $blogs=Blog::orderBy('id', 'desc')->paginate(3);
      
        return view('blogs.bloglist')->with('blogs', $blogs);
    }
    public function show($id){
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('blogs.blog_show')->withBlog($blog)->withTags($tags2);
    }
  

}
