<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap Core -->
    <meta charset="utf-8">

    <style>
        #wrapper{
            width: 900px;
            margin: 0 auto;
            background-color: #fff;
        }

        #confirmation-container{
            padding: 0 100px;
        }

        .confirm{
            color: #fff;
            background-image: url('http://yuridik.uz/dist/images/10.jpg');
            padding: 20px;
        }

        .confirm h3{
            margin-bottom: 20px;
        }

        .confirm button{
            border-radius: 0;
            font-weight: bolder;
            margin-bottom: 10px;
        }

        .info{
            color: #626065;
        }

        .social-link i{
            padding: 10px;
            font-size: 24px;
        }

        .social-link a:hover{
            text-decoration: none;
        }

        .number p{
            font-weight: bold;
            margin-bottom: 0;
            font-size: 16px;
        }


    </style>
</head>
<body>
<div id="wrapper">
    <div id="confirmation-container">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-sm-12 confirm">
                    <img src="http://yuridik.uz/dist/images/logo.png" />
                        <h3>@lang('mail.Привет') {{$data['name']}}!</h3>
                    <h3>@lang('mail.Поздравить')</h3>
                    <a href="{{route('user.register.confirm', ['code' => $data['code']]) }}" type="button" class="btn btn-success btn-lg">@lang('mail.Активация')</a>
                </div>
                <div class="col-sm-12 info text-center">
                    <hr>
                    <h4>
                        @lang('mail.Авто')
                    </h4>
                    <hr>
                    <h5>@lang('mail.Линк')</h5>
                    <h5>http://yuridik.uz/user/register/verify/{{$data['code']}}</h5>
                    <hr>
                </div>
                <div class="col-sm-12 number">
                    <p>@lang('mail.Телефон'): (+99899) 837-37-77</p>
                    <p>Email: info@yuridik.uz</p>
                </div>
                <div class="col-sm-12 social-link">
                    <a href="https://t.me/yuridikuz">
                        <img width="40px;" src="http://yuridik.uz/dist/images/telegram.png">
                    </a>
                    <a href="#">
                        <img width="30px;" src="http://yuridik.uz/dist/images/facebook.png">
                    </a>
                    <a href="#">
                        <img width="32px;" src="http://yuridik.uz/dist/images/twitter.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>