<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About;
use App\Models\PortfolioModel;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function PortfolioPage(){

        $portfolioData = PortfolioModel::latest()->get();
        return view('admin.portfolio.all_portfolio', compact('portfolioData'));
    }

    public function AddPortfolioPage(){
        
        return view('admin.portfolio.add_portfolio');

    }

    public function EditPortfolioSlide(Request $request){

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            
        ],[
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
        ]);
    
        $image = $request->file('portfolio_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1020, 519)->save('upload/portfolio_img/' . $name_gen);
        $save_url = 'upload/portfolio_img/' . $name_gen;

        

        PortfolioModel::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_image' => $save_url,
            'portfolio_description' => $request->portfolio_description,
            'created_at' => Carbon::now(),

        ]);

        
        $notification = array(
            'message' => 'Portfolio Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);

    }

    public function UpdatePortfolio($id){
        
        $updatePortfolio = PortfolioModel::findOrFail($id);
        return view('admin.portfolio.update_portfolio', compact('updatePortfolio'));
 
    }

    public function RequestUpdatePortfolio(Request $request){

        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1020, 519)->save('upload/portfolio_img/' . $name_gen);
            $save_url = 'upload/portfolio_img/' . $name_gen;

            
            PortfolioModel::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Portfolio updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);



        } else {
            PortfolioModel::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);

            // добавили уведомление об успешном обновлении данных
            $notification = array(
                'message' => 'Portfolio without image updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.portfolio')->with($notification);
        }
    }

    public function DeletePortfolio($id){

        $deletePortfolio = PortfolioModel::findOrFail($id);
        $img = $deletePortfolio->portfolio_image;
        unlink($img);
    
        // метод delete удалить из БД запись по найденному айди.
        PortfolioModel::findOrFail($id)->delete();
    

        $notification = array(
            'message' => 'Portfolio Deleted Successfuly',
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.portfolio')->with($notification);
    }

    
}
