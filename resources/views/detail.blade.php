@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5 ">
        <div class="col-md-12">
            <div class="card mt-1 bg-white showpost">
                <div class="p-5">
                    <div class="font-weight-bold forum_sub_head_detail">{{ $posts->name }}</div>
                    <div class="forum_sub_date_detail">{{ $posts->created_at}}</div>
                    <div class="forum_sub_title_detail"><p>{{ $posts->title }}</p></div>
                    <div class="forum_sub_title">{!! $posts->detail !!}</div>
                </div>
            </div>
            <div class="reply_comment">
                <div class="view">
                    {{-- @php
                        $totalcomment=0;
                    @endphp
                    @foreach ($posts->comment()->get() as $comment)
                    @php
                        $totalcomment++;
                    @endphp
                    @endforeach --}}
                    {{$posts->comment()->get()->count()}}
                </div>
                <div class="reply" onclick="commentpost()">
                    Reply
                    <img src="{{ asset('img/reply.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="border-head mb-4"></div>
    @foreach ($posts->comment()->get() as $comment)
        <div class="row justify-content-center mb-1 border-bottom">
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="profile mb-2">
                    <img src="{{ asset('img/img_avatar.png') }}" alt="">
                    <div class="profile_name"> Mr.{{ $comment->user->name}}</div>
                    </div>
                    <div class="pb-2 pl-5 pr-5">
                        <p>{{ $comment->detail}}</p>
                    </div>
                    <div class="reply_comment_post">
                        <div class="view">
                            {{$comment->created_at->format('d-M-Y')}}
                        </div>
                        <div class="reply" onclick="commentpost()">
                            Reply
                            <img src="{{ asset('img/reply.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <form action="{{url('/home/comment')}}" method="post">
        @csrf
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Comment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="postid" value="{{ $posts->id }}" style="display: none">
                  </div>
                <div class="modal-body">
                    <div class="form-group">
                      <textarea class="form-control" name="comment" placeholder="Create Comment" required></textarea>
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

        function commentpost()
            {
            if("{{Auth::check()}}" == false){
                window.location.href = "{{route('login')}}";
            }else{
                $('#exampleModal').modal();
            }
            }
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(()=>{
            CKEDITOR.replace( 'summary-ckeditor' );
        })
    </script> --}}
@endsection
