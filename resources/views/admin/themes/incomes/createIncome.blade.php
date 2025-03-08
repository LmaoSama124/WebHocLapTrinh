@extends('admin.layouts.admin')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Thêm mới doanh thu</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a>
          </li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">Incomes</a></li>
          <li class="separator"><i class="icon-arrow-right"></i></li>
          <li class="nav-item"><a href="#">Thêm mới</a></li>
        </ul>
      </div>

      @if ($errors->any())
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          let errorMessages = "";
          @foreach ($errors->all() as $error)
          errorMessages += "{{ $error }}\n";
        @endforeach
          Swal.fire({
          icon: 'error',
          title: 'Lỗi nhập liệu!',
          text: errorMessages,
          confirmButtonText: 'OK'
          });
        });
      </script>
      @endif

      <div class="row">
        <form action="{{ route('admin.incomes.store') }}" method="POST">
          @csrf
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Form thêm mới doanh thu</div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                      <label for="total_buyer">Tổng số người mua</label>
                      <input type="number" name="total_buyer" class="form-control" id="total_buyer" required />
                    </div>

                    <div class="form-group">
                      <label for="total_amount">Tổng doanh thu</label>
                      <input type="number" step="0.01" name="total_amount" class="form-control" id="total_amount" required />
                    </div>

                    <div class="form-group">
                      <label for="time">Thời gian</label>
                      <input type="date" name="time" class="form-control" id="time" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action">
                <button class="btn btn-success" type="submit">Tạo doanh thu</button>
                <button class="btn btn-danger" type="reset">Reset</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
