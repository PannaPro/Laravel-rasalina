<?php

namespace App\Http\Controllers;


use App\Models\BlogCategory;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;




class BlogController extends Controller
{
    
    public function BlogPublication(){

        $blogPublication = Blog::latest()->get();
        return view('admin.blog_app.blog_all_publication', compact('blogPublication'));
    }

    public function AddBlogPublication(){

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog_app.blog_add_publication', compact('categories'));

    }


    public function CreatePublication(Request $request){

        $request->validate([

            'blog_title' => 'required',
            
        ],[

            'blog_title.required' => 'Title is Required',

        ]);

    
        $image = $request->file('blog_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(430, 327)->save('upload/blog_img/' . $name_gen);
        $save_url = 'upload/blog_img/' . $name_gen;

        
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        
        $notification = array(
            'message' => 'Publication created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

    }






                    /////////////////////////////////////////////////
                    //////// Контроллер категорий блога   ///////////
                    /////////////////////////////////////////////////
                    public function AllBlogCategory(){

                        $blogCategory = BlogCategory::latest()->get();
                        return view('admin.blog_app.blog_category_all', compact('blogCategory'));
                    } // end method

                    public function AddBlogCategory(){

                        return view('admin.blog_app.blog_category_add');
                    } // end method

                    public function CreateBlogCategory(Request $request){

                        $request->validate([
                            'blog_category' => 'required',
                            
                        ],[
                            'blog_category.required' => 'Category Name is Required',
                        ]);

                        BlogCategory::insert([
                            'blog_category' => $request->blog_category,
                            'created_at' => Carbon::now(),

                        ]);

                        $notification = array(
                            'message' => 'Category Added Successfully',
                            'alert-type' => 'success'
                        );

                        return redirect()->route('blog.category')->with($notification);

                    } // end method

                    public function UpdateBlogCategory($id){

                        $updateCategory = BlogCategory::findOrFail($id);
                        return view('admin.blog_app.blog_category_update', compact('updateCategory'));
                
                    } // end method

                    public function UpdateCategory(Request $request){

                        $request->validate([
                            'blog_category' => 'required',
                            
                        ],[
                            'blog_category.required' => 'Category Name is Required',
                        ]);


                        $blogCategory_id = $request->id;

                        BlogCategory::findOrFail($blogCategory_id)->update([

                            'blog_category' => $request->blog_category,
                            'updated_at' => Carbon::now(),

                        ]);

                        
                        $notification = array(
                            'message' => 'Category Name updated Successfully',
                            'alert-type' => 'success'
                        );

                        return redirect()->route('blog.category')->with($notification);
                    
                    } // end method

                    public function DeleteCategory($id){


                        BlogCategory::findOrFail($id)->delete();
                    
                        $notification = array(
                            'message' => 'Blog Category Deleted Successfuly',
                            'alert-type' => 'success'
                        );
                        
                        return redirect()->route('blog.category')->with($notification);

                    } // end method

                    /////////////////////////////////////////////////
                    /////////////////////////////////////////////////
}
