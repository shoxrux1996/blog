<?php
Route::get('card','Web\ApiController@show')->name('card.payment');
Route::post('error/post', function (\Illuminate\Http\Request $request){
    $error = new \yuridik\Error;
    $error->name = $request->name;
    $error->error = $request->error;
    $error->save();
    $error->notify(new \yuridik\Notifications\RequestWebsite());
    return redirect()->back();
})->name('error.find');
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'Admin\AdminController@info')->name('admin.info');
    Route::post('/info/update','Admin\AdminController@update')->name('admin.info.update');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.request.confirm');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::prefix('notifications')->group(function (){
       Route::get('users', 'Admin\AdminNotificationController@usersList')->name('admin.users.notification.index');
        Route::get('comments', 'Admin\AdminNotificationController@commentsList')->name('admin.comments.notification.index');
        Route::get('blogs', 'Admin\AdminNotificationController@blogsList')->name('admin.blogs.notification.index');
        Route::get('questions', 'Admin\AdminNotificationController@questionsList')->name('admin.questions.notification.index');
        Route::get('answers', 'Admin\AdminNotificationController@answersList')->name('admin.answers.notification.index');
        Route::get('withdraws', 'Admin\AdminNotificationController@withdrawsList')->name('admin.withdraws.notification.index');
    });
    Route::prefix('blogs')->group(function(){
        Route::get('/delete/{id}', 'Admin\AdminBlogController@destroy')->name('admin.blog.delete');
        Route::get('/', 'Admin\AdminBlogController@showBlogList')->name('admin.blogs');
        Route::get('/show/{id}', 'Admin\AdminBlogController@show')->name('admin.blog.show');
        Route::get('/edit/{id}', 'Admin\AdminBlogController@editform')->name('admin.blog.edit');
        Route::post('/edit/submit/{id}', 'Admin\AdminBlogController@edit')->name('admin.blog.edit.submit');
        Route::get('/insertform','Admin\AdminBlogController@insertform')->name('admin.blog.insert');
        Route::post('/create','Admin\AdminBlogController@store')->name('admin.blog.submit');
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
        Route::get('/deny/{id}','Admin\AdminCityController@cityDelete')->name('admin.city.delete');
        Route::post('/update/{id}','Admin\AdminCityController@cityUpdate')->name('admin.city.update');
        Route::get('/edit/{id}','Admin\AdminCityController@cityEdit')->name('admin.city.edit');
        Route::get('/insert','Admin\AdminCityController@insert')->name('admin.city.insert');
        Route::post('/insert/submit','Admin\AdminCityController@insertSubmit')->name('admin.city.insert.submit');
    });
    Route::prefix('category')->group(function(){
		Route::get('/info', 'Admin\AdminCategoryController@index')->name('admin.category.info');
		Route::get('/show/{id}', 'Admin\AdminCategoryController@show')->name('admin.category.show');
		Route::get('/insert', 'Admin\AdminCategoryController@create')->name('admin.category.insert');
		Route::post('/insert/submit', 'Admin\AdminCategoryController@store')->name('admin.category.insert.submit');
		Route::get('delete/{id}', 'Admin\AdminCategoryController@destroy')->name('admin.category.delete');
        Route::get('/edit/{id}', 'Admin\AdminCategoryController@edit')->name('admin.category.edit');
        Route::post('/edit/submit/{id}', 'Admin\AdminCategoryController@update')->name('admin.category.edit.submit');
	});

   Route::prefix('questions')->group(function (){
       Route::get('/', 'Admin\AdminPostController@questions')->name('admin.questions.index');
       Route::get('/deny/{id}','Admin\AdminPostController@questionDeny')->name('admin.question.delete');
       Route::get('/show/{id}','Admin\AdminPostController@questionShow')->name('admin.question.show');
       Route::get('/edit/{id}','Admin\AdminPostController@questionEdit')->name('admin.question.edit');
       Route::post('/edit/{id}/submit','Admin\AdminPostController@questionUpdate')->name('admin.question.edit.submit');
   });
    Route::prefix('documents')->group(function (){
        Route::get('/', 'Admin\AdminPostController@documents')->name('admin.documents.index');
        Route::get('/deny/{id}','Admin\AdminPostController@documentDeny')->name('admin.document.delete');
        Route::get('/show/{id}','Admin\AdminPostController@documentShow')->name('admin.document.show');
    });
    Route::prefix('answers')->group(function (){
        Route::get('/', 'Admin\AdminPostController@answers')->name('admin.answers.index');
        Route::get('/deny/{id}','Admin\AdminPostController@answerDestroy')->name('admin.answer.delete');
        Route::get('/show/{id}','Admin\AdminPostController@answerShow')->name('admin.answer.show');
    });
    Route::prefix('comments')->group(function (){
        Route::get('/', 'Admin\AdminPostController@comments')->name('admin.comments.index');
        Route::post('/deny/{id}','Admin\AdminPostController@commentDeny')->name('admin.comment.delete');
    });
    Route::prefix('feedbacks')->group(function (){
        Route::get('/', 'Admin\AdminPostController@feedbacks')->name('admin.feedbacks.index');
        Route::post('/deny/{id}','Admin\AdminPostController@feedbackDeny')->name('admin.feedbacks.delete');
    });
    Route::prefix('moderators')->group(function(){
        Route::get('/', 'Admin\AdminUserController@moderatorList')->name('admin.moderators.index');
        Route::get('/delete/{id}', 'Admin\AdminUserController@moderatorDelete')->name('admin.moderator.delete');
        Route::get('/create', 'Admin\AdminUserController@moderatorCreate')->name('admin.moderator.create');
        Route::post('/store', 'Admin\AdminUserController@moderatorStore')->name('admin.moderator.store');
        Route::get('/edit/{id}', 'Admin\AdminUserController@moderatorEdit')->name('admin.moderator.edit');
        Route::post('/update/{id}', 'Admin\AdminUserController@moderatorUpdate')->name('admin.moderator.update');
    });
    Route::prefix('users')->group(function (){
        Route::get('/', 'Admin\AdminPostController@users')->name('admin.clients.index');
        Route::post('client/block/{id}','Admin\AdminPostController@clientBlock')->name('admin.client.block');
        Route::post('client/unblock/{id}','Admin\AdminPostController@clientUnblock')->name('admin.client.unblock');
        Route::post('lawyer/block/{id}','Admin\AdminPostController@lawyerBlock')->name('admin.lawyer.block');
        Route::post('lawyer/unblock/{id}','Admin\AdminPostController@lawyerUnblock')->name('admin.lawyer.unblock');
        Route::post('lawyer/confirm/{id}','Admin\AdminPostController@lawyerConfirm')->name('admin.lawyer.confirm');
        Route::get('lawyer/award/delete/{id}', 'Admin\AdminPostController@lawyerAwardDelete')->name('admin.lawyer.award.delete');
    });
    Route::prefix('withdraws')->group(function (){
        Route::get('/', 'Admin\AdminWithdrawController@index')->name('admin.withdraw.requests');
        Route::get('requests/submit/{id}', 'Admin\AdminWithdrawController@withdraw')->name('admin.withdraw.submit');
        Route::post('request/','Lawyer\LawyerController@sendWithdrawRequest')->name('lawyer.withdraw.request');
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
    Route::get('/file/delete/{id}','Client\ClientController@fileDelete')->name('client.file.delete');
    	Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset')->name('client.password.request');
	Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm')->name('client.password.reset');
	Route::get('/', 'Client\ClientController@index')->name('client.dashboard');
	Route::get('/settings/info/{type?}', 'Client\ClientController@info')->name('client.info');
	Route::post('/update/{settingtype}', 'Client\ClientController@update')->name('client.update');

    Route::prefix('question')->group(function(){
        Route::post('/{id}/pay_to_lawyer/', 'Client\ClientQuestionController@payForLawyer')->name('client.question.pay_lawyer');
        Route::post('/{id}/pat_to_every_lawyer/','Client\ClientQuestionController@payForEveryLawyer')
            ->name('client.question.pay_to_every_lawyer');
        Route::get('/create', 'Client\ClientQuestionController@create')->name('question.create');
        Route::post('/store', 'Client\ClientQuestionController@store')->name('question.insert.submit');
        Route::get('/edit/{id}','Client\ClientQuestionController@edit')->name('question.edit');
        Route::post('/edit/update/{id}', 'Client\ClientQuestionController@update')->name('question.edit.submit');
        Route::post('/answer/submit/{question_id}', 'Client\ClientQuestionController@answerStore')->name('client.answer.store');
        Route::post('/{id}/make_solved',  'Client\ClientQuestionController@makeSolved')->name('client.question.makeSolved');
    });
    Route::prefix('feedback')->group(function(){
    	Route::post('/send/answer/{answer_id}', 'Client\ClientFeedbackController@store')->name('feedback.create');
    });
    Route::prefix('document')->group(function(){
    	Route::get('/create', 'Client\ClientDocumentController@create')->name('document.create');
    	Route::post('/store', 'Client\ClientDocumentController@store')->name('document.store');
        Route::post('document/close/{id}', 'Client\ClientDocumentController@closeDocument')->name('client.document.close');

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
            Route::get('/questions', 'Client\ClientQuestionController@myQuestions')->name('my.questions');
            Route::get('/question/{id}', 'Client\ClientQuestionController@showQuestion')->name('client.question.show');
            Route::get('/requests', 'Lawyer\LawyerDocumentController@myRequests')->name('my.requests');
            Route::get('/answers', 'Lawyer\LawyerAnswerController@myAnswers')->name('my.answers');
            Route::post('/document/response/{id}','Client\ClientDocumentController@responseDocument')->name('client.response.store');
       });

    
  /*  Route::prefix('blogs')->group(function(){
	 	Route::get('/show/{id}', 'Admin\AdminBlogController@show')->name('client.blog.show');
	});*/

    Route::get('notification/all-marked', 'Client\ClientNotificationsController@deleteNotifications')->name('client.notifications.delete');
});

Route::prefix('lawyer')->group(function(){
    Route::get('/', 'Lawyer\LawyerController@index')->name('lawyer.dashboard');
//	Route::post('/password/email', 'Auth\LawyerForgotPasswordController@sendResetLinkEmail')->name('lawyer.password.email');
	Route::post('/password/reset', 'Auth\LawyerResetPasswordController@reset')->name('lawyer.password.request');
	Route::get('/password/reset/{token}', 'Auth\LawyerResetPasswordController@showResetForm')->name('lawyer.password.reset');
    Route::get('/settings/info/{type?}', 'Lawyer\LawyerController@info')->name('lawyer.info');
    Route::post('/update/{settingtype}', 'Lawyer\LawyerController@update')->name('lawyer.update');
    Route::get('/award/delete/{id}','Lawyer\LawyerController@awardDelete')->name('lawyer.award.delete');
    Route::get('/file/delete/{id}','Lawyer\LawyerController@fileDelete')->name('lawyer.file.delete');
    Route::get('/education/delete/{id}', 'Lawyer\LawyerController@educationDelete')->name('lawyer.education.delete');
    Route::prefix('/notifications')->group(function (){
        Route::get('/mark-as-read','Lawyer\LawyerNotificationController@notificationAsRead')->name('lawyer.notification.asRead');
    });
    Route::prefix('/blogs')->group(function(){
        Route::get('/insertform','Lawyer\LawyerBlogController@insertform')->name('lawyer.blog.insert');
        Route::post('/create','Lawyer\LawyerBlogController@store')->name('lawyer.blog.submit');
        Route::get('/edit/{id}', 'Lawyer\lawyerBlogController@editform')->name('lawyer.blog.edit');
        Route::post('/edit/submit/{id}', 'Lawyer\LawyerBlogController@edit')->name('lawyer.blog.edit.submit');

    });
    Route::prefix('/comment')->group(function(){
        Route::post('/{blog_id}', 'Lawyer\LawyerCommentController@store')->name('lawyer.comment.store');
    });
    Route::prefix('answer')->group(function (){
        Route::post('/create/{question_id}', 'Lawyer\LawyerAnswerController@store')->name('lawyer.answer.store');
        Route::get('/edit/{id}', 'Lawyer\LawyerAnswerController@edit')->name('lawyer.answer.edit');
        Route::post('/update/{id}', 'Lawyer\LawyerAnswerController@update')->name('lawyer.answer.update');
    });
    Route::prefix('response')->group(function (){
        Route::post('/create/{request_id}', 'Lawyer\LawyerDocumentController@storeResponse')->name('lawyer.response.store');
        Route::get('/edit/{id}', 'Lawyer\LawyerAnswerController@edit')->name('lawyer.response.edit');
        Route::post('/update/{id}', 'Lawyer\LawyerAnswerController@update')->name('lawyer.response.update');
    });
    Route::prefix('document')->group(function(){
        Route::get('/list', 'Lawyer\LawyerDocumentController@index')->name('lawyer.document.info');
        Route::post('/submit/{id}', 'Lawyer\LawyerDocumentController@sendRequest')->name('lawyer.document.request');
        Route::get('show/{id}', 'Lawyer\LawyerDocumentController@show')->name('lawyer.document.show');
    });

});

Route::prefix('question-info')->group(function (){
    Route::get('/list', 'Web\QuestionController@index')->name('question.list');
    Route::get('/show/{id}', 'Web\QuestionController@show')->name('web.question.show');
    Route::get('/free', 'Web\QuestionController@freeQuestions')->name('free.questions');
    Route::get('/service', 'Web\QuestionController@costlyQuestions')->name('costly.questions');
});

Route::prefix('lawyer-info')->group(function(){
    Route::get('/show/{id}','Web\LawyersInfoController@show')->name('web.lawyer.show');
    Route::get('/', 'Web\LawyersInfoController@showLawyersList')->name('lawyers.list');
});
Route::prefix('blog-info')->group(function(){
	Route::get('/', 'Web\BlogController@showBlogList')->name('web.blogs');
    Route::get('/show/{id}', 'Web\BlogController@show')->name('web.blog.show');
});
Route::prefix('category-info')->group(function(){
	Route::get('/', 'Web\CategoryController@index')->name('category.list');
	Route::get('/show/{name}','Web\CategoryController@show')->name('web.category.show');
    Route::get('show/{name}/free', 'Web\CategoryController@freeQuestions')->name('category.free.questions');
    Route::get('show/{name}/service', 'Web\CategoryController@costlyQuestions')->name('category.costly.questions');
});
Route::get('/search/lawyers', 'Web\SearchController@searchLawyers')->name('search.lawyers');
Route::get('/search/main', 'Web\SearchController@searchAll')->name('search.all');
Route::get('/category/{name}/lawyers', 'Web\SearchController@searchByCategory')->name('search.lawyers.bycategory');
Route::get('/search/questions', 'Web\SearchController@searchQuestionsByCategory')->name('search.questions.bycategory');

Route::get('/', 'Web\IndexController@index')->name('home');
Route::get('/about', function(){

	return view('about');
})->name('about');
Route::get('/how-works', function(){
	return view('how-works');
})->name('how-works');
Route::get('/partners', function(){
    return view('partners');
})->name('partners');
Route::get('/ad', function(){
    return view('ad');
})->name('ad');
Route::get('/become-lawyer', function(){
    return view('become-lawyer');
})->name('become-lawyer');
Route::get('/team', function(){
    return view('team');
})->name('team');
Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');
Route::get('/faq', function(){
    return view('faq');
})->name('faq');
Route::get('/guarantees', function(){
    return view('guarantees');
})->name('guarantees');
Route::get('/license', function(){
    return view('license');
})->name('license');
Route::get('setlocale/{locale}', function ($locale) {
  if (in_array($locale, \Config::get('app.locales'))) {
    // Session::put('locale', $locale);
  
  }
  return redirect()->back()->withCookie(cookie()->forever('language', $locale));
})->name('lang.switch');
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