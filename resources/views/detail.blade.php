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
                    30 Comment
                </div>
                <div class="reply" onclick="commentpost()">
                    Reply
                    <img src="{{ asset('img/reply.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="border-head mb-4"></div>
    <div class="row justify-content-center mb-1 border-bottom">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="profile mb-2">
                   <img src="{{ asset('img/img_avatar.png') }}" alt="">
                   <div class="profile_name"> Mr.test1</div>
                </div>
                <div class="pb-2 pl-5 pr-5">
                    <p>After the successful  and addresses  pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:</p>
                </div>
                <div class="reply_comment_post">
                    <div class="view">
                        Nov '20
                    </div>
                    <div class="reply">
                        Reply
                        <img src="{{ asset('img/reply.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{url('/home')}}" method="post">
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
