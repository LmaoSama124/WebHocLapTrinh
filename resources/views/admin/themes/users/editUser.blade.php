@extends('admin.layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh sửa người dùng</h3>
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
          <a href="#">Chỉnh sửa</a>
        </li>
      </ul>
    </div>
    
    <div class="row">
      <form action="?mode=admin&action=update-user&id={{ $user->id }}" method="post">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form chỉnh sửa người dùng</div>
            </div>
            
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">

                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled />
                  </div>

                  <!-- Họ và Tên -->
                  <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name ?? 'No data'}}" required />
                  </div>

                  <!-- Địa chỉ -->
                  <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ $user->address ?? 'No data'}}" />
                  </div>

                  <!-- Giới tính -->
                  <div class="form-group">
                    <label for="sexx">Giới tính</label>
                    <select name="sexx" class="form-select" id="sexx">
                      <option value="male" {{ $user->sexx == 'male' ? 'selected' : '' }}>Nam</option>
                      <option value="female" {{ $user->sexx == 'female' ? 'selected' : '' }}>Nữ</option>
                      <option value="other" {{ $user->sexx == 'other' ? 'selected' : '' }}>Khác</option>
                    </select>
                  </div>

                  <!-- Ngày sinh -->
                  <div class="form-group">
                    <label for="dob">Sinh nhật</label>
                    <input type="date" name="dob" class="form-control" id="dob" value="{{ $user->dob ?? 'No data'}}" />
                  </div>

                  <!-- Số điện thoại -->
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone ?? 'No data'}}" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-success" type="submit">Lưu thay đổi</button>
              <a href="?mode=admin&action=user-list" class="btn btn-secondary">Hủy</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
