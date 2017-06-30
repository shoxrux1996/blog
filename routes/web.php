<?php

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.request.confirm');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::prefix('blogs')->group(function(){
        Route::get('/delete/{id}', 'Admin\AdminBlogController@destroy')->name('admin.blog.delete');

        Route::get('/editform/{id}','Admin\AdminBlogController@editform')->name('admin.blog.edit');
        Route::post('edit/{id}','Admin\AdminBlogController@edit')->name('admin.blog.edit.submit');
        Route::get('/', 'Admin\AdminBlogController@showBlogList')->name('admin.blogs');
        Route::get('/show/{id}', 'Admin\AdminBlogController@show')->name('admin.blog.show');
    });
    Route::prefix('tags')->group(function(){

        Route::get('edit/{id}', 'Admin\AdminTagController@edit')->name('admin.tag.edit');
        Route::put('/update/{id}', 'Admin\AdminTagController@update')->name('admin.tag.update');

        Route::delete('/delete/{id}', 'Admin\AdminTagController@destroy')->name('admin.tag.delete');
        Route::get('/insertform', 'Admin\AdminTagController@insertForm')->name('admin.tag.insert');
        Route::post('/insert', 'Admin\AdminTagController@insert')->name('admin.tag.insert.submit');

        Route::get('/', 'Admin\AdminTagController@taglist')->name('admin.tags.index');
        Route::get('/{id}', 'Admin\AdminTagController@show')->name('admin.tag.showeach');
    });

    Route::prefix('category')->group(function(){
		Route::get('/info', 'Admin\AdminCategoryController@index')->name('category.info');
		Route::get('/insert', 'Admin\AdminCategoryController@create');
		Route::post('/insert/submit', 'Admin\AdminCategoryController@store')->name('category.insert.submit');
		Route::get('delete/{id}', 'Admin\AdminCategoryController@destroy')->name('category.delete');
	});

   
});

Route::prefix('user')->group(function(){
	Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
	Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
	Route::post('/logout', 'Auth\UserLoginController@userLogout')->name('user.logout');
	Route::get('/register', 'Auth\UserRegisterController@showRegistrationForm')->name('user.register');
	Route::post('/register', 'Auth\UserRegisterController@postRegister')->name('user.register.submit');
	Route::get('/register/verify/{code}', 'Auth\UserRegisterController@confirm')->name('user.register.confirm');
	Route::get('/password/reset', 'Auth\UserLoginController@showLinkRequestForm')->name('user.password.request');
	Route::post('/password/email', 'Auth\UserLoginController@userfinder')->name('user.password.email');

});

Route::prefix('client')->group(function(){
	Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset')->name('client.password.request');
	Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm')->name('client.password.reset');
	Route::get('/', 'Client\ClientController@index')->name('client.dashboard');
	Route::get('/settings/info', 'Client\ClientController@info')->name('client.info');
	Route::post('/update/{id}', 'Client\ClientController@update')->name('client.update');

    Route::prefix('question')->group(function(){
        Route::get('/create', 'Client\ClientQuestionController@create')->name('question.create');
        Route::post('/insert', 'Client\ClientQuestionController@store')->name('question.insert.submit');
    });


    
    Route::prefix('blogs')->group(function(){
	 	
	 	Route::get('/show/{id}', 'Admin\AdminBlogController@show')->name('client.blog.show');
	});
});

Route::prefix('lawyer')->group(function(){
    Route::get('/', 'Lawyer\LawyerController@index')->name('lawyer.dashboard');
//	Route::post('/password/email', 'Auth\LawyerForgotPasswordController@sendResetLinkEmail')->name('lawyer.password.email');
	Route::post('/password/reset', 'Auth\LawyerResetPasswordController@reset')->name('lawyer.password.request');
	Route::get('/password/reset/{token}', 'Auth\LawyerResetPasswordController@showResetForm')->name('lawyer.password.reset');
    Route::get('/settings/info', 'Lawyer\LawyerController@info')->name('lawyer.info');
    Route::post('/update/{id}', 'Lawyer\LawyerController@update')->name('lawyer.update');
    
    Route::prefix('blogs')->group(function(){
        Route::get('/insertform','Lawyer\LawyerBlogController@insertform')->name('lawyer.blog.insert');
        Route::post('/create','Lawyer\LawyerBlogController@store')->name('lawyer.blog.submit');
        
    });
    Route::prefix('comment')->group(function(){
        Route::post('/{blog_id}', 'Lawyer\LawyerCommentController@store')->name('lawyer.comment.store');
    });
    Route::post('answer/create/{question_id}', 'Lawyer\LawyerAnswerController@store')->name('lawyer.answer.store');

});

