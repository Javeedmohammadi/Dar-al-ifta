
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AjaxSearchControlller;
use App\Http\Controllers\SendEmailController;
use App\Models\SuggestObjection;
use App\Http\Controllers\ScholarsController;
use App\Http\Controllers\ArticalController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\SuggestObjectionController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::redirect('/', '/ps/main_page');
Route::group(['prefix' => '{language}'], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home.go');

    Route::get('/main_page', function () {
        $sugg = SuggestObjection::paginate(3);
        if (!DB::table('users')->where('email', 'romannajib20@gmail.com')->exists()) {
            User::create(
                [
                    'name' => 'رومان نجیب',
                    'email' => 'romannajib20@gmail.com',
                    'password' => Hash::make('romannajib'),
                    'role' => '1',
                ]
            );
            Alert::success('پاملرنه!', '.لومړنی کارونکی اضافه شو');
        }

        return view('main_page', compact('sugg'));
    })->name('main_page.go');

    Route::get('/search', [AjaxSearchControlller::class, 'search'])
        ->name('person.search');

    Route::get('/sendEmail/{id}', [SendEmailController::class, 'send_email']);


    Auth::routes(['register' => false]);
    Route::controller(HomeController::class)
        ->group(
            function () {
                Route::get('/home', 'index')
                    ->name('home')
                    ->middleware('auth');
            }
        );

    //=== Route groups ==//
    Route::controller(PersonController::class)
        ->group(
            function () {

                Route::get('/people', 'index')
                    ->name('people')
                    ->middleware(['auth']);

                Route::get('/people_create', 'create')
                    ->name('people.create');

                Route::post('/person', 'store')
                    ->name('store.person');

                Route::get('/person/{person_id}/details', 'edit')
                    ->name('person.add_detail')
                    ->middleware('auth');

                Route::post('person/{pseron_id}/updateDetail', 'update')
                    ->name('person.update.detail')
                    ->middleware('auth');

                Route::delete('/persondelete/{id}', 'destroy')
                    ->name('remove.person')
                    ->middleware(['auth', 'isAdmin']);

                // getting a all records ...
                Route::get("/getall", 'getAll')
                    ->name('person.get.all');

                // getting a single record ...
                Route::get("/singleFullDetails/{id}", 'getOne')
                    ->name('person.get_detail');
            }
        );

    Route::controller(ScholarsController::class)
        ->group(
            function () {
                Route::get('/show_scholars', 'show')
                    ->name('show.scholar');

                Route::get('/scholar_index', 'index')
                    ->name('scholar.index')
                    ->middleware(['auth', 'isAdmin']);

                Route::get('/create_scholar', 'create')
                    ->name('create.scholar')
                    ->middleware(['auth', 'isAdmin']);

                Route::post('/scholar', 'store')
                    ->name('store.scholar')
                    ->middleware(['auth', 'isAdmin']);

                Route::get('/edit_scholar/{id}', 'edit')
                    ->name('edit.scholar')
                    ->middleware(['auth', 'isAdmin']);

                Route::put('/store_edit_scholar/{scholars}', 'store_edited')
                    ->name('store.edit.scholar')
                    ->middleware(['auth', 'isAdmin']);


                Route::delete('/remove_scholar/{scholars}', 'destroy')
                    ->name('remove.scholar')
                    ->middleware('auth');
            }
        );

    Route::controller(ArticalController::class)
        ->group(
            function () {
                Route::get('/show_articals', 'show')
                    ->name('show.articals');

                Route::get('/artical_index', 'index')
                    ->name('artical.index')
                    ->middleware(['auth', 'isAdmin']);

                Route::get('/create_artical', 'create')
                    ->name('create.artical')
                    ->middleware(['auth', 'isAdmin']);

                Route::post('/articals', 'store')
                    ->name('store.artical')
                    ->middleware(['auth', 'isAdmin']);

                Route::delete('remove_artical/{artical}', 'destroy')
                    ->name('remove.artical')
                    ->middleware(['auth', 'isAdmin']);
            }
        );

    Route::controller(SuggestObjectionController::class)
        ->group(
            function () {
                Route::get('/show_suggest_objection', 'show')
                    ->name('show.suggest.objection');

                Route::post('/suggest_objection', 'store')
                    ->name('store.sug_obj');

                Route::get('/suggest_index', 'index')
                    ->name('show.suggest.index')
                    ->middleware(['auth', 'isAdmin']);

                Route::delete('/remove_suggest/{id}', 'destory')
                    ->name('remove.suggest')
                    ->middleware(['auth', 'isAdmin']);
            }
        );


    Route::controller(InformationController::class)
        ->group(
            function () {
                Route::get('/create_information', 'create')
                    ->name('create.information')
                    ->middleware(['auth', 'isAdmin']);

                Route::post('/information', 'store')
                    ->name('store.informatino')
                    ->middleware(['auth', 'isAdmin']);

                Route::get('/show_information', 'show')
                    ->name('show.information');

                Route::get('/info_index', 'index')
                    ->name('index.info')
                    ->middleware(['auth', 'isAdmin']);

                Route::delete('/remove_info/{id}', 'destroy')
                    ->name('remove.info')
                    ->middleware(['auth', 'isAdmin']);
            }
        );

    Route::controller(UserController::class)
        ->group(
            function () {

                Route::get('/not_admin', 'notAdmin')
                    ->name('user.not.admin')
                    ->middleware('auth');

                Route::get('/create/new_system_user', 'create')
                    ->name('create.system.user')
                    ->middleware(['auth', 'isAdmin']);

                Route::post('/store/system_user', 'store_create')
                    ->name('store.new.system.user')
                    ->middleware(['auth', 'isAdmin']);

                Route::get('/show_system_users', 'index')
                    ->name('show.system.users')
                    ->middleware(['auth', 'isAdmin']);

                Route::get('/edit/{id}/system_users', 'edit')
                    ->name('edit.system.users')
                    ->middleware(['auth', 'isAdmin']);

                Route::put('/store/edited_user/{id}', 'store')
                    ->name('user.edit.store')
                    ->middleware(['auth', 'isAdmin']);

                Route::delete('/delete_system_user/{id}', 'destroy')
                    ->name('remove.system.user')
                    ->middleware(['auth', 'isAdmin']);
            }
        );
});
