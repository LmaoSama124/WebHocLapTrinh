@extends('user.layouts.home')

@section('content')
    <div class="container">
        <h2>{{ $lesson->title }}</h2>

        <div class="row">
            <div class="col-md-8">
                <div class="video-wrapper position-relative">
                    <iframe width="100%" height="450" src="https://drive.google.com/file/d/{{ $lesson->url }}/preview"
                        allowfullscreen>
                    </iframe>

                    <!-- Nút cover góc trên bên phải -->
                    <div class="cover-corner"></div>
                </div>


                <div class="mt-3">
                    <a href="{{ route('user.course-detail', $lesson->id_course) }}" class="btn btn-primary">Quay lại khóa
                        học</a>
                </div>
            </div>

            <!-- Danh sách bài học -->
            <div class="col-md-4">
                <h4>Danh sách bài học</h4>
                <ul class="list-group">
                    @foreach ($lessons as $item)
                        <li class="list-group-item {{ $item->id == $lesson->id ? 'active' : '' }}">
                            <a
                                href="{{ route('user.lessons.show', ['id' => $lesson->id_course, 'lessonId' => $item->id]) }}">
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
        .video-wrapper {
            position: relative;
        }

        .video-wrapper iframe {
            border-radius: 8px;
            width: 100%;
            height: 450px;
        }

        .video-cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: default;
            background-color: transparent;
            z-index: 10;
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
            .video-wrapper iframe {
                height: 300px;
            }

            .btn-primary {
                width: 100%;
            }
        }

        .cover-corner {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 60px;
            /* Chiều rộng vùng chặn */
            height: 60px;
            /* Chiều cao vùng chặn */
            cursor: pointer;
            background-color: transparent;
            /* Không nhìn thấy */
            z-index: 10;
        }
    </style>
@endsection
