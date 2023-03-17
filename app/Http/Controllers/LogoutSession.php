<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class LogoutSession extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array (
            'message' => 'Profile Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function Profile()
    {
        // in order to show profile data for defind user for id
        // you need to use User model and pass finded user id to variable
        $id = Auth::user()->id;

        $adminData = User::find($id); //here we got acsess to data from database. They passed as an array to adminData variable
        // Get acsess can to call properties <h4 class="card-title">User Name : {{ $adminData->username }} </h4>
        // User model handles (обрабатывает) data as an array. 


        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;

        $editData = User::find($id);
    
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request)
    {
        // для работы с отдельным айди пользователя из БД. Как и прежде получаем в переменную из модели User
        $id = Auth::user()->id;
        $data = User::find($id);

        //Перезаписываем взятые из БД имена на новые, которые храняться и передаются в контроллер классом $request 
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        //4 тип в БД это изображение, здесь мы проверяем передано ли новое изображение , если да
        if($request->file('profile_image')) {

        //обращаемся к полученному файлу в input html формы
            $file = $request->file('profile_image');

        // чтобы избежать конфликта одинаковых имен изображений, добавляем к оригинальному имени дату.
        // тем самым записывая всегда уникальную информацию в БД
            $filename = date('YmdHi').$file->getClientOriginalName();

        // методом move передаем в папку полученное изображение 
            $file->move(public_path('upload/profile_images'), $filename);

        // присваиваем новое значение по ключу массива полученных из POST запроса
        // аналогично         $data->name = $request->name;
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array (
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }


    public function ChangePassword()
    {
        return view('admin.change_profile_password');
    }


    public function UpdatePassword(Request $request){
        
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        }
        else {
            session()->flash('message', 'Old Password is not mutch');
            return redirect()->back();
        }
        
    }

}
