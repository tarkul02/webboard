@extends('layouts.app')

@section('title' , 'Home Page')
@section('content')
<div class="container bg-white pl-5 pr-5 pb-5 showpost">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3 pl-4 pr-3 mt-4" >
          <div class="div_headname">ECOCForum</div>
          <div class="div_newpost">
            <button type="button" class="newpost" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
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
            <th scope="col">Topic</th>
            <th scope="col">Repiles</th>
            <th scope="col">Views</th>
            <th scope="col">Post Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $item)
            <tr>
              <td>
                <div class="">
                  <div class="forum_name"><a href="/home/{{$item->id}}">{{ $item->name }}</a></div>
                  <div class="forum_sub_title">{{ $item->title }}</div>
                </div>
              </td>
              <td>5</td>
              <td>50</td>
              <td>{{$item->created_at}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <form action="{{url('create')}}" method="post">
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
                <form>
                  <div class="form-group">
                      <label for="recipient-name" class="col-form-label">title:</label>
                      <input type="text" class="form-control" id="title-name">
                    </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
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
