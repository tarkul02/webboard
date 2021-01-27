@extends('layouts.admin')

@section('admin' , 'ECOCForum')
@section('content')
    <div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col" style="">{{ __('messages.Topic') }}</th>
                <th scope="col" class="postdate" style="text-align:right; width: 15%">{{ __('messages.Post Date') }}</th>
                <th scope="col" class="postdate" style="text-align:right; width: 10%">edit</th>
                <th scope="col" class="postdate" style="text-align:right; width: 10%">delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $item)
                <tr>
                    <td>
                    <div class="">
                        <div class="forum_name">{{ $item->detail }}</div>
                        <div class="forum_sub_title">{{ substr($item->title,0,120) }}</div>
                    </div>
                    </td>
                    <td style="text-align:right;" class="postdate">
                    @php
                    $cls_date = new DateTime($item->created_at);
                    $newdate = $cls_date->format('d-M-Y');
                    @endphp
                    {{  substr($newdate,0,15) }}  
                    </td>
                    <td style="text-align:right;"> <img id="{{$item->id}}" class="editadmin" src="{{ asset('img/pencil.svg') }}" alt=""></td>
                    <td style="text-align:right;"><img id="{{$item->id}}" class="deleteadmin" src="{{ asset('img/trash.svg') }}" alt=""></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{url('admin/adminupdatecomment')}}" method="post">
    @csrf
        <div class="modal fade" id="updatepost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="idcomment" name="idcomment" style="display: none">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">{{ __('messages.Message') }}:</label>
                    <textarea class="form-control" id="detailcomment" name="detailcomment"></textarea>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cencelpost" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                    <button type="submit" class="btn btn-createpost">Update</button>
                </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('javascript')
<script type="text/javascript">
    $( document ).ready(function() {
        $(".editadmin").click(function() {
            $('#updatepost').modal();
            var id = this.id;
            var url = '<?php echo route("admineditcomment") ?>'
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:url,
                data:{id:id},
                success:function(data){
                    console.log(data);
                    $('#idcomment').val(data.id);
                    $('#detailcomment').val(data.detail);
                }
            });
        });

        $(".deleteadmin").click(function() {
            var id = this.id;
            console.log(id);
            var url = '<?php echo route("admindeletecomment") ?>'
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this post !",
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
                            console.log(data);
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
</script>
@endsection
