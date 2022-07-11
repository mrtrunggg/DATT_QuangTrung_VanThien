@extends('shop.partials.index')
@section('content')


<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        
      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix">
        <a href="{{route('aosomi')}}">
          <img src="{{asset('filename/aothun.jpeg')}}" alt="" />
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            {{-- <p>From $180</p> --}}
            <h4>T-shirt</h4>
          </div>
        </a>
      </div>

      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix">
      <a href="{{route('aokhoac')}}">
          <img src="{{asset('filename/aokhoac.jpg')}}" alt="" />
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            {{-- <p>From $180</p> --}}
            <h4>Coat</h4>
          </div>
        </a>
      </div>

      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix">
      <a href="{{route('aothun')}}">
          <img src="{{asset('filename/aosomi.jpeg')}}" alt="" />
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            {{-- <p>From $180</p> --}}
            <h4>
              Shirt
            </h4>
          </div>
        </a>
      </div>

      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix" style="height: 601px;">
      <a href="{{route('quandai')}}">
          <img style="height: 100%" src="{{asset('filename/quantay.jpg')}}" alt="" />
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            {{-- <p>From $180</p> --}}
            <h4>Trousers</h4>
          </div>
        </a>
      </div>

      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix" style="height: 547px;">
      <a href="{{route('quanjean')}}">
          <img style="height: 100%" src="{{asset('filename/quanthundai.jpg')}}" alt="" />
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            {{-- <p>From $18</p> --}}
            <h4>Jeans</h4>
          </div>
        </a>
      </div>

      <!-- Single Catagory -->
      <div class="single-products-catagory clearfix">
      <a href="{{route('quandui')}}">
          <img src="{{asset('filename/goods_69_434850.jpg')}}" alt="" />
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            {{-- <p>From $320</p> --}}
            <h4>Shorts</h4>
          </div>
        </a>
      </div>


    </div>
  </div>
  @endsection
            