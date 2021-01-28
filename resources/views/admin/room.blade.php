@extends('layouts.admin')

@section('admin' , 'ECOCForum')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3" >
        <div class="div_newpost">
            <button type="button" class="newpost" data-toggle="modal"  data-whatever="@mdo" onclick="createroom()">
            <img src="{{ asset('img/createpost.svg') }}" alt="">
            {{ __('messages.Create Room') }}
            </button>
        </div>
        </div>
    </div>
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
                @foreach ($rooms as $item)
                <tr>
                    <td>
                    <div class="">
                        <div class="forum_name">{{ $item->name }}</div>
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
    <form action="{{url('admin/adminupdateroom')}}" method="post">
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
                    <input type="text" class="form-control" id="id" name="id" style="display: none">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">{{ __('messages.Message') }}:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">{{ __('messages.Message') }}:</label>
                    <input type="text" class="form-control" id="decision" name="decision">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">{{ __('messages.Message') }}:</label>
                    <input type="text" class="form-control" id="status" name="status">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-danger btn-cencelpost" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-createpost">Update</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{url('/admin/createroom')}}" method="post">
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
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">{{ __('messages.Name') }}:</label>
                    <input type="text" class="form-control" name="name" placeholder="Create Name" required="" oninvalid="this.setCustomValidity('Please Enter Name')">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Decision:</label>
                    <input type="text" class="form-control" name="decision" placeholder="Create Title" required="" oninvalid="this.setCustomValidity('Please Enter Title.')">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">status:</label>
                    <input type="text" class="form-control" name="status" placeholder="Create Title" required="" oninvalid="this.setCustomValidity('Please Enter Title.')">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-danger btn-cencelpost" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success btn-createpost">Update</button>
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
            var url = '<?php echo route("admineditroom") ?>'
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:url,
                data:{id:id},
                success:function(data){
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#decision').val(data.decision); 
                    $('#status').val(data.status);               }
            });
        });

        $(".deleteadmin").click(function() {
            var id = this.id;
            var url = '<?php echo route("admindeleteroom") ?>'
            Swal.fire({
                Swtitle: "Are you sure?",
                text: "Once deleted, you will not be able to recover this room !",
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
                            title: "Deleted!",
                            text: "This comment has been deleted!",
                            type: "success",
                            timer: 2000
                            })
                            .then(function () {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
    function createroom() {
         $('#exampleModal').modal();
        }
</script>
@endsection
