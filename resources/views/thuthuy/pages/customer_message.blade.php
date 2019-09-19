@extends('thuthuy.layouts.master')

@section('title', 'Customer Messages')

@section('breadcrumb', 'customer messages')

@section('content')
<div class="card pd-20 pd-sm-40">
    <div class="table-wrapper">
        <h6 class="card-body-title float-left">Quản lý các tin nhắn góp ý từ khách hàng</h6>
     
        <form action="{{ url('thuthuy/customer-messages/del') }}" method="post">

            @csrf

            <button class="btn btn-danger btn-xs delete-all float-left mg-l-10" 
                    data-url="" 
                    id="delete_all"
                    onclick="return confirm('Bạn có chắc muốn xoá dữ liệu đã chọn chứ ?')">
                    Xoá tất cả
            </button>

            <table id="contentss_table" class="table display responsive nowrap">
                <thead>

                <tr>
                    <th style="width:2%;"><input type="checkbox" id="check_all"></th>
                    <th style="width:4%;">STT</th>
                    <th style="width:12%;">Tên khách hàng</th>
                    <th style="width:12%;">Email</th>
                    <th style="width:12%;">Phone</th>
                    <th style="width:10%;">Tiêu đề</th>
                    <th style="width:30%;">Nội dung</th>
                    <th style="width:20%;">Tạo vào lúc</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($customerMessage as $key => $value)
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" value="{{ $value->id }}" name="idMessages[]">
                        </td>

                        <td>{{ ++$key }}</td>

                        <td>
                            <a 
                            href="javascript:void(0)" 
                            data-toggle="modal" 
                            class="deleteMessage"
                            data-target="#deleteMessage"
                            data-id="{{ $value->id }}">
                                {{ $value->name }}
                            </a>
                            
                        </td>

                        <td>{{ $value->email }}</td>
                        
                        <td>{{ $value->phone }}</td>

                        <td>{{ $value->subject }}</td>

                        <td>{{ $value->message }}</td>

                        <td>{{ $value->created_at }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-right">{{ $customerMessage->links() }}</div>

        </form>
    </div><!-- table-wrapper -->
</div><!-- card -->

<!-- delete Modal-->
<div class="modal fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delMessage">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
        </div>
    </div>
</div>

@endsection