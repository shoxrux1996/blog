<?php
/*Route::get('payment', function(){

    $question = yuridik\Question::find(42);
    $order = new yuridik\Order;
    $order->user_id = $question->client->user->id;
    $order->amount = $question->price;

    $question->order()->save($order);

});*/
Route::get('card','Web\ApiController@show')->name('card.payment');

/*Route::get('balance', function(){
    $client = Auth::guard('client')->user();
    foreach ($client->user->transactions->where('state',2) as $key) {
        echo 'Transactions: '.$key->amount .'<br>';
    }
    foreach ($client->user->orders as $key) {
        echo 'Orders: '.$key->amount .'<br>';
    }
    echo 'Balance: <strong>'.$client->user->balance() .'</strong>';
    
});*/
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.request.confirm');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::prefix('blogs')->group(function(){
        Route::get('/delete/{id}', 'Admin\AdminBlogController@destroy')->name('admin.blog.delete');
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
    Route::prefix('cities')->group(function (){
        Route::get('/', 'Admin\AdminCityController@cities')->name('admin.cities.index');
        Route::post('/deny/{id}','Admin\AdminCityController@cityDeny')->name('admin.cities.delete');
    });
    Route::prefix('category')->group(function(){
		Route::get('/info', 'Admin\AdminCategoryController@index')->name('admin.category.info');
		Route::get('/insert', 'Admin\AdminCategoryController@create')->name('admin.category.insert');
		Route::post('/insert/submit', 'Admin\AdminCategoryController@store')->name('admin.category.insert.submit');
		Route::get('delete/{id}', 'Admin\AdminCategoryController@destroy')->name('admin.category.delete');
	});

   Route::prefix('questions')->group(function (){
       Route::get('/', 'Admin\AdminPostController@questions')->name('admin.questions.index');
       Route::post('/deny/{id}','Admin\AdminPostController@questionDeny')->name('admin.question.delete');
   });
    Route::prefix('documents')->group(function (){
        Route::get('/', 'Admin\AdminPostController@documents')->name('admin.documents.index');
        Route::post('/deny/{id}','Admin\AdminPostController@documentDeny')->name('admin.document.delete');
    });
    Route::prefix('answers')->group(function (){
        Route::get('/', 'Admin\AdminPostController@answers')->name('admin.answers.index');
        Route::post('/deny/{id}','Admin\AdminPostController@answerDeny')->name('admin.answer.delete');
    });
    Route::prefix('comments')->group(function (){
        Route::get('/', 'Admin\AdminPostController@comments')->name('admin.comments.index');
        Route::post('/deny/{id}','Admin\AdminPostController@commentDeny')->name('admin.comment.delete');
    });
    Route::prefix('feedbacks')->group(function (){
        Route::get('/', 'Admin\AdminPostController@feedbacks')->name('admin.feedbacks.index');
        Route::post('/deny/{id}','Admin\AdminPostController@feedbackDeny')->name('admin.feedbacks.delete');
    });
    
    Route::prefix('users')->group(function (){
        Route::get('/', 'Admin\AdminPostController@users')->name('admin.users.index');
        Route::post('client/block/{id}','Admin\AdminPostController@clientBlock')->name('admin.client.block');
        Route::post('client/unblock/{id}','Admin\AdminPostController@clientUnblock')->name('admin.client.unblock');
        Route::post('lawyer/block/{id}','Admin\AdminPostController@lawyerBlock')->name('admin.lawyer.block');
    });
});

Route::prefix('user')->group(function(){
	Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
	Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
	Route::post('/logout', 'Auth\UserLoginController@userLogout')->name('user.logout');
	Route::get('/register', 'Auth\UserRegisterController@showRegistrationForm')->name('user.register');
	Route::post('/register/{usertype}', 'Auth\UserRegisterController@postRegister')->name('user.register.submit');
	Route::get('/register/verify/{code}', 'Auth\UserRegisterController@confirm')->name('user.register.confirm');
	Route::get('/password/reset', 'Auth\UserLoginController@showLinkRequestForm')->name('user.password.request');
	Route::post('/password/email', 'Auth\UserLoginController@userfinder')->name('user.password.email');

});

Route::prefix('client')->group(function(){
	Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset')->name('client.password.request');
	Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm')->name('client.password.reset');
	Route::get('/', 'Client\ClientController@index')->name('client.dashboard');
	Route::get('/settings/info', 'Client\ClientController@info')->name('client.info');
	Route::post('/update/{settingtype}', 'Client\ClientController@update')->name('client.update');

    Route::prefix('question')->group(function(){
        Route::get('/create', 'Client\ClientQuestionController@create')->name('question.create');
        Route::post('/store', 'Client\ClientQuestionController@store')->name('question.insert.submit');
        
    });
    Route::prefix('feedback')->group(function(){
    	Route::post('/send/answer/{answer_id}', 'Client\ClientFeedbackController@store')->name('feedback.create');
    });
    Route::prefix('document')->group(function(){
    	Route::get('/create', 'Client\ClientDocumentController@create')->name('document.create');
    	Route::post('/store', 'Client\ClientDocumentController@store')->name('document.store');

    });
    Route::prefix('call')->group(function(){
        Route::get('/create', 'Client\ClientCallController@create')->name('call.create');
        Route::post('/store', 'Client\ClientCallController@store')->name('call.store');

    });
       Route::prefix('my')->group(function(){
            Route::get('/documents', 'Client\ClientDocumentController@myDocs')->name('my.documents');
            Route::get('/document/{id}', 'Client\ClientDocumentController@showDoc')->name('client.document.show');
            Route::post('document/accept/{id}', 'Client\ClientDocumentController@acceptRequest')->name('client.document.accept');
            Route::post('document/reject/{id}', 'Client\ClientDocumentController@rejectRequest')->name('client.document.reject');
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
    Route::post('/update/{settingtype}', 'Lawyer\LawyerController@update')->name('lawyer.update');
    
    Route::prefix('/blogs')->group(function(){
        Route::get('/insertform','Lawyer\LawyerBlogController@insertform')->name('lawyer.blog.insert');
        Route::post('/create','Lawyer\LawyerBlogController@store')->name('lawyer.blog.submit');
    });
    Route::prefix('/comment')->group(function(){
        Route::post('/{blog_id}', 'Lawyer\LawyerCommentController@store')->name('lawyer.comment.store');
    });
    Route::post('answer/create/{question_id}', 'Lawyer\LawyerAnswerController@store')->name('lawyer.answer.store');
    Route::prefix('document')->group(function(){
        Route::get('/list', 'Lawyer\LawyerDocumentController@index')->name('lawyer.document.info');
        Route::post('/submit/{id}', 'Lawyer\LawyerDocumentController@sendRequest')->name('lawyer.document.request');
        Route::get('show/{id}', 'Lawyer\LawyerDocumentController@show')->name('lawyer.document.show');
    });
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
Route::prefix('category_info')->group(function(){
	Route::get('/', 'Web\CategoryController@index')->name('category.list');
});
Route::get('/', 'Web\IndexController@index')->name('home');
Route::get('/about', function(){
	return view('about');
})->name('about');
Route::get('/how-works', function(){
	return view('how-works');
})->name('how-works');




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