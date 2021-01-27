@extends('layouts.app')
@section('title' , 'ECOCForum')
@section('content')
<div class="container "><div class="selectroomhead"> {{ __('messages.Select Forum') }}</div></div>
<div class="container">
    <div class="container bg-white showpostmain">
        <div class="row justify-content-center">
          @foreach ($rooms as $item)
            <div class="col-md-3 border-seilecroom">
               <div class="selectroom">
               <a href="/dashboard/{{$item->id}}">
                <img src="{{ asset('img/roomicon')}}/icon{{$item->id}}.svg" alt="">
                {{ $item->name }}
               </a>
               </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center mb-5 ">
        <div class="col-md-12">
            <div class="card mt-1 bg-white showpost">
                <div class="p-5">
                    <div class="font-weight-bold forum_sub_head_detail">{{ $posts->name}}</div>
                    <div class="forum_sub_date_detail">{{$posts->created_at->format('d-M-Y')}} : {{( $posts->user->name)}}</div>
                    <div class="forum_sub_title_detail"><p>{{ $posts->title }}</p></div>
                    <div class="forum_sub_title">{!! $posts->detail !!}</div>
                </div>
            </div>
            <div class="reply_comment">
                <div class="view">
                    {{$posts->comment()->get()->count()}} {{ __('messages.commemtpost') }}
                </div>
                <div class="reply" onclick="commentpost()">
                    {{ __('messages.Replycommemt') }}
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
                        <div class="profile_name">Mr.{{ $comment->user->name}}</div>
                    </div>
                    <div class="pb-2 pl-5 pr-5">
                        <p>{{ $comment->detail}}</p>
                    </div>
                    <div class="reply_comment_post">
                        <div class="view">
                            {{$comment->created_at->format('d-M-Y')}}
                        </div>
                        @if (Auth::check() == 1) 
                            <div id="{{$comment->id}}" class="{{ Auth::user()->id ==  $comment->user->id ? 'deletecomment' : 'null' }}">
                                <img src="{{ asset('img/trash.svg') }}" alt="">
                            </div>
                            <div id="{{$comment->id}}" class="{{ Auth::user()->id ==  $comment->user->id ? 'viewcomment' : 'null' }}">
                                <img src="{{ asset('img/pencil.svg') }}" alt="">
                            </div>
                        @endif
                        <div class="reply" onclick="commentpost()">
                            {{ __('messages.Replycommemt') }}
                            <img src="{{ asset('img/reply.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- create comment --}}
    <form action="{{url('/comment')}}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.New Comment') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="postid" value="{{ $posts->id }}" style="display: none">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="comment" placeholder="{{ __('messages.Create Comment') }}" required></textarea>
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
    {{-- update comment --}}
    <form action="{{url('/comment/update')}}" method="post">
        @csrf
        <div class="modal fade" id="updatecomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.Update Comment') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="commentid" name="commentid" style="display: none">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="updatedetail" name="updatedetail" placeholder="Create Comment" required></textarea>
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

            $(".viewcomment").click(function() {
                $('#updatecomment').modal();
                var id = this.id;
                var url = '<?php echo route("selectupdatecomment") ?>'    
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url:url,
                    data:{id:id},
                    success:function(data){
                       $('#commentid').val(data.id);
                       $('#updatedetail').val(data.detail);
                    }
                });
            });

            
            $(".deletecomment").click(function() {
                var id = this.id;
                var url = '<?php echo route("deletecomment") ?>'
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this comment !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type:'POST',
                            url:url,
                            data:{id:id},
                            success:function(data){
                                swal("This comment has been deleted!", {
                                    icon: "success",
                                    timer: 3000,
                                }).then(function () {
                                    location.reload();
                                });;
                            }
                        });
                    }
                });
            });

        });

        function commentpost() {

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
