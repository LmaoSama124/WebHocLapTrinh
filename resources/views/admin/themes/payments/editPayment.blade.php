@extends('admin.layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh sửa thanh toán</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#"><i class="icon-home"></i></a>
        </li>
        <li class="separator"><i class="icon-arrow-right"></i></li>
        <li class="nav-item"><a href="#">Payments</a></li>
        <li class="separator"><i class="icon-arrow-right"></i></li>
        <li class="nav-item"><a href="#">Chỉnh sửa</a></li>
      </ul>
    </div>

    <div class="row">
      <form action="{{ route('admin.payments.update', $payment->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form chỉnh sửa thanh toán</div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">

                  <div class="form-group">
                    <label for="user_id">ID User</label>
                    <input type="number" name="user_id" class="form-control" id="user_id" value="{{ $payment->user_id }}" required />
                  </div>

                  <div class="form-group">
                    <label for="name_user">Tên User</label>
                    <input type="text" name="name_user" class="form-control" id="name_user" value="{{ $payment->name_user }}" required />
                  </div>

                  <div class="form-group">
                    <label for="course_id">ID Course</label>
                    <input type="number" name="course_id" class="form-control" id="course_id" value="{{ $payment->course_id }}" required />
                  </div>

                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $payment->title }}" required />
                  </div>

                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" id="amount" value="{{ $payment->amount }}" required />
                  </div>

                  <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-select" id="status">
                      <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                      <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                      <option value="refunded" {{ $payment->status == 'refunded' ? 'selected' : '' }}>Hoàn trả</option>
                      <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Thất bại</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="comment">Ghi chú</label>
                    <textarea name="comment" class="form-control" id="comment">{{ $payment->comment }}</textarea>
                  </div>

                </div>
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-primary" type="submit">Cập nhật</button>
              <button class="btn btn-danger" type="reset">Reset</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection