@extends('admin.layouts.admin')

@section('content')
  <div class="container">
    <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh sửa đánh giá</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a>
        </li>
        <li class="separator"><i class="icon-arrow-right"></i></li>
        <li class="nav-item"><a href="#">Reviews</a></li>
        <li class="separator"><i class="icon-arrow-right"></i></li>
        <li class="nav-item"><a href="#">Chỉnh sửa</a></li>
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
      <form action="{{ route('admin.reviews.update', $review->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form chỉnh sửa đánh giá</div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="user">Người dùng</label>
                    <input type="text" class="form-control" id="user" value="{{ $review->user->fullname }}" disabled />
                  </div>

                  <div class="form-group">
                    <label for="course">Khóa học</label>
                    <input type="text" class="form-control" id="course" value="{{ $review->course->title }}" disabled />
                  </div>

                  <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea name="content" class="form-control" id="content" rows="4" required>{{ $review->content }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="rate">Đánh giá</label>
                    <input type="number" step="0.1" name="rate" class="form-control" id="rate" value="{{ $review->rate }}" required />
                  </div>

                  <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-select" id="status">
                      <option value="exist" {{ $review->status == 'exist' ? 'selected' : '' }}>Tồn tại</option>
                      <option value="removed" {{ $review->status == 'removed' ? 'selected' : '' }}>Đã xóa</option>
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