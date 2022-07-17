@extends('userAccount.partials.index')
@section('content')

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Your cart</h2>
                        </div>
                        @if(session('erro'))
                            <div class="alert alert-succes">
                            {{session()->get('erro')}}
                            </div> 
                        @endif
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($content as $cart)
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{asset('uploads/'.$cart->options->image)}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$cart->name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{number_format($cart->price)}} $</span>
                                        </td>
                                        <td class="qty">
                                            <form method="post" action="{{route('updatecart')}}">
                                                @csrf
                                            <div class="qty-btn d-flex">
                                        
                                                <div class="quantity">
                                                  
                                                    <input type="number"  name="cart_quantity" readonly value="{{$cart->qty}}">
                                                    <input type="hidden" name="rowID" value="{{$cart->rowId}}">
                                                   
                                                </div>
                                               
                                            </div>
                                            </form>
                                        </td>
                                        <td class="price">
                                            <span>
                                                {{number_format($cart->price * $cart->qty)}} $
                                            </span>
                                       </td>
                                    </tr>
                                    @empty
                                    <td class="cart_product_img" colspan="3">
                                    No products
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>{{Cart::subtotal()}} $</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>{{Cart::subtotal()}} $</span></li>
                            </ul>

                            <div class="cart-btn mt-100">
                            @if($hda->trangthai == 1)
                            <a href="{{route('huy',['hds'=>$bill])}}" class="btn amado-btn w-100">Cancel order</a>
                            @elseif($hda->trangthai == 0)
                            <a href="{{route('datlai',['hds'=>$bill])}}" class="btn amado-btn w-100">Reorder</a>
                           @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection