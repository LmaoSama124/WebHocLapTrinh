@extends('admin.layouts.admin')

@section('content') 
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Chỉnh sửa bài giảng</h3>
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
                    <a href="{{ route('admin.lessons.index') }}">Danh sách bài giảng</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Chỉnh sửa bài giảng</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id_course" class="form-label">ID Khóa Học</label>
                                <input type="text" class="form-control" name="id_course" value="{{ $lesson->id_course }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="{{ $lesson->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="chapter" class="form-label">Chương</label>
                                <input type="text" class="form-control" name="chapter" value="{{ $lesson->chapter }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection