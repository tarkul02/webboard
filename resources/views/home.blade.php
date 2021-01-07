@extends('layouts.app')

@section('title' , 'Home Page')
@section('content')
<div class="container bg-white pl-5 pr-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3 mt-5">
           
        </div>
        <div class="col-md-2 mb-3 p-0 mt-5">
            <div class="card">
                <button type="button" class="btn newpost" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" style="margin-top: -2px" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                New Post
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
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
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
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pubilc</button>
              </div>
            </div>
          </div>
      </div>
    </form>
</div>
@endsection
