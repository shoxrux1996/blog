<?php

namespace yuridik\Http\Controllers\Web;
use yuridik\Comment;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use yuridik\Http\Requests;

class BlogController extends Controller
{
     
    public function showBlogList(){

        $blogs=Blog::orderBy('id', 'desc')->paginate(4);
        $blog_pop = Blog::orderBy('count', 'desc')->limit(4)->get();
        $blog_recent = Blog::orderBy('id', 'desc')->limit(4)->get();
        $comments= Comment::orderBy('id', 'desc')->limit(4)->get();

        return view('blogs.bloglist')->with('blogs', $blogs)->withBlog_pop($blog_pop)->withBlog_recent($blog_recent)->withComments($comments);
    }
    public function show($id){
        $blog = Blog::find($id);
        $blog->count++;
        $blog->save();
        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        $blogs =Blog::orderBy('id', 'desc')->limit(3)->get();
        return view('blogs.blog_show')->withBlog($blog)->withTags($tags2)->withBlogs($blogs);
    }
  

}
