@extends('layouts.app')

@section('title' , 'ECOCForum')
@section('content')
<div class="container mb-5 bgnew">
  <div class="row justify-content-center" >
    <div class="col-md-12 head_loom">
      <div class="headtext">
        Medium
      </div>
    </div>
    <div class="col-md-12 ">
      <div class="owl-carousel owl-theme mt-3 mb-4">
        @foreach ($response['items'] as $item)
          <div class="item">
            {{-- {{dd( $item)}} --}}
            <div><img src="{{$item['thumbnail']}}" alt=""></div>
            <div class="text">{{$item['title']}}</div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div> 
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
    @foreach ($rooms as $item)
      <div class="col-md-3 border-seilecroom">
         <div class="selectroom">
          <img src="{{ asset('img/roomicon')}}/icon{{$item->id}}.svg" alt="">
          {{ $item->name }}
         </div>
      </div>
    @endforeach
  </div>
</div> 
<div class="container bg-white showpostmain">
    <div class="row justify-content-center">
        <div class="col-md-12 head_loom">
          <div class="headtext">
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
                <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
                <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
                <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
                <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($generals as $general)
                  <tr>
                    <td>
                      <div class="">
                        <div class="forum_name"><a href="/home/{{$general->id}}">{{ $general->name }}</a></div>
                        <div class="forum_sub_title">
                          {{ substr($general->title,0,120) }} 
                          @if (Auth::check() == 1) 
                            <img id="{{$general->id}}" class="{{ Auth::user()->id ==  $general->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                            <img id="{{$general->id}}" class="{{ Auth::user()->id ==  $general->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                          @endif
                        </div>
                      </div>
                    </td>
                    <td>{{ $general->comment()->count() }} </td>
                    <td>{{ $general->postview()->count() }}</td>
                    <td style="text-align:right;">
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
          <div class="viewall">View All</div>
        </div>
    </div>
</div>
{{-- dtwallets --}}
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($dtwallets as $dtwallet)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$dtwallet->id}}">{{ $dtwallet->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($dtwallet->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$dtwallet->id}}" class="{{ Auth::user()->id ==  $dtwallet->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$dtwallet->id}}" class="{{ Auth::user()->id ==  $dtwallet->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $dtwallet->comment()->count() }} </td>
                  <td>{{ $dtwallet->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($mbwallets as $mbwallet)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$mbwallet->id}}">{{ $mbwallet->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($mbwallet->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$mbwallet->id}}" class="{{ Auth::user()->id ==  $mbwallet->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$mbwallet->id}}" class="{{ Auth::user()->id ==  $mbwallet->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $mbwallet->comment()->count() }} </td>
                  <td>{{ $mbwallet->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($webwallets as $webwallet)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$webwallet->id}}">{{ $webwallet->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($webwallet->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$webwallet->id}}" class="{{ Auth::user()->id ==  $webwallet->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$webwallet->id}}" class="{{ Auth::user()->id ==  $webwallet->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $webwallet->comment()->count() }} </td>
                  <td>{{ $webwallet->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($smartcontracts as $smartcontract)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$smartcontract->id}}">{{ $smartcontract->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($smartcontract->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$smartcontract->id}}" class="{{ Auth::user()->id ==  $smartcontract->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$smartcontract->id}}" class="{{ Auth::user()->id ==  $smartcontract->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $smartcontract->comment()->count() }} </td>
                  <td>{{ $smartcontract->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($dapps as $dapp)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$dapp->id}}">{{ $dapp->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($dapp->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$dapp->id}}" class="{{ Auth::user()->id ==  $dapp->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$dapp->id}}" class="{{ Auth::user()->id ==  $dapp->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $dapp->comment()->count() }} </td>
                  <td>{{ $dapp->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($oracles as $oracle)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$oracle->id}}">{{ $oracle->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($oracle->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$oracle->id}}" class="{{ Auth::user()->id ==  $oracle->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$oracle->id}}" class="{{ Auth::user()->id ==  $oracle->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $oracle->comment()->count() }} </td>
                  <td>{{ $oracle->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
      </div>
  </div>
</div>
<div class="container bg-white showpostmain">
  <div class="row justify-content-center">
      <div class="col-md-12 head_loom">
        <div class="headtext">
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
              <th scope="col" style="width:65%">{{ __('messages.Topic') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Repiles') }}</th>
              <th scope="col" style="width:10%">{{ __('messages.Views') }}</th>
              <th scope="col" style="width:15%; text-align:right;">{{ __('messages.Post Date') }}</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($defis as $defi)
                <tr>
                  <td>
                    <div class="">
                      <div class="forum_name"><a href="/home/{{$defi->id}}">{{ $defi->name }}</a></div>
                      <div class="forum_sub_title">
                        {{ substr($defi->title,0,120) }} 
                        @if (Auth::check() == 1) 
                          <img id="{{$defi->id}}" class="{{ Auth::user()->id ==  $defi->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                          <img id="{{$defi->id}}" class="{{ Auth::user()->id ==  $defi->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $defi->comment()->count() }} </td>
                  <td>{{ $defi->postview()->count() }}</td>
                  <td style="text-align:right;">
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
        <div class="viewall">View All</div>
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
          items:3
        },
        1000:{
          items:4
        }
      }
    })
  })

</script>
@endsection