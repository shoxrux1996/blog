<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap Core -->
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
            background-color: #1F2746;
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
                    <img src="dist/images/logo.png" />
                        <h3>Привет {{$data['name']}}!</h3>
                    <h3>Начните использовать Yuridik.uz и получите бесплатное адвокатское обслуживание</h3>
                    <button href="{{route('user.register.confirm', ['code' => $data['code']]) }}" type="button" class="btn btn-success btn-lg">Подтвердить</button>
                </div>
                <div class="col-sm-12 info text-center">
                    <hr>
                    <h4>
                        Вы почти готовы начать работу с Yuridik.uz. Пожалуйста, подтвердите свой адрес электронной почты, чтобы мы знали, что это действительно вы.
                    </h4>
                    <hr>
                    <h5>Возникают проблемы в начале работы? Попробуйте вставить эту ссылку в адресную строку браузера.</h5>
                    <h5>http://yuridik.uz/user/register/verify/{{$data['code']}}</h5>
                    <hr>
                </div>
                <div class="col-sm-12 number">
                    <p>Телефон: (+99899) 837-37-77</p>
                    <p>Email: info@yuridik.uz</p>
                </div>
                <div class="col-sm-12 social-link">
                    <a href="https://t.me/yuridikuz">
                        <i class="fa fa-telegram"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>