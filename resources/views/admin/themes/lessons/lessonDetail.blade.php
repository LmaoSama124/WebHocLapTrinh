@extends('admin.layouts.admin')

@section('content') 
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Chi tiết bài giảng</h3>
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
                    <a href="{{ route('#') }}">Danh sách bài giảng</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Chi tiết bài giảng</a>
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
                            <td>{{ $lesson->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>ID Khóa Học</strong></td>
                            <td>{{ $lesson->id_course }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tiêu đề</strong></td>
                            <td>{{ $lesson->title }}</td>
                        </tr>
                        <tr>
                            <td><strong>Chương</strong></td>
                            <td>{{ $lesson->chapter }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ngày tạo</strong></td>
                            <td>{{ $lesson->created_at }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ngày cập nhật</strong></td>
                            <td>{{ $lesson->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('#') }}" class="btn btn-secondary mt-3">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection