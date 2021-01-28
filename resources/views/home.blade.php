@extends('layouts.app')

@section('title' , 'ECOCForum')
@section('content')
<div class="container bg-white pl-5 pr-5 pb-5 showpost">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3 pl-4 pr-3 mt-4" >
          <div class="div_headname">
            @foreach ($roomtitle as $item)
                {{ $item->name}}
            @endforeach
            {{ __('messages.Forum') }}</div>
          <div class="div_newpost">
            <button type="button" class="newpost" data-toggle="modal"  data-whatever="@mdo" onclick="createpost()">
              <img src="{{ asset('img/createpost.svg') }}" alt="">
              {{ __('messages.NEW POST') }}
            </button>
          </div>
        </div>
    </div>
    <div class="">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width:60%">{{ __('messages.Topic') }}</th>
            <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Repiles') }}</th>
            <th scope="col" style="width:8%; text-align:right;">{{ __('messages.Views') }}</th>
            <th scope="col" class="postdate" style="width:19%; text-align:right;">{{ __('messages.Post Date') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $item)
            <tr>
              <td>
                <div class="">
                  <div class="forum_name"><a href="/post/{{$item->id}}">{{ $item->name }}</a></div>
                  <div class="forum_sub_title">
                    {{ substr($item->title,0,120) }} 
                    @if (Auth::check() == 1) 
                      <img id="{{$item->id}}" class="{{ Auth::user()->id ==  $item->users_id ? 'editpost' : 'null' }}" src="{{ asset('img/pencil.svg') }}" alt="">
                      <img id="{{$item->id}}" class="{{ Auth::user()->id ==  $item->users_id ? 'deletepost' : 'null' }}" src="{{ asset('img/trash.svg') }}" alt="">
                    @endif
                  </div>
                </div>
              </td>
              <td style="text-align:right;">{{ $item->comment()->count() }}</td>
              <td style="text-align:right;">{{ $item->postview()->count() }}</td>
              <td style="text-align:right;" class="postdate">
                @php
                $cls_date = new DateTime($item->created_at);
                $newdate = $cls_date->format('d-M-Y');
                @endphp
                {{  substr($newdate,0,15) }}  
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2" style="float: right;">
        {{ $posts->links('pagination')}}
      </div>
    </div>
    <form action="{{url('/post')}}" method="post">
      @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.New Topic') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <select class="form-control form-control-lg" style="font-size: 13px;" name="selectroom" id="selectroom">
                    <option>{{ __('messages.Select Room') }}</option>
                    @foreach ($rooms as $item)
                      <option>{{$item->id}} {{$item->name}}</option>
                    @endforeach
                  </select>
                  <select class="form-control form-control-lg mt-2" style="font-size: 13px;" name="selecttype" id="selecttype">
                    <option>{{ __('messages.Select Type') }}</option>
                    @foreach ($types as $item)
                      <option>{{$item->id}} {{$item->name}}</option>
                    @endforeach
                  </select>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.Name') }}:</label>
                    <input type="text" class="form-control" name="name" placeholder="{{ __('messages.Create Name') }}" required="" oninvalid="this.setCustomValidity('Please Enter Name')">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.Title') }}:</label>
                    <input type="text" class="form-control" name="title" placeholder="{{ __('messages.Create Title') }}" required="" oninvalid="this.setCustomValidity('Please Enter Title.')">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">{{ __('messages.Message') }}:</label>
                    <textarea class="form-control" name="detail" placeholder="{{ __('messages.Create Detail') }}" required="" oninvalid="this.setCustomValidity('Please Enter Detail')"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-cencelpost" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                <button type="submit" class="btn btn-createpost">{{ __('messages.Create') }}</button>
              </div>
            </div>
          </div>
        </div>
    </form>
    <form action="{{url('/post/updatepost')}}" method="post">
      @csrf
        <div class="modal fade" id="updatepost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.Update post') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                      <input type="text" class="form-control" id="idpost" name="idpost" style="display: none">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.Name') }}:</label>
                    <input type="text" class="form-control" id="namepost" name="namepost" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.Title') }}:</label>
                    <input type="text" class="form-control" id="titlepost" name="titlepost" >
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">{{ __('messages.Message') }}:</label>
                      <textarea class="form-control" id="detailpost" name="detailpost"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cencelpost" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                    <button type="submit" class="btn btn-createpost">{{ __('messages.Update') }}</button>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  $( document ).ready(function() {

    $(".editpost").click(function() {
        $('#updatepost').modal();
        var id = this.id;
        var url = '<?php echo route("editpost") ?>'
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:url,
            data:{id:id},
            success:function(data){
                $('#idpost').val(data.id);
                $('#namepost').val(data.name);
                $('#titlepost').val(data.title);
                $('#detailpost').val(data.detail);
            }
        });
    });

     
    $(".deletepost").click(function() {
      var id = this.id;
      var url = '<?php echo route("deletepost") ?>'
      Swal.fire({
        title: "{{ trans('messages.Are you sure') }}",
        text: "{{ trans('messages.delete post') }}",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "{{ trans('messages.No') }}",
        confirmButtonText: "{{ trans('messages.Yes') }}",
      })
      .then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'POST',
              url:url,
              data:{id:id},
              success:function(data){
                Swal.fire({
                  title: "{{ trans('messages.Deleted') }}",
                  text: "{{ trans('messages.This comment') }}",
                  type: "success",
                  // timer: 2000
                  }).then(function () {
                      location.reload();
                  });
              }
          });
        }
      });
    });
  });

  function createpost()
    {
      if("{{Auth::check()}}" == false){
        window.location.href = "{{route('login')}}";
    }else{
        $('#exampleModal').modal();
      }
  }
</script>
@endsection
