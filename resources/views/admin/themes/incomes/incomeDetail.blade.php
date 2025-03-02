@extends('admin.layouts.admin')

@section('content') 
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Chi tiết thu nhập</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('#') }}">Danh sách thu nhập</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Chi tiết thu nhập</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Trường</th>
                            <th>Dữ liệu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td>{{ $income->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tổng số người mua</strong></td>
                            <td>{{ $income->total_buyer }}</td>
                        </tr>
                        <tr>
                            <td><strong>Số tiền</strong></td>
                            <td>{{ number_format($income->amount, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <td><strong>Tháng tổng hợp</strong></td>
                            <td>{{ $income->time }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ngày tạo</strong></td>
                            <td>{{ $income->created_at }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ngày cập nhật</strong></td>
                            <td>{{ $income->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('#') }}" class="btn btn-secondary mt-3">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection