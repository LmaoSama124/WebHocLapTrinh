@extends('user.layouts.home')

@section('content')
<div class="container">
    <h2>{{ $lesson->title }}</h2>

    <div class="row">
        <div class="col-md-8">
            <iframe width="100%" height="450"
                src="https://drive.google.com/file/d/{{ $lesson->url }}/preview"
                allowfullscreen>
            </iframe>

            <div class="mt-3">
                <a href="{{ route('user.course-detail', $lesson->id_course) }}" class="btn btn-primary">Quay lại khóa học</a>
            </div>
        </div>

        <!-- Danh sách bài học -->
        <div class="col-md-4">
            <h4>Danh sách bài học</h4>
            <ul class="list-group">
                @foreach($lessons as $item)
                    <li class="list-group-item {{ $item->id == $lesson->id ? 'active' : '' }}">
                        <a href="{{ route('user.video', ['id' => $lesson->id_course, 'lessonId' => $item->id]) }}">
                            {{ $item->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    .video-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%; /* Tỷ lệ 16:9 */
        height: 0;
        overflow: hidden;
        background-color: #000;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
    }

    .list-group-item a {
        text-decoration: none;
        color: #333;
        display: block;
        width: 100%;
    }

    .list-group-item.active a {
        color: #fff;
    }

    .list-group-item.active {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 6px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    h4 {
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .video-container {
            padding-bottom: 75%;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>
@endsection
