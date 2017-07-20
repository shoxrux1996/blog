@extends('layouts.app')

@section('title', "| Insert Category ")


@section('content')
    <div class="row">
        <form method="POST" action="http://checkout.test.paycom.uz">
            <input type="text" name="merchant" value={{ $merchant_id }}>
            <input type="text" name="amount" value="4000" >
            <input type="text" name="account[user_id]" value={{$user}} >

            

            <!-- ============= Не обязательные поля ====================== -->
            <input type="hidden" name="callback" value="http://shoxrux19960822.000webhostapp.com/success/:transaction">

            {{--<input type="hidden" name="callback" value="http://shoxrux19960822.000webhostapp.com/card"/>--}}
            <!-- ================================================== -->

            <button type="submit">Оплатить с помощью <b>PAYCOM</b></button>
        </form>


    </div>
@endsection