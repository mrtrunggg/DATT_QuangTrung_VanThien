@extends('userAccount.partials.index')
@section('content')
<div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Purchase history</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Total</th>
                                        <th>Describe</th>
                                        <th>Informtion</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($hd as $sp)
                                    <tr>
                                        <td class="cart_product_img">
                                           {{$sp->ngaylap}}
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$sp->tongtien}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{$sp->mota}}</span>
                                        </td>
                                        <td>{{$sp->thongtinnguoinhan}}</td>
                                        @if ($sp->trangthai == 0)
                                        <td>Cancelled</td>
                                        <td><a href="{{route('datlai',['id'=>$id,'hds'=>$sp->id])}}">Reorder</td>
                                        @elseif($sp->trangthai == 1)
                                        <td>Awaiting Approval</td>
                                        <td><a href="{{route('huy',['id'=>$id,'hds'=>$sp->id])}}">Cancel order</td>
                                        @else
                                        <td>Approval</td>
                                        <td><a href="{{route('huy',['id'=>$id,'hds'=>$sp->id])}}">Cancel order</td>
                                        @endif
                                        @empty
                                        <td>Không có hóa đơn</td>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
@endsection