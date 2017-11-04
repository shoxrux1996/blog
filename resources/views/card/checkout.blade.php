@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <select id="paymentSelector" class="form-control">
                                {{--<option value="0" selected="selected">Выберите способ оплаты</option>--}}
                                <option value="paymeForm" selected="selected">Payme</option>
                                {{--<option value="upayForm">Upay</option>--}}
                                {{--<option value="clickForm">Click</option>--}}
                                {{--<option value="mbankForm">MBANK</option>--}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div id="paymeForm">
                            <form method="POST" action="http://checkout.test.paycom.uz" class="form-inline">
                                <input type="hidden" name="merchant" value={{ $merchant_id }}>
                                <input type="hidden" name="amount" class="payment-amount payment-amount-payme">
                                <input type="hidden" name="account[user_id]" value={{$user_id}} >

                                <!-- ============= Не обязательные поля ====================== -->
                                <input type="hidden" name="callback" value="http://yuridik.uz:443/api/success/:transaction">
                            {{--<input type="hidden" name="callback" value="http://shoxrux19960822.000webhostapp.com/card"/>--}}
                            <!-- ================================================== -->
                                    <div class="form-group">
                                        <input type="number" id="amountWillConvert" class="form-control" placeholder="Введите сумму">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Перейти к оплате</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="payment-payment" class="section-group">
            <h2 class="header">Транзакции</h2>
            <td class="list-view grid" id="payment-grid">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><a href="#">ID</a></th>
                        <th><a href="#">Название сервиса</a></th>
                        <th><a href="#">Время</a></th>
                        <th><a href="#">Сумма (sum)</a></th>
                    </tr>
                    @foreach($user->transactions as $transaction)
                        <tr>
                            <td class="col-md-2">#{{$transaction->id}}</td>
                            <td class="col-md-4">Payme - Пополнение баланса</td>
                            <td class="col-md-3">{{$transaction->create_time}}</td>
                            <td class="col-md-3"><span class="sign">+</span> {{$transaction->amount/100}}</td>
                        </tr>
                    @endforeach
                </table>
        </section>
        <section id="payment-payment" class="section-group">
            <h2 class="header">Ордеры</h2>
            <td class="list-view grid" id="payment-grid">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><a href="#">ID</a></th>
                        <th><a href="#">Название Ордера</a></th>
                        <th><a href="#">Время</a></th>
                        <th><a href="#">Сумма (sum)</a></th>
                    </tr>
                    @foreach($user->orders as $order)
                        <tr>
                            <td class="col-md-2">#{{$order->id}}</td>
                            <td class="col-md-4">{{substr($order->typeable_type, 8)}}</td>
                            <td class="col-md-3">{{$order->created_at}}</td>
                            <td class="col-md-3"><span class="sign">+</span> {{number_format($order->amount, 2)}}</td>
                        </tr>
                    @endforeach
                </table>
        </section>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#paymeForm form').submit(function (e) {
            $('[name="amount"]').val($('#amountWillConvert').val() * 100)
        })
    </script>
@endsection