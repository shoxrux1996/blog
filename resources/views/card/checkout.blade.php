@extends('layouts.app')

@section('title', "| Insert Category ")


@section('content')
    <div class="row">
               <h1>Checkout</h1>
            <h4>Your Total: </h4>
            <form class="form-horizontal" role="form" id="checkout-form" action="{{route('checkout')}}" method="post">
               <fieldset>
                  <legend>Payment</legend>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="card-number">Card Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                    <div class="col-sm-9">
                      <div class="row">
                        <div class="col-xs-3">
                          <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
                          </select>
                        </div>
                        <div class="col-xs-3">
                          <select class="form-control" name="expiry-year">
                           
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code">
                    </div>
                  </div>
                  {{ csrf_field() }}
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button type="button" class="btn btn-success">Pay Now</button>
                    </div>
                  </div>
                </fieldset>
            </form>
      
    </div>
@endsection