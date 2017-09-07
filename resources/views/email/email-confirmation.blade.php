<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap Core -->
    <meta charset="utf-8">
    <style>

        html{
            font-family: "Open Sans";
        }
        body{
            margin: 0;
            padding: 0;
        }
        h3{
            font-weight: 600;
            margin-bottom: 0;
            margin-top: 0;
            font-size: 24px;
        }

        h4{
            margin-bottom: 0;
            margin-top: 0;
            font-size: 18px;
        }

        h5{
            margin-bottom: 0;
            margin-top: 0;
            font-size: 14px;
        }

        .btn-group-lg>.btn, .btn-lg {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #449d44;
            border-color: #398439;
        }
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
            background-color: #1F2746;
            padding: 20px;
        }

        .confirm h3{
            font-size: 18px;
            font-family: "Trebuchet MS", Helvetica, sans-serif;
            margin-bottom: 20px;
        }
        .confirm h2{
            font-size: 24px;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }
        .confirm a{
            border-radius: 0;
            font-weight: bolder;
            margin-bottom: 10px;
            padding: 7px 20px;
            font-size: 20px;
            text-decoration: none;
        }

        .info{
            color: #626065;
        }

        .social-link i{
            color: #337AB7;
            padding: 10px;
            font-size: 24px;
        }


        .social-link a{
            text-decoration: none;
        }

        .social-link a:hover{
            text-decoration: none;
        }

        .number p{
            margin-top: 5px;
            font-weight: bold;
            margin-bottom: 0;
            font-size: 16px;
        }

        .text-center{
            text-align: center;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
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
                    <h2>@lang('mail.Привет') {{$data['name']}}</h2>
                    <h3>@lang('mail.Поздравить')</h3>
                    <a href="{{route('user.register.confirm', $data['code'])}}" type="button" class="btn btn-success btn-lg">
                        @lang('mail.Активация')</a>
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