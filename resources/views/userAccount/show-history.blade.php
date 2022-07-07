@extends('userAccount.partials.index')
@section('content')
<div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Purchase history</h2>
                        </div>
                        <div class="cart-table clearfix">
                        @if(session('succes'))
                        <div class="alert alert-success">
                            {{session()->get('succes')}}
                            </div> 
                            @endif
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Total</th>
                                        <th>Describe</th>
                                        <th>Informtion</th>
                                        <th>Status</th>
                                        
                                        <th>Function</th>
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
                                      
                                        <td><a class="btn amado-btn w-100" href="{{route('datlai',['id'=>$id,'hds'=>$sp->id])}}">Reorder</a></td><td> <a class="btn amado-btn w-100" href="{{route('viewbill',['id'=>$id,'bill'=>$sp->id])}}">View</a></td>
                                        @elseif($sp->trangthai == 1)
                                        <td>Awaiting Approval</td>
                                        <td><a class="btn amado-btn w-100" href="{{route('huy',['id'=>$id,'hds'=>$sp->id])}}">Cancel order</a></td><td> <a class="btn amado-btn w-100" href="{{route('viewbill',['id'=>$id,'bill'=>$sp->id])}}">View</a></td>
                                        @else
                                        <td>Approval</td>
                                        <td><a class="btn amado-btn w-100" href="{{route('huy',['id'=>$id,'hds'=>$sp->id])}}">Cancel order</a></td><td> <a class="btn amado-btn w-100" href="{{route('viewbill',['id'=>$id,'bill'=>$sp->id])}}">View</a></td>
                                        @endif
                                        @empty
                                        <td>No bills</td>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
@endsection