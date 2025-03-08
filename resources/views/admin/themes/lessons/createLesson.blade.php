@extends('admin.layouts.admin')

@section('content')
  <div class="container">
    <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Thêm mới bài học</h3>
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
          <a href="#">Lessons</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Thêm mới bài học</a>
        </li>
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
      <form action="{{ route('admin.lessons.store') }}" method="POST">
        @csrf
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Form thêm mới bài học</div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">

                  <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="title"
                      placeholder="Nhập tiêu đề bài học..." value="{{ old('title') }}" required />
                  </div>

                  <div class="form-group">
                    <label for="id_course">Khóa học</label>
                    <select name="id_course" class="form-select" id="id_course" required>
                      <option value="" disabled selected>Chọn khóa học...</option>
                      @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ old('id_course') == $course->id ? 'selected' : '' }}>
                          {{ $course->title }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" name="url" class="form-control" id="url"
                      placeholder="Nhập URL bài học..." value="{{ old('url') }}" required />
                  </div>

                  <div class="form-group">
                    <label for="is_preview">Xem trước</label>
                    <select name="is_preview" class="form-select" id="is_preview">
                      <option value="1" {{ old('is_preview') == '1' ? 'selected' : '' }}>Có</option>
                      <option value="0" {{ old('is_preview') == '0' ? 'selected' : '' }}>Không</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="time">Thời lượng</label>
                    <input type="text" name="time" class="form-control" id="time"
                      placeholder="Nhập thời lượng bài học..." value="{{ old('time') }}" required />
                  </div>

                  <div class="form-group">
                    <label for="chapter">Chương</label>
                    <input type="text" name="chapter" class="form-control" id="chapter"
                      placeholder="Nhập chương bài học..." value="{{ old('chapter') }}" required />
                  </div>
                </div>
              </div>
            </div>

            <div class="card-action">
              <button class="btn btn-success" type="submit">Tạo bài học</button>
              <button class="btn btn-danger" type="reset">Reset</button>
            </div>

          </div>
        </div>
      </form>
    </div>
    </div>
  </div>
@endsection
