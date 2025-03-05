@extends('admin.layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Quản lý người dùng</h3>
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
          <a href="#">Users</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Thêm mới người dùng</a>
        </li>
      </ul>
    </div>
    
    <div class="row">
      <form action="?mode=admin&action=create-user" method="post">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form thêm mới người dùng</div>
            </div>
            
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">

                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Điền địa chỉ email..." required />
                  </div>

                  <!-- Họ và Tên -->
                  <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Điền họ và tên..." required />
                  </div>

                  <!-- Địa chỉ -->
                  <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Điền địa chỉ..." />
                  </div>

                  <div class="form-group">
                    <label for="sexx">Giới tính</label>
                    <select name="sexx" class="form-select" id="sexx">
                      <option value="male">Nam</option>
                      <option value="female">Nữ</option>
                      <option value="other">Khác</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="dob">Sinh nhật</label>
                    <input type="date" name="dob" class="form-control" id="dob" />
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Điền số điện thoại" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-success" type="submit">Tạo người dùng</button>
              <button class="btn btn-danger" type="reset">Reset</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
