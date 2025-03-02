@extends('admin.layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Quản lý thanh toán</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Payments</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Thêm mới thanh toán</a>
        </li>
      </ul>
    </div>
    
    <div class="row">
      <form action="{{ route('#') }}" method="post">
        @csrf
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form thêm mới thanh toán</div>
            </div>
            
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">

                  <!-- ID User -->
                  <div class="form-group">
                    <label for="id_user">ID User</label>
                    <input type="number" name="id_user" class="form-control" id="id_user" placeholder="Nhập ID người dùng" required />
                  </div>

                  <!-- Name User -->
                  <div class="form-group">
                    <label for="name_user">Tên người dùng</label>
                    <input type="text" name="name_user" class="form-control" id="name_user" placeholder="Nhập tên người dùng" required />
                  </div>

                  <!-- ID Course -->
                  <div class="form-group">
                    <label for="id_course">ID Course</label>
                    <input type="number" name="id_course" class="form-control" id="id_course" placeholder="Nhập ID khóa học" required />
                  </div>

                  <!-- Title -->
                  <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Nhập tiêu đề thanh toán" required />
                  </div>

                  <!-- Amount -->
                  <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Nhập số tiền" required />
                  </div>

                  <!-- Status -->
                  <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-select" id="status" required>
                      <option value="pending">Chờ xử lý</option>
                      <option value="completed">Hoàn thành</option>
                      <option value="refunded">Hoàn trả</option>
                      <option value="failed">Thất bại</option>
                    </select>
                  </div>

                  <!-- Comment -->
                  <div class="form-group">
                    <label for="comment">Ghi chú</label>
                    <textarea name="comment" class="form-control" id="comment" placeholder="Nhập ghi chú"></textarea>
                  </div>

                  <!-- Created at -->
                  <div class="form-group">
                    <label for="created_at">Ngày tạo</label>
                    <input type="datetime-local" name="created_at" class="form-control" id="created_at" />
                  </div>

                  <!-- Updated at -->
                  <div class="form-group">
                    <label for="updated_at">Ngày cập nhật</label>
                    <input type="datetime-local" name="updated_at" class="form-control" id="updated_at" />
                  </div>

                </div>
              </div>
            </div>
            
            <div class="card-action">
              <button class="btn btn-success" type="submit">Thêm thanh toán</button>
              <button class="btn btn-danger" type="reset">Reset</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection