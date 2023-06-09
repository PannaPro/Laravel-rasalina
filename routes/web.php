<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutSession;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ContactController;



// чтобы обратиться на странице к маршруту без псевдонима name - {{ url('/') }}
// используется метод  url  
Route::get('/', function () {
    return view('frontend.index');
})->name('homeSlide');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');




//////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';









//////////////////////////////////////////////////////////////////////////////////
// контроллер Админ панели

Route::middleware(['auth'])->group(function () { // добавление посредника на группу маршрутов https://laravel.su/docs/8.x/middleware
    
    Route::controller(LogoutSession::class)->group(function () {
        Route::get('logout', 'destroy')->name('admin.logout'); //завершить сессию аутентификации и перейти на страницу авторизации
        Route::get('/admin/profile', 'Profile')->name('admin.profile'); //получить страницу редактирования профиля по id
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile'); //создали путь для обработки метода POST в контроллере
        
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
        
    });

});





//////////////////////////////////////////////////////////////////////////////////
// контроллер страниц пользователя
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/settings', 'SliderSettings')->name('HomeSlider_settings');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');

    Route::get('/back', 'redirectBack')->name('back.step');
});




//////////////////////////////////////////////////////////////////////////////////
// контроллер страницы About 
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'AboutPage')->name('about.page');
    Route::get('/update/about', 'AboutPageSlider')->name('about.slider');
    Route::post('/update/abouts', 'UpdateAboutPage')->name('update.about');
    
    Route::get('/about/images', 'MultiImage')->name('about.images');
    Route::post('/update/about/images', 'UpdateAboutImages')->name('update.about.images');

    Route::get('/about/images/multi', 'AdminMultiImage')->name('multi.images');
    Route::get('/about/images/edit/{id}', 'EditMultiImage')->name('edit.multi.image');

    Route::post('/about/image/update', 'UpdateMultiImages')->name('update.multi.image');
    Route::get('/about/image/delete/{id}', 'DeleteMultiImage')->name('delete.multi.image');

    
});




//////////////////////////////////////////////////////////////////////////////////
// портфолио
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolioPage')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolioPage')->name('add.portfolio');
    Route::post('/portfolio/add', 'EditPortfolioSlide')->name('add.portfolio.slide');

    Route::get('/update/portfolio/{id}', 'UpdatePortfolio')->name('update.portfolio');
    Route::post('/portfolio/update', 'RequestUpdatePortfolio')->name('request.update.portfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');

    Route::get('/portfolio', 'PortfolioPage')->name('portfolio');

    
});



//////////////////////////////////////////////////////////////////////////////////
// Блог / статьи
Route::controller(BlogController::class)->group(function () {
    ///////////////////////////////////////////
    /////// Контроллер категорий блога  ///////
    Route::get('/blog/category/all', 'AllBlogCategory')->name('blog.category');
    Route::get('/blog/category/add', 'AddBlogCategory')->name('add.blog.category');
    Route::post('/blog/category/create', 'CreateBlogCategory')->name('create.blog.category');
    Route::get('/blog/category/update/{id}', 'UpdateBlogCategory')->name('update.category');
    Route::post('/blog/category/update', 'UpdateCategory')->name('update.blog.category');
    Route::get('/category/delete/{id}', 'DeleteCategory')->name('delete.category');
    ////////////////////////////////////////////


    Route::get('/all/blog/publication', 'BlogPublication')->name('admin.all.blog');
    Route::get('/add/blog/publication', 'AddBlogPublication')->name('add.blog');
    Route::post('/create/blog/publication', 'CreatePublication')->name('create.publication');
    Route::get('/edit/blog/publication/{id}', 'UpdateBlogPublication')->name('update.blog');
    Route::post('/update/blog/publication', 'RequestUpdatePublication')->name('request.update.blog');
    Route::get('/delete/blog/publication/{id}', 'DeleteBlogPublication')->name('delete.blog');
    Route::get('/blog/publication/{id}', 'BlogDetails')->name('blog.details');

    Route::get('/blog/category/{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/blog', 'ShowAllBlog')->name('all.blog');
});
    


    //////////////////////////////////////////////////////////////////////////////////
// Блог / статьи
Route::controller(FooterController::class)->group(function () {
    ///////////////////////////////////////////
    /////// Контроллер категорий блога  ///////
    Route::get('/footer/edit', 'FooterSection')->name('footer.section');
    Route::post('/footer/update', 'UpdateFooter')->name('update.footer');
    

});


Route::controller(ContactController::class)->group(function () {

    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/contact/message', 'MessageFromForm')->name('client.message');
    Route::get('/contact/delete/{id}', 'DeleteMessage')->name('delete.message');

});
