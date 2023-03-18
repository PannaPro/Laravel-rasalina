<?php

namespace App\Http\Controllers;


use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    
    








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
