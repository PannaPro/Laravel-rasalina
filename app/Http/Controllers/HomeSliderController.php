<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrontSlide;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class HomeSliderController extends Controller
{

    public function SliderSettings()
    {

        // получить в переменную наследованный от главного Кнтроллера метод find с id 1 из модели (базы данных)
        $homeslide = FrontSlide::find(1);

        return view('admin.home_slide.home_slider', compact('homeslide'));

    } //end method 



    public function UpdateSlider(Request $request)
    {

        $slide_id = $request->id;

        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(636, 652)->save('upload/home_img/' . $name_gen);
            $save_url = 'upload/home_img/' . $name_gen;

            
            FrontSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url,

            ]);
            $notification = array(
                'message' => 'Home Slide with image updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);



        } else {
            FrontSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,

            ]);

            // добавили уведомление об успешном обновлении данных
            $notification = array(
                'message' => 'Home Slide updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        }

    } //end method 

}