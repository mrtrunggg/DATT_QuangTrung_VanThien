@extends('shop.partials.index')
@section('content')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
            <form action="{{route('savecheckout',$id)}}" method="post">
                                @csrf
@if(session('erro'))
<div class="alert alert-success">
    {{session()->get('erro')}}
</div> 
@elseif(session('erro1'))
<div class="alert alert-danger">
    {{session()->get('erro1')}}
</div> 
@endif
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>


                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="fullName"  placeholder="Full Name" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="address" placeholder="Address" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="number" class="form-control" name="phoneNo" min="0" placeholder="Phone No" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" name="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>


                                </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                            <li><span>subtotal:</span> <span>{{Cart::subtotal()}} VNĐ</span></li>
                                <li><span>delivery:</span> <span>Miễn phí</span></li>
                                <li><span>total:</span> <span>{{Cart::subtotal()}} VNĐ</span></li>
                                @if(Cart::subtotal() == 0)
                                <input type="hidden" name = "check" value="1">
                                @else
                                <input type="hidden" name ="check" value="2">
                                @endif
                            </ul>
                            <div class="cart-btn mt-100">
                                <button type="submit" class="btn amado-btn w-100">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class ="row">
            <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Your Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
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
                                            <span>{{number_format($cart->price)}} VNĐ</span>
                                        </td>
                                        <td class="qty">
                                            <form method="post" action="{{route('updatecart',$id)}}">
                                                @csrf
                                            <div class="qty-btn d-flex">
                                        
                                                <div class="quantity">
                                                  
                                                    <input type="number"  name="cart_quantity" value="{{$cart->qty}}">
                                                    <input type="hidden" name="rowID" value="{{$cart->rowId}}">
                                                   
                                                </div>
                                                <input type="submit" value="Update" name ="update_qty" class="btn btn-default btn-sm">
                                            </div>
                                            </form>
                                        </td>
                                        <td class="price">
                                            <span>
                                                {{number_format($cart->price * $cart->qty)}} VNĐ
                                            </span>
                                       </td>
                                       <td>
                                        <a href="{{route('deletecart',['id'=>$id,'idSP'=>$cart->rowId])}}"><i class="fa fa-times"></i></a>
                                       </td>
                                    </tr>
                                    @empty
                                    <td class="cart_product_img" colspan="6">
                                    No products
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

   
@endsection