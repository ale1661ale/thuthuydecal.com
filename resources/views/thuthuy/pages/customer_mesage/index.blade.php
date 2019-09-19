@extends('thuthuy.layouts.master')

@section('title', 'Customer Messages')

@section('breadcrumb', 'customer messages')

@section('content')
	<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Danh sách khách hàng gửi tin nhắn</h6>
    <p class="mg-b-20 mg-sm-b-30"></p>
    <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
            <thead>
            
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $customerMessage as $key => $value )
                <tr>
                    <td>{{ ++$key }}</td>

                    <td>{{ $value->name }}</td>

                    <td>{{ $value->email }}</td>

                    <td>{{ $value->phone }}</td>

                    <td>
                    	<label>Subject :</label>{{ $value->subject }}<br>
                    	<label>Message :</label>{{ $value->message }}
                    </td>

                    <td>
                        <button class="btn btn-danger deleteContact" title="{{ 'Delete '.$value->name }}" data-toggle="modal" data-target="#deleteContact" data-id="{{ $value->id }}">
                            <i class="fa fa-eraser" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- table-wrapper -->
</div><!-- card -->
<!-- delete Modal-->
<div class="modal fade" id="deleteContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left: 183px;">
                <button type="button" class="btn btn-success delContact">Có</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
            <div>
        </div>
    </div>
</div>
@endsection