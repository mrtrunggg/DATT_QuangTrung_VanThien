@extends('userAccount.partials.index')
@section('content')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row" style="justify-content: center">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                        @if(session('notice'))
                            <div class="alert alert-success">
                             {{session()->get('notice')}}
                            </div> 
                            @elseif(session('notice1'))
                            <div class="alert alert-danger">
                             {{session()->get('notice1')}}
                            </div> 
                            @endif
                            <form acction="{{route('postchangepassword',$id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                                    <div class="col-12 mb-3">
                                        <lable> Old Password</labe>
                                        <input type="text" class="form-control" name="oldpass"  placeholder="Old Password">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <lable> New Password</lable>
                                        <input type="text" class="form-control" name="newpass"  placeholder="New Password">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <lable> Re-Enter a new password
                                        </lable>
                                        <input type="text" class="form-control" name="renewpass"  placeholder="Re-New Password" >
                                    </div>
                                </div>
                                <div class="amado-btn-group mt-30 mb-100">
                              <button type="submit" class="btn amado-btn mb-15">Change</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection 