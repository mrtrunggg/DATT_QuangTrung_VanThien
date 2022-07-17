@extends('userAccount.partials.index')
@section('content')
<style>

.width123 > th{
    width: 14.2%;
    max-width: 14.2%;
}

.fontsizebtn{
    min-width:70px;
    font-size: 15px !important;
}



</style>
<div class="col-12 col-lg-8">
                        <div class="cart-title mt-50" style="text-transform: uppercase;">
                            <h2>Purchase history</h2>
                        </div>
                        <div class="cart-table clearfix">
                        @if(session('succes'))
                            <script>
    swal("{{session()->get('succes')}}","Please wait for order confirmation.","success");
    </script>
                            @endif
                            <table class="table table-responsive">
                                <thead>
                                    <tr class="width123">
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
                                      
                                        <td>
                                            <a class="fontsizebtn btn amado-btn w-100" href="{{route('datlai',['hds'=>$sp->id])}}">
                                                Reorder
                                            </a>
                                        </td>
                                        <td> 
                                            <a class="btn fontsizebtn amado-btn w-100" href="{{route('viewbill',['bill'=>$sp->id])}}">
                                                View
                                            </a>
                                        </td>
                                        @elseif($sp->trangthai == 1)
                                        <td>Awaiting Approval</td>
                                        <td><a class="btn fontsizebtn amado-btn w-100" href="{{route('huy',['hds'=>$sp->id])}}">Cancel order</a></td>
                                        <td> <a class="btn fontsizebtn amado-btn w-100" href="{{route('viewbill',['bill'=>$sp->id])}}">View</a></td>
                                        @elseif($sp->trangthai == 3)
                                        <td>Being transported</td>
                                        <td></td>
                                        <td> <a class="btn fontsizebtn amado-btn w-100" href="{{route('viewbill',['bill'=>$sp->id])}}">View</a></td>
                                        @else
                                        <td>Approval</td>
                                        <td></td><td> <a class="btn fontsizebtn amado-btn w-100" href="{{route('viewbill',['bill'=>$sp->id])}}">View</a></td>
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

            