@extends('layouts.app')

@section('title' , 'ECOCForum')
@section('content')
<div class="container mt-5 mb-3 bgnew">
  <div class="row justify-content-center" >
    <div class="col-md-12 head_loom">
      <div class="headtext">
        {{ __('messages.Medium') }}
      </div>
    </div>
    <div class="col-md-12 ">
      <div class="owl-carousel owl-theme mt-3 mb-4">
        @foreach ($response['items'] as $item)
          <div class="item">
            {{-- {{dd( $item)}} --}}
            <div><img src="{{$item['thumbnail']}}" alt=""></div>
            <div class="text"><a href="{{$item['link']}}" target="_blank">{{$item['title']}}</a></div>
          </div>
        @endforeach
      </div>
      <div class="medium_viewall"><a href="https://medium.com/@ECOChain_EN" target="_blank">{{ __('messages.View ALL') }}</a></div>
    </div>
  </div>
</div> 
<div class="container mb-4" style="border-bottom: 1px solid #cccccc;"></div>
<div class="container selectroomhead decktopselect mt-5">{{ __('messages.Select Forum') }}</div>
<div class="container bg-white showpostmain decktopselect">
  <div class="row justify-content-center">
    @foreach ($rooms as $item)
      <div class="col-md-3 col-sm-3 col-3 border-seilecroom p-0">
        <a href="/dashboard/{{$item->id}}" class="selectroom">
          <img src="{{ asset('img/roomicon')}}/icon{{$item->id}}.svg" alt="">
          <div class="text">{{ $item->name }}</div>
        </a>
      </div>
    @endforeach
  </div>
</div> 
<div class="container mobileselect" style="padding:0px; margin-top:20px; margin-bottom: 20px;" >
  <div class="dropdown ">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{ __('messages.Select Forum') }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      @foreach ($rooms as $item)
        <a class="dropdown-item" href="/dashboard/{{$item->id}}">
          <img src="{{ asset('img/roomicon')}}/icon{{$item->id}}.svg" alt="">
          {{ $item->name }}
        </a>
      @endforeach 
    </div>
  </div>
</div>
<div class="container selectroomhead mt-4 {{ count($posts) != 0 ? 'show' : "notshow" }}"> {{ __('messages.Hot Forum') }}</div>
<div class="container bg-white showpostmain {{ count($generals) != 0 ? 'show' : "notshow" }}">
    <div class="row justify-content-center">
        <div class="col-md-12 head_loom">
          <div class="headtext">
            <img src="{{ asset('img/mainicon/icon1.svg')}}" alt="">
            @foreach ($rooms as $item)
                @if ( $item->id == 1)
                  {{ $item->name }}
                @endif
            @endforeach
          </div>
        </div>
        <div class="headtable">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
                <th scope="col" style="width:8% ;text-align:right">{{ __('messages.Repiles') }}</th>
                <th scope="col" style="width:8% ;text-align:right;">{{ __('messages.Views') }}</th>
                <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($generals as $general)
                  <tr>
                    <td class="pl-5">
                      <div class="">
                        <div class="forum_name"><a href="/post/{{$general->id}}">{{ $general->name }}</a></div>
                        <div class="forum_sub_title">
                          {{ substr($general->title,0,120) }}     
                        </div>
                      </div>
                    </td>
                    <td style="text-align:right;">{{ $general->comment()->count() }} </td>
                    <td style="text-align:right;">{{ $general->postview()->count() }}</td>
                    <td style="text-align:right;" class="pr-5 postdate">
                      @php
                      $cls_date = new DateTime($general->created_at);
                      $newdate = $cls_date->format('d-M-Y');
                      @endphp
                      {{  substr($newdate,0,15) }}  
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="tablefooter">
          <div class="viewall"><a href="/dashboard/1">{{ __('messages.View ALL') }}</a></div>
        </div>
    </div>
</div>
{{-- dtwallets --}}
<div class="container bg-white showpostmain {{ count($dtwallets) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon2.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 2)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8% ; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8% ; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($dtwallets as $dtwallet)
                <tr>
                  <td class="pl-5">
                    <div class="">
                      <div class="forum_name"><a href="/post/{{$dtwallet->id}}">{{ $dtwallet->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($dtwallet->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $dtwallet->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $dtwallet->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($dtwallet->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/2">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain {{ count($mbwallets) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon3.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 3)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8% ; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8% ; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($mbwallets as $mbwallet)
                <tr>
                  <td class="pl-5">
                    <div class="">
                      <div class="forum_name"><a href="/post/{{$mbwallet->id}}">{{ $mbwallet->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($mbwallet->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $mbwallet->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $mbwallet->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($mbwallet->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/3">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain {{ count($webwallets) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon4.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 4)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($webwallets as $webwallet)
                <tr>
                  <td class="pl-5">
                    <div class="">
                      <div class="forum_name"><a href="/post/{{$webwallet->id}}">{{ $webwallet->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($webwallet->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $webwallet->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $webwallet->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($webwallet->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/4">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain {{ count($smartcontracts) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon5.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 5)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($smartcontracts as $smartcontract)
                <tr>
                  <td class="pl-5">
                    <div class="">
                      <div class="forum_name"><a href="/post{{$smartcontract->id}}">{{ $smartcontract->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($smartcontract->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $smartcontract->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $smartcontract->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($smartcontract->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/5">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain  {{ count($smartcontracts) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon6.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 6)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($dapps as $dapp)
                <tr>
                  <td class="pl-55">
                    <div class="">
                      <div class="forum_name"><a href="/post/{{$dapp->id}}">{{ $dapp->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($dapp->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $dapp->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $dapp->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($dapp->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/6">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain {{ count($oracles) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon7.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 7)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($oracles as $oracle)
                <tr>
                  <td class="pl-5">
                    <div class="">
                      <div class="forum_name"><a href="/post/{{$oracle->id}}">{{ $oracle->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($oracle->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $oracle->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $oracle->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($oracle->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/7">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain {{ count($defis) != 0 ? 'show' : "notshow" }}">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
          <img src="{{ asset('img/mainicon/icon8.svg')}}" alt="">
          @foreach ($rooms as $item)
              @if ( $item->id == 8)
                {{ $item->name }}
              @endif
          @endforeach
        </div>
      </div>
      <div class="headtable">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="pl-5" style="width:60%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Views') }}</th>
              <th scope="col" class="pr-5 postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($defis as $defi)
                <tr>
                  <td class="pl-5">
                    <div class="">
                      <div class="forum_name"><a href="/post/{{$defi->id}}">{{ $defi->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($defi->title,0,120) }} 
                      </div>
                    </div>
                  </td>
                  <td style="text-align:right;">{{ $defi->comment()->count() }} </td>
                  <td style="text-align:right;">{{ $defi->postview()->count() }}</td>
                  <td style="text-align:right;" class="pr-5 postdate">
                    @php
                    $cls_date = new DateTime($defi->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="tablefooter">
        <div class="viewall"><a href="/dashboard/8">{{ __('messages.View ALL') }}</a></div>
      </div>
  </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
  jQuery(document).ready(function($){

    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
        0:{
          items:1
        },
        600:{
          items:2
        },
        1000:{
          items:4
        }
      }
    })
  })

</script>
@endsection