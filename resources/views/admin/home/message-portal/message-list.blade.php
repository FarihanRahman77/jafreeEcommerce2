@extends('admin.master')
@section('title')
    Admin Order-List
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header" style="padding: 0px 1.0rem;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Message List</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">

                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dt_view">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>User Name</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php($i = 1)
                                    @foreach($messages as $message)
                                        <tr>

                                            <td>{{$i++}}</td>
                                            @if($message->admin_id)
                                                <td>Admin</td>

                                            @else
                                                <td>User</td>
                                            @endif
                                            @if($message->userName)
                                                <td>{{$message->userName}}</td>

                                            @else
                                            <td>{{$message->name}}</td>
                                            @endif
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->message}}</td>


                                            <td style="width: 12%;">
                                                <a href="#" class="btn btn-primary btn-sm modalButton"
                                                   title="View" data-table-id={{$message->id}} data-sender-id={{$message->sender_id}}  data-toggle="modal"
                                                   data-target="#replyModal"><i class="fas fa-eye"></i></a>

                                                {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#replyModal">
                                                    Launch demo modal
                                                </button>--}}


                                                {{--<div class="btn-group">
                                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                        <li class="action"><a href="{{url('/order-invoice/'.$order->id)}}" class="btn" ><i class="fas fa-eye"></i> Invoice </a></li>
                                                        <li class="action"><a href="{{url('/invoice/pdf//'.$order->id)}}" class="btn" ><i class="fas fa-print"></i> PDF </a></li>

                                                    </ul>
                                                </div>--}}

                                            </td>

                                        </tr>@endforeach
                                    </tbody>
                                </table>


                                <div class="modal fade" id="replyModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('admin-message-reply')}}" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to
                                                        proceed?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" id="tableIdInput" name="id">

                                                    <input type="hidden" id="senderIdInput" name="sender_id">

                                                    <input type="text" name="message" placeholder="Type your message..">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Reply
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @section('contentJavaScripts')
    <script>
        $('.modalButton').click(function () {
            /*var userId = $(this).attr('data-user-id');
            $("#userIdInput").val(userId);*/

            var tableId = $(this).attr('data-table-id');
            $("#tableIdInput").val(tableId);


            var senderId = $(this).attr('data-sender-id');
            $("#senderIdInput").val(senderId);


        });

    </script>
        @endsection
@endsection