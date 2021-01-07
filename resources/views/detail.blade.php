@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5 mt-5">
        <div class="col-md-12">
            <div class="card mt-1 bg-white">
                <div class="p-5">
                    <div class="font-weight-bold forum_sub_head_detail">{{ $posts->name }}</div>
                    <div class="forum_sub_date_detail">{{ $posts->created_at}}</div>
                    <div class="forum_sub_title_detail"><p>{{ $posts->title }}</p></div>
                    <div class="forum_sub_title">{{ $posts->detail }}</div>
                    <p>After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:</p>
                </div>
            </div>
            <div class="reply_comment">
                <div class="view">
                    30 Comment
                </div>
                <div class="reply">
                    Reply
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: -5px; margin-top: -10px" width="30" height="30" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                        <path d="M9.502 5.013a.144.144 0 0 0-.202.134V6.3a.5.5 0 0 1-.5.5c-.667 0-2.013.005-3.3.822-.984.624-1.99 1.76-2.595 3.876C3.925 10.515 5.09 9.982 6.11 9.7a8.741 8.741 0 0 1 1.921-.306 7.403 7.403 0 0 1 .798.008h.013l.005.001h.001L8.8 9.9l.05-.498a.5.5 0 0 1 .45.498v1.153c0 .108.11.176.202.134l3.984-2.933a.494.494 0 0 1 .042-.028.147.147 0 0 0 0-.252.494.494 0 0 1-.042-.028L9.502 5.013zM8.3 10.386a7.745 7.745 0 0 0-1.923.277c-1.326.368-2.896 1.201-3.94 3.08a.5.5 0 0 1-.933-.305c.464-3.71 1.886-5.662 3.46-6.66 1.245-.79 2.527-.942 3.336-.971v-.66a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.667z"/>
                    </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: -5px; margin-top: -10px" width="25" height="25" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                            <path d="M9.502 5.013a.144.144 0 0 0-.202.134V6.3a.5.5 0 0 1-.5.5c-.667 0-2.013.005-3.3.822-.984.624-1.99 1.76-2.595 3.876C3.925 10.515 5.09 9.982 6.11 9.7a8.741 8.741 0 0 1 1.921-.306 7.403 7.403 0 0 1 .798.008h.013l.005.001h.001L8.8 9.9l.05-.498a.5.5 0 0 1 .45.498v1.153c0 .108.11.176.202.134l3.984-2.933a.494.494 0 0 1 .042-.028.147.147 0 0 0 0-.252.494.494 0 0 1-.042-.028L9.502 5.013zM8.3 10.386a7.745 7.745 0 0 0-1.923.277c-1.326.368-2.896 1.201-3.94 3.08a.5.5 0 0 1-.933-.305c.464-3.71 1.886-5.662 3.46-6.66 1.245-.79 2.527-.942 3.336-.971v-.66a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.667z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-1 border-bottom">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="profile mb-2">
                    <img src="{{ asset('img/img_avatar.png') }}" alt="">
                    <div class="profile_name"> Mr.test2</div>
                 </div>
                <div class=" pb-2 pl-5 pr-5">
                    <p>After the successful EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:After the successful launching of EFG dApp lending, we currently have 2 pool loans available for lending. In each pool will have 100K EFG inside. The following are the names and addresses of the pool loans:</p>
                </div>
                <div class="reply_comment_post">
                    <div class="view">
                        Nov '20
                    </div>
                    <div class="reply">
                        Reply
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: -5px; margin-top: -10px" width="25" height="25" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                            <path d="M9.502 5.013a.144.144 0 0 0-.202.134V6.3a.5.5 0 0 1-.5.5c-.667 0-2.013.005-3.3.822-.984.624-1.99 1.76-2.595 3.876C3.925 10.515 5.09 9.982 6.11 9.7a8.741 8.741 0 0 1 1.921-.306 7.403 7.403 0 0 1 .798.008h.013l.005.001h.001L8.8 9.9l.05-.498a.5.5 0 0 1 .45.498v1.153c0 .108.11.176.202.134l3.984-2.933a.494.494 0 0 1 .042-.028.147.147 0 0 0 0-.252.494.494 0 0 1-.042-.028L9.502 5.013zM8.3 10.386a7.745 7.745 0 0 0-1.923.277c-1.326.368-2.896 1.201-3.94 3.08a.5.5 0 0 1-.933-.305c.464-3.71 1.886-5.662 3.46-6.66 1.245-.79 2.527-.942 3.336-.971v-.66a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.667z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    {{-- <script type="text/javascript">
        $(document).ready(()=>{
            CKEDITOR.replace( 'summary-ckeditor' );
        })
    </script> --}}
@stop