Route::prefix('question_info')->group(function (){
    Route::get('/list', 'Web\QuestionController@index')->name('question.list');
    Route::get('/show/{id}', 'Web\QuestionController@show')->name('web.question.show');
});

Route::prefix('lawyer_info')->group(function(){
    Route::get('/category/{name}', 'Web\CategoryController@show')->name('search.lawyers.bycategory');
    Route::get('/city/{name}', 'Web\CityController@show')->name('search.lawyers.bycity');
    Route::get('/', 'Web\LawyersInfoController@showLawyersList')->name('lawyers.list');
});
Route::prefix('blogs_info')->group(function(){
	Route::get('/', 'Web\BlogController@showBlogList')->name('web.blogs');
    Route::get('/show/{id}', 'Web\BlogController@show')->name('web.blog.show');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');








//Route::get('bloglist','BlogController@blog_list');
//Route::get('insertform','BlogController@insertform');
//Route::post('create','BlogController@store');
//Route::get('editform/{id}','BlogController@show');
//Route::post('edit/{id}','BlogController@edit');
//Route::get('delete/{id}','BlogController@destroy');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*


Route::get('ID/{id}', function ($id) {
  echo 'ID: '.$id.' Shokhrukh Shomakhmudov';
});


Route::get('role',[
'middleware' => 'Role:editor',
'uses' => 'TestController@index',
]);

Route::get('terminate',[
	'middleware'=> 'terminate',
	'uses' => 'ABCController@index',
	]);

Route::get('/usercontroller/path',[
	'middleware' => 'First',
	'uses' => 'UserController@showPath',
	]);


class SHOX{
	public $foo = 'bar';
}
Route::get('/shox', 'ImplicitController@index');


Route::resource('my','MyController');
Route::get('/foo/bar','UserController@index');

Route::get('/register', function(){
	return view('register');
});
Route::post('/user/register',array('uses' =>'UserRegistration@postRegister'));
Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');

Route::get('json', function(){
	return response()->json(['name' => 'Shox Shomakhmudov', 'city'=>'Tashkent']);
});

Route::get('blade', function(){
	return view('page',array('name'=> 'Shokhrukh'));
});
/*Route::get('view-records','StudDbController@index');
Route::post('edit/{id}','StudDbController@edit');
Route::get('delete/{id}','StudDbController@destroy');
Route::get('show/{id}','StudDbController@show');
Route::get('insert','StudDbController@insertform');
Route::post('create','StudDbController@insert');


Route::get('student/{id}', function($id){
	//$student=yuridik\Student::find($id)->courses;
	$student=yuridik\Student::find($id);
	
	echo $student->Name;
	$course= yuridik\Student::find($id);
	$cours=$course->courses;
	foreach ($cours as $key) {
		echo $key->Name;
	}
	
	
});

Route::get('course', function(){
	$course=yuridik\Course::all();
	
		foreach ($course as $cr) {
			# code...
			echo $cr->Name. '  ';
			$student = yuridik\Student::find($cr->student_id);
			echo $student->Name;

		}
	
});
Route::get('user/{id}', function($id){
	//$student=yuridik\Student::find($id)->courses;
	$user= yuridik\User::find($id);
	foreach ($user->userlist as $key) {
		echo $key->name;
		}
});

Route::get('userlist', function(){
	$userlist= yuridik\Userslist::all();
	foreach ($userlist as $key) {
		echo $key->user->login;
	}
});/*
Route::get('view', function(){
	$userlist= yuridik\Userslist::all();
	$user= yuridik\User::all();
	return view('view')->with('userlist', $userlist)->with('user', $user);
});
Route::get('blog', function(){
	$blogs= yuridik\Blog::all();
	$comments= yuridik\Comment::all();
	return view('view')->with('blogs', $blogs)->with('comments', $comments);
});*/