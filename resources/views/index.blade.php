@extends('layouts.app')
@section('styles')
    <link href="{{ asset('dist/css/homepage.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script>
        if(screen.width <= 991){
            var $searchButton = $('#search-submit-button');
            $('#search-field').hide();
            $($searchButton).attr('type', 'button');
            $($searchButton).click('on', function () {
                $('#search-field').show("slide", { direction: "right" }, 4000);
                $($searchButton).attr('type', 'submit');
            });
        }
    </script>

    <!-- responsiveCarousel.js -->
    <script src="{{ asset('dist/js/responsiveCarousel.min.js')}}"></script>
@endsection

@section('content')

    <!-- Search Section -->
    <div class="container-fluid" id="search-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>@lang('index.confidence')</h1>
                    <form action="{{route('search.all')}}" method="get">
                        <div class="input-group text-center">
                            <input type="text" class="form-control" id="search-field" name="search" placeholder="{{ __('index.search') }}" required/>
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-default" id="search-submit-button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </button>
                        </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Search Section -->

    <!-- Services Section -->
    <div class="container" id="services-section">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <img src="{{ asset( 'dist/images/question-icon.png')}}" alt="Question icon"/>
                <a type="button" class="btn btn-default"
                   href="{{ route('question.create')}}">@lang('index.askquestion')</a>
                <p class="statistics">50,000+</p>
                <p class="what">@lang('index.answeredquestions')</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <img src="{{ asset('dist/images/call-icon.png')}}" alt="Call icon"/>
                {{--href="{{ route('call.create')}}"--}}
                <a type="button" class="btn btn-default" data-toggle="modal"
                   data-target="#call-function">@lang('index.ordercall')</a>
                <p class="statistics">20,00,000+</p>
                <p class="what">@lang('index.callback')</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <img src="{{ asset('dist/images/document-icon.png')}}" class="img-responsive" alt="Document icon"/>
                {{--href="{{ route('document.create')}}"--}}
                <a type="button" class="btn btn-default" href="{{ route('document.create') }}">@lang('index.orderdocument')</a>
                <p class="statistics">40,000,000+</p>
                <p class="what">@lang('index.madedocuments')</p>
            </div>
        </div>
    </div>

    <!-- Modal for call function-->
    <div id="call-function" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('index.soon')!!!</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                    <h4>@lang('index.callinprocess')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue"
                            data-dismiss="modal">@lang('index.close')</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /Modal for call function-->

    <!-- Modal for document function-->
    <div id="document-function" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('index.soon')!!!</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('dist/images/under-development.png')}}" alt="Under development"/>
                    <h4>@lang('index.documentinprocess')</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-dark-blue"
                            data-dismiss="modal">@lang('index.close')</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /Modal for document function-->

    <!-- /Services Section -->

    <!-- Questions Section -->
    <div class="container-fluid" id="questions-section">
        <div class="container">
            <h2 class="text-center">@lang('index.asked') <span
                        class="total">{{$num_of_questions}}</span> @lang('index.#questions')</h2>
            <div class="questions-bg clearfix">
                <h3 class="category text-center">
                <span>
                    <button class="active btn-link" id="free-questions">@lang('index.free')</button>
                </span>
                    <button class="not-active btn-link" id="paid-questions">@lang('index.paid')</button>
                </h3>
                <div id="paid-question-block" class="hidden">
                    @foreach($paid_question_examples as $var)
                        @if(!$var->disabled || (Auth::guard('lawyer')->check() && Auth::guard('lawyer')->user()->type == 2))
                            <a href="{{ route('web.question.show',['id' => $var->id])}}" class="question clearfix">
                                <div class="asked-time">
                                    {{$var->created_at}}
                                </div>
                                <div class="total-answers">
                                    {{$var->countAnswers()}} @lang('index.answers')
                                </div>
                                <div class="asked-question">
                                    {{$var->title}}
                                </div>
                                <div class="asked-price">
                                    @lang('index.price') {{$var->price}} @lang('index.sum')
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div id="free-question-block" >
                    @foreach($free_question_examples as $var)
                        <a href="{{ route('web.question.show',['id' => $var->id])}}" class="question clearfix">
                            <div class="asked-time">
                                {{$var->created_at}}
                            </div>
                            <div class="total-answers">
                                {{$var->countAnswers()}} @lang('index.answers')
                            </div>
                            <div class="asked-question">
                                {{$var->title}}
                            </div>
                        </a>
                    @endforeach
                </div>
                <a type="button" class="btn btn-default btn-lg btn-block btn-dark-blue"
                   href="{{ route('question.list')}}">@lang('index.allquestions')</a>
            </div>
        </div>
    </div>
    <!-- /Questions -->

    <!-- Category Section -->
    <div class="container-fluid" id="category-section">
       <div class="container">
           <div class="row">
               <div class="col-md-9 col-sm-12">
                   @if(\App::isLocale('ru'))
                       @for($i=0; $i<$categories->count(); $i+=3)
                           <div class="row">
                               @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                                   <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                       <a href="{{route('web.category.show', [$categories[$j]->name])}}">
                                           <i class="fa {{$categories[$j]->class}}"></i> {{$categories[$j]->name}}
                                       </a>
                                   </div>
                               @endfor
                           </div>
                       @endfor
                   @else
                       @for($i=0; $i<$categories->count(); $i+=3)
                           <div class="row">
                               @for($j=$i; $j<=$i+2 && $j<$categories->count(); $j++)
                                   <div class="col-md-4 col-sm-4 col-xs-4 categories">
                                       <a href="{{route('web.category.show', [$categories[$j]->name])}}">
                                           <i class="fa {{$categories[$j]->class}}"></i> {{$categories[$j]->name_uz}}
                                       </a>
                                   </div>
                               @endfor
                           </div>
                       @endfor
                   @endif
               </div>
               <div class="col-md-3 text-center view-all-categories">
                   <h3>@lang('index.helpforanyquestion')</h3>
                   <p>@lang('index.helpforanyquestionbody')</p>
                   <a type="button" class="btn  btn-dark-blue"
                      href="{{ route('category.list')}}">@lang('index.allcategories')</a>
               </div>
           </div>
       </div>
    </div>
    <!-- Category Section -->

    <!-- News Section -->
    <div class="container" id="news-section">
        <h1 class="text-center">@lang('index.blogs')</h1>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-4">
                    @if($blog->file != null)
                        <img class="img-responsive img-thumbnail" src="{{ asset($blog->file->path.$blog->file->file)}}"
                             alt="{{$blog->title}}"/>
                    @else
                        <img class="img-responsive img-thumbnail" src="{{ asset('dist/images/blog-img-2.jpg')}}"
                             alt="News 2"/>
                    @endif
                    <div class="middle">
                        <a class="btn btn-dark-blue text"
                           href="{{route('web.blog.show', $blog->id)}}">@lang('index.readblog')</a>
                    </div>
                    <h4>
                        <a href="{{route('web.blog.show', $blog->id)}}">{{$blog->title}}</a>
                    </h4>
                    <p class="hidden-xs">{{substr(strip_tags($blog->text),0,80)}} {{strlen(strip_tags($blog->text)) > 80 ? '...' : ""}}</p>
                    <p class="visible-xs">
                        <span>
                           <i class="fa fa-eye"></i> {{$blog->count}}
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}
                        </span>
                    </p>
                </div>
            @endforeach

        </div>
        <div class="row text-center">
            <a type="button" class="btn  btn-dark-blue" href="{{route('web.blogs')}}">
                <i class="fa fa-book" aria-hidden="false"></i> @lang('index.allblogs')</a>
        </div>
    </div>
    <!-- /News Section -->

    <!-- Lawyers Section -->
    <div class="container-fluid text-center" id="lawyers-section">
        <div class="container">
            <h2>@lang('index.consultionfrom') <span class="total">{{$num_of_lawyers}}</span> @lang('index.lawyers&jurists')
            </h2>
            <h5>@lang('index.ourlawyers-...')</h5>
            <div class="row" id="gallery">
                <div id="lawyers-carousel" class="crsl-nav">
                    <a href="#" class="previous">Previous</a>
                    <a href="#" class="next">Next</a>
                </div>
                <div class="crsl-items" data-navigation="lawyers-carousel">
                    <div class="crsl-wrap">
                        @foreach($lawyers as $lawyer)
                            <figure class="crsl-item">
                                <div class="lawyer text-center">
                                    <a href="{{route('web.lawyer.show', $lawyer->id)}}">
                                        <img src="{!! $lawyer->user->file != null ? asset($lawyer->user->file->path . $lawyer->user->file->file) : asset('dist/images/headshot-1.png')!!}"
                                             alt="headshot 1"
                                             class="img-responsive center-block"/>
                                        <h4>{{$lawyer->user->firstName}} {{$lawyer->user->lastName}}</h4>
                                        <h5>г. {{$lawyer->user->city->name}}</h5>
                                        <hr class="green-divider">
                                        <p>
                                            <span class="total">{{$lawyer->feedbacks->count()}}</span> @lang('index.feedbacks')
                                        </p>
                                    </a>
                                </div>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <a type="button" class="btn  btn-dark-blue"
           href="{{ route('lawyers.list')}}">@lang('index.allprojectlawyers')</a>
    </div>
    <!-- Lawyers Section -->

    <!-- About Us Section -->
    <div class="container-fluid" id="about-us-section">
        <div class="container">
            <h1 class="text-center">@lang('index.aboutus')</h1>
            <div class="row" style="clear: both; overflow: hidden;">
                <div class="col-md-6 col-sm-6">
                    <img src="{{asset('dist/images/aboutus.jpg')}}" width="100%" height="auto" controls>

                </div>
                <div class="col-md-6 col-sm-6">
                    <h4>@lang('index.aboutustitle')</h4>
                    <p>@lang('index.aboutusbody1')</p>
                    <p>@lang('index.aboutusbody2')</p>
                    <p>@lang('index.aboutusbody3')</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /About Us Section -->
@endsection