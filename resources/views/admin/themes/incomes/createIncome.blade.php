@extends('admin.layouts.admin')

@section('content') 
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Thêm mới thống kê thu nhập</h3>
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
                    <a href="{{ route('admin.incomes.index') }}">Danh sách thu nhập</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm mới thống kê thu nhập</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.incomes.update', $income->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="user_id" class="form-label">Tổng số người mua</label>
                                <input type="text" class="form-control" name="user_id" placeholder="Điền số người mua..." required>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Tổng số thu nhập</label>
                                <input type="text" class="form-control" name="amount" placeholder="Điền tổng số tiền..." required>
                            </div>

                            <div class="mb-3">
                                <label for="time" class="form-label">Thu nhập của tháng</label>
                                <input type="text" class="form-control" name="time" placeholder="Điền tháng thống kê thu nhập..." required>
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
@endsections