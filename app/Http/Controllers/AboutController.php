<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutImage;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    
    public function AboutPage(){

        return view('frontend.about_page');
    } //end

    public function AboutPageSlider()
    {
        $aboutData = About::find(1);
        return view('admin.home_slide.about_slider', compact('aboutData'));
    } //end


    public function UpdateAboutPage(Request $request){

        
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(530, 605)->save('upload/about_img/' . $name_gen);
            $save_url = 'upload/about_img/' . $name_gen;

            
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'About Page with image updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);



        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            // добавили уведомление об успешном обновлении данных
            $notification = array(
                'message' => 'About Page updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
  
    } //end

    public function MultiImage(){

        return view('admin.about_page.about_images');
    } //end

    public function UpdateAboutImages(Request $request){

        $image = $request->file('multi_image');

        foreach($image as $multi_image){

            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(220, 220)->save('upload/multi_img/' . $name_gen);
            $save_url = 'upload/multi_img/' . $name_gen;

            // метод insert потому что вставляем доп записи в БД., а в других методах мы делали обновление записей update
            AboutImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        } // end foreach

            $notification = array(
                'message' => 'Images added Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    } //end


    public function AdminMultiImage(){

        $multImages = AboutImage::all();
        return view('admin.about_page.about_multi_images', compact('multImages'));
    }

    public function EditMultiImage($id){

        $multiImage = AboutImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function UpdateMultiImages(Request $request){

        $multi_img_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(220, 220)->save('upload/multi_img/' . $name_gen);
            $save_url = 'upload/multi_img/' . $name_gen;

            
            AboutImage::findOrFail($multi_img_id)->update([
                'multi_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Image updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('multi.images')->with($notification);
    } else {
        
        $notification = array(
            'message' => 'No image selected',
            'alert-type' => 'warning'
        );
        
        return redirect()->back()->with($notification);

    }
    }


    public function DeleteMultiImage($id){
        
        // найти и удалить изображение из папки проекта
        $deleteImage = AboutImage::findOrFail($id);
        $img = $deleteImage->multi_image;
        unlink($img);

        // метод delete удалить из БД запись по найденному айди.
        AboutImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image deleted Successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);

    } 
};