@extends('admin.layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh sửa thanh toán</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a>
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
                    <label for="id_user">ID User</label>
                    <input type="number" name="id_user" class="form-control" id="id_user" value="{{ $payment->id_user }}" required />
                  </div>

                  <div class="form-group">
                    <label for="id_course">ID Course</label>
                    <input type="number" name="id_course" class="form-control" id="id_course" value="{{ $payment->id_course }}" required />
                  </div>

                  <div class="form-group">
                    <label for="payment_method">Phương thức thanh toán</label>
                    <select name="payment_method" class="form-select" id="payment_method">
                      <option value="vn_pay" {{ $payment->payment_method == 'vn_pay' ? 'selected' : '' }}>VN Pay</option>
                      <option value="banking" {{ $payment->payment_method == 'banking' ? 'selected' : '' }}>Banking</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input type="number" step="0.01" name="amount" class="form-control" id="amount" value="{{ $payment->amount }}" required />
                  </div>

                  <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-select" id="status">
                      <option value="waiting" {{ $payment->status == 'waiting' ? 'selected' : '' }}>Đang chờ</option>
                      <option value="success" {{ $payment->status == 'success' ? 'selected' : '' }}>Thành công</option>
                      <option value="canceled" {{ $payment->status == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
                    </select>
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
