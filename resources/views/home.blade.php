@extends('layouts.app')

@section('title' , 'Home Page')
@section('content')
<div class="container bg-white pl-5 pr-5 pb-5 showpost">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3 pl-4 pr-3 mt-4" >
          <div class="div_headname">ECOCForum</div>
          <div class="div_newpost">
            <button type="button" class="newpost" data-toggle="modal"  data-whatever="@mdo" onclick="createpost()">
              <img src="{{ asset('img/createpost.svg') }}" alt="">
            NEW POST
            </button>
          </div>
        </div>
    </div>
    <div class="">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width:65%">Topic</th>
            <th scope="col" style="width:10%">Repiles</th>
            <th scope="col" style="width:10%">Views</th>
            <th scope="col" style="width:15%; text-align:right;">Post Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $item)
            <tr>
              <td>
                <div class="">
                  <div class="forum_name"><a href="/home/{{$item->id}}">{{ $item->name }}</a></div>
                  <div class="forum_sub_title">{{ substr($item->title,0,120) }}</div>
                </div>
              </td>
              <td>5</td>
              <td>50</td>
              <td style="text-align:right;">
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
    </div>
    <form action="{{url('/home/post')}}" method="post">
      @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Create Name" required>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Create Title" required>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" name="detail" placeholder="Create Detail" required></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-cencelpost" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-createpost">Create</button>
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
    // if("{{Auth::check()}}" == false)
    // console.log("{{Auth::check()}}")
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
