@extends('user.layouts.home')
@section('content')
<div class="stm-lms-wrapper">
    <div class="container">
        <div class="masterstudy-single-course-sleek-sidebar">
            <div class="masterstudy-single-course-sleek-sidebar__topbar">
                <div class="masterstudy-single-course-sleek-sidebar__sticky">
                    <div
                        class="masterstudy-single-course-sleek-sidebar__sticky-wrapper masterstudy-single-course-sleek-sidebar__sticky-wrapper_on">
                        <img class="masterstudy-single-course-thumbnail"
                            src="{{asset($course->thumbnail) }}"
                            alt="{{ $course->title }}">
                        <div class="masterstudy-single-course-sleek-sidebar__sticky-block">
                            <div class="masterstudy-single-course-expired">
                                Course available for <strong>{{ $course->expiration_date }} days</strong> </div>
                            <div class="masterstudy-single-course-sleek-sidebar__cta">
                                <div class="masterstudy-buy-button   ">
                                    <a href="{{route('user.course-payment')}}" class="masterstudy-buy-button__link"
                                        data-authorization-modal="login">
                                        <span class="masterstudy-buy-button__title">Get course</span>
                                        <span class="masterstudy-buy-button__separator"></span>
                                        <span class="masterstudy-buy-button__price">
                                            <span class="masterstudy-buy-button__price_regular">{{ number_format($course->price, 0, ',', '.') }} đ</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="masterstudy-single-course-sleek-sidebar__buttons">
                                <div class="masterstudy-single-course-wishlist">
                                    <a href="../../user-account/index.html">
                                        <span class="masterstudy-single-course-wishlist__title">
                                            Add to wishlist </span>
                                    </a>
                                </div>
                                <div class="masterstudy-single-course-share-button">
                                    <span class="masterstudy-single-course-share-button__title">
                                        Share </span>
                                </div>
                            </div>
                            <div class="masterstudy-single-course-price-info">
                                Liên hệ </div>
                            <span
                                class="masterstudy-single-course-sleek-sidebar__sticky-block-delimiter"></span>
                        </div>
                        <ul class="masterstudy-single-course-tabs masterstudy-single-course-tabs_style-sidebar">
                            <li class="masterstudy-single-course-tabs__item" data-id="curriculum">
                                Curriculum </li>
                            <li class="masterstudy-single-course-tabs__item" data-id="reviews">
                                Reviews </li>
                        </ul>
                    </div>
                </div>
                <div class="masterstudy-single-course-sleek-sidebar__main">
                    <div class="masterstudy-single-course-sleek-sidebar__main-topbar">
                        <div class="masterstudy-single-course-sleek-sidebar__heading">
                            <h1 class="masterstudy-single-course-title">{{ $course->title }}</h1>
                        </div>
                        <div class="masterstudy-single-course-sleek-sidebar__info">
                            <div class="masterstudy-single-course-sleek-sidebar__info-block">

                                <div class="masterstudy-single-course-instructor ">
                                    <div class="masterstudy-single-course-instructor__avatar">
                                        <img src='../../../secure.gravatar.com/avatar/e57afffbfde92ad891a8a7aec1694f8599fc.jpg?s=215&amp;d=mm&amp;r=g'
                                            class='avatar avatar-215 photo' />
                                    </div>
                                    <div class="masterstudy-single-course-instructor__info">
                                        <div class="masterstudy-single-course-instructor__title">
                                            Instructor </div>
                                        <a class="masterstudy-single-course-instructor__name "
                                            href="../../user-public-account/1/index.html" target="_blank">
                                            admin </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="masterstudy-single-course-sleek-sidebar__info-block masterstudy-single-course-sleek-sidebar__info-block_students">
                                <div class="masterstudy-single-course-current-students ">
                                    <div class="masterstudy-single-course-current-students__wrapper">
                                        <span class="masterstudy-single-course-current-students__count">
                                            {{ $course->student_enrolled }} </span>
                                        <span class="masterstudy-single-course-current-students__title">
                                            <span>
                                                {{ $course->student_enrolled > 1 ? 'Students' : 'Student' }} </span>
                                            enrolled </span>
                                    </div>
                                </div>
                            </div>
                            <div class="masterstudy-single-course-sleek-sidebar__info-block">

                                <div class="masterstudy-single-course-rating">
                                    <div class="masterstudy-single-course-rating__wrapper">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="masterstudy-single-course-rating__star {{ $i <= $course->rate ? 'filled' : '' }}"></span>
                                            @endfor
                                            <div class="masterstudy-single-course-rating__count">
                                                {{ $course->rate }}
                                            </div>
                                    </div>
                                    <div class="masterstudy-single-course-rating__quantity">
                                        0 reviews </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="masterstudy-single-course-sleek-sidebar__details">
                        <div class="masterstudy-single-course-details masterstudy-single-course-details_row">
                            <span class="masterstudy-single-course-details__title">
                                Course details </span>
                            <div class="masterstudy-single-course-details__item">
                                <span
                                    class="masterstudy-single-course-details__icon masterstudy-single-course-details__icon_lectures"></span>
                                <span class="masterstudy-single-course-details__name">
                                    Lectures </span>
                                <span class="masterstudy-single-course-details__separator">:</span>
                                <span class="masterstudy-single-course-details__quantity">
                                    {{ $course->lesson }} </span>
                            </div>
                            <div class="masterstudy-single-course-details__item">
                                <span
                                    class="masterstudy-single-course-details__icon masterstudy-single-course-details__icon_level"></span>
                                <span class="masterstudy-single-course-details__name">
                                    Level </span>
                                <span class="masterstudy-single-course-details__separator">:</span>
                                <span class="masterstudy-single-course-details__quantity">
                                    {{ $course->level }} </span>
                            </div>
                            <div class="masterstudy-single-course-details__item">
                                <span
                                    class="masterstudy-single-course-details__icon masterstudy-single-course-details__icon_access-devices"></span>
                                <span class="masterstudy-single-course-details__name">
                                    Access on mobile and TV </span>
                                <span class="masterstudy-single-course-details__quantity">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="masterstudy-single-course-tabs__content masterstudy-single-course-tabs_style-sidebar">
                        <div class="masterstudy-single-course-tabs__container  " data-id="curriculum">
                            <span class="masterstudy-single-course-tabs__container-title">
                                Curriculum </span>

                            <div class="masterstudy-curriculum-list  ">
                                @php
                                $chapters = $lessons->pluck('chapter')->unique();
                                @endphp

                                @foreach($chapters as $chapter)
                                <div
                                    class="masterstudy-curriculum-list__wrapper masterstudy-curriculum-list__wrapper_opened">
                                    <div class="masterstudy-curriculum-list__section">
                                        <span class="masterstudy-curriculum-list__section-title">{{ $chapter }}</span>
                                        <span class="masterstudy-curriculum-list__toggler"></span>
                                    </div>

                                    <ul class="masterstudy-curriculum-list__materials">
                                        @php
                                        $chapterLessons = $lessons->where('chapter', $chapter);
                                        $lessonCounter = 1;
                                        @endphp

                                        @foreach($chapterLessons as $lesson)
                                        <li class="masterstudy-curriculum-list__item">
                                            <a href="{{ route('user.video', ['id' => $lesson->id_course, 'lessonId' => $lesson->id]) }}"
                                                class="masterstudy-curriculum-list__link {{ $lesson->is_preview ? '' : 'masterstudy-curriculum-list__link_disabled' }}">
                                                <div class="masterstudy-curriculum-list__order">
                                                    {{ $lessonCounter++ }}
                                                </div>
                                                <img src="{{ asset('assets/user/wp-content/plugins/masterstudy-lms-learning-management-system/_core/assets/icons/lessons/video.svg') }}"
                                                    class="masterstudy-curriculum-list__image">
                                                <div class="masterstudy-curriculum-list__container">
                                                    <div class="masterstudy-curriculum-list__container-wrapper">
                                                        <div class="masterstudy-curriculum-list__title">
                                                            {{ $lesson->title }}
                                                        </div>
                                                        <div class="masterstudy-curriculum-list__meta-wrapper">
                                                            @if($lesson->is_preview)
                                                            <span class="masterstudy-curriculum-list__preview">
                                                                Preview </span>
                                                            @endif
                                                            <span class="masterstudy-curriculum-list__meta">
                                                                {{ $lesson->time }} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- REVIEW SECTION --}}
                        <div class="masterstudy-single-course-tabs__container" data-id="reviews">
                            <span class="masterstudy-single-course-tabs__container-title">Đánh giá khóa học</span>

                            <div class="masterstudy-single-course-reviews">
                                @auth
                                @if($isEnrolled)
                                <div>
                                    <textarea id="reviewContent" placeholder="Viết đánh giá của bạn..." required></textarea>
                                    <button id="submitReview">Gửi đánh giá</button>
                                </div>
                                @else
                                <div class="masterstudy-single-course-reviews__login">
                                    <a href="{{ route('user.course-enrolled') }}" class="masterstudy-single-course-reviews__login-link">
                                        Đăng ký khóa học để có thể comment
                                    </a>
                                </div>
                                @endif
                                @else
                                <div class="masterstudy-single-course-reviews__login">
                                    Vui lòng <a href="{{ route('login') }}" class="masterstudy-single-course-reviews__login-link">Đăng nhập tài khoản đã đăng ký khóa học</a> để comment
                                </div>
                                @endauth

                                <div id="reviewList" class="mt-3"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="masterstudy-popular-courses">
                    <span class="masterstudy-popular-courses__title">
                        Popular courses </span>
                    <ul class="masterstudy-popular-courses__list">
                        <li class="masterstudy-popular-courses__item">
                            <div class="masterstudy-popular-courses__link">
                                <a href="../video-thi-giac-may-tinh-computer-vision/index.html"
                                    target="_blank" class="masterstudy-popular-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2024/03/24.png') }}" alt="24.png"
                                        class="masterstudy-popular-courses__image">
                                </a>
                                <div class="masterstudy-popular-courses__item-meta">
                                    <a href="../video-thi-giac-may-tinh-computer-vision/index.html"
                                        target="_blank" class="masterstudy-popular-courses__item-title">
                                        [Video] Thị giác máy tính - Computer ... </a>
                                    <div class="masterstudy-popular-courses__item-block">
                                        <div class="masterstudy-popular-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-popular-courses__rating">
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a href="../../user-public-account/1/index.html" target="_blank"
                                        class="masterstudy-popular-courses__instructor ">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                        <li class="masterstudy-popular-courses__item">
                            <div class="masterstudy-popular-courses__link">
                                <a href="../video-cau-truc-du-lieu-va-giai-thuat-java/index.html"
                                    target="_blank" class="masterstudy-popular-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2024/03/CTDLVGTJAVA.png') }}"
                                        alt="CTDLVGTJAVA.png" class="masterstudy-popular-courses__image">
                                </a>
                                <div class="masterstudy-popular-courses__item-meta">
                                    <a href="../video-cau-truc-du-lieu-va-giai-thuat-java/index.html"
                                        target="_blank" class="masterstudy-popular-courses__item-title">
                                        Cấu trúc dữ liệu và giải thuật Java </a>
                                    <div class="masterstudy-popular-courses__item-block">
                                        <div class="masterstudy-popular-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-popular-courses__rating">
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a href="../../user-public-account/1/index.html" target="_blank"
                                        class="masterstudy-popular-courses__instructor ">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                        <li class="masterstudy-popular-courses__item">
                            <div class="masterstudy-popular-courses__link">
                                <a href="../he-dieu-hanh/index.html" target="_blank"
                                    class="masterstudy-popular-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2023/01/He-dieu-hanh-300x225.png') }}"
                                        alt="He dieu hanh" class="masterstudy-popular-courses__image">
                                </a>
                                <div class="masterstudy-popular-courses__item-meta">
                                    <a href="../he-dieu-hanh/index.html" target="_blank"
                                        class="masterstudy-popular-courses__item-title">
                                        [Video] Nguyên lý Hệ điều hành </a>
                                    <div class="masterstudy-popular-courses__item-block">
                                        <div class="masterstudy-popular-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-popular-courses__rating">
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a href="../../user-public-account/1/index.html" target="_blank"
                                        class="masterstudy-popular-courses__instructor ">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                        <li class="masterstudy-popular-courses__item">
                            <div class="masterstudy-popular-courses__link">
                                <a href="../sql-server/index.html" target="_blank"
                                    class="masterstudy-popular-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2023/04/lap-trinh-c-300-%c3%97-152-px.png') }}"
                                        alt="lập trình c (300 × 152 px)"
                                        class="masterstudy-popular-courses__image">
                                </a>
                                <div class="masterstudy-popular-courses__item-meta">
                                    <a href="../sql-server/index.html" target="_blank"
                                        class="masterstudy-popular-courses__item-title">
                                        [Video] SQL Server - Cơ bản và Nâng cao </a>
                                    <div class="masterstudy-popular-courses__item-block">
                                        <div class="masterstudy-popular-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-popular-courses__rating">
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                            <span class="masterstudy-popular-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a href="../../user-public-account/1/index.html" target="_blank"
                                        class="masterstudy-popular-courses__instructor ">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="masterstudy-related-courses">
                    <span class="masterstudy-related-courses__title">
                        Related courses </span>
                    <ul class="masterstudy-related-courses__list">
                        <li class="masterstudy-related-courses__item">
                            <div class="masterstudy-related-courses__link">
                                <a href="../lap-trinh-web-php-and-mysql/index.html" target="_blank"
                                    class="masterstudy-related-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2024/03/phpmysql.png') }}" alt="phpmysql"
                                        class="masterstudy-related-courses__image">
                                </a>
                                <div class="masterstudy-related-courses__item-meta">
                                    <a href="../lap-trinh-web-php-and-mysql/index.html" target="_blank"
                                        class="masterstudy-related-courses__item-title">
                                        Lập trình web PHP &amp; MySQL </a>
                                    <div class="masterstudy-related-courses__item-block">
                                        <div class="masterstudy-related-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-related-courses__rating">
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a class="masterstudy-related-courses__instructor "
                                        href="../../user-public-account/1/index.html" target="_blank">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                        <li class="masterstudy-related-courses__item">
                            <div class="masterstudy-related-courses__link">
                                <a href="../tkw/index.html" target="_blank"
                                    class="masterstudy-related-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2024/03/25-1.png') }}" alt="25.png"
                                        class="masterstudy-related-courses__image">
                                </a>
                                <div class="masterstudy-related-courses__item-meta">
                                    <a href="../tkw/index.html" target="_blank"
                                        class="masterstudy-related-courses__item-title">
                                        [Video] Thiết kế web - HTML - CSS - J... </a>
                                    <div class="masterstudy-related-courses__item-block">
                                        <div class="masterstudy-related-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-related-courses__rating">
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a class="masterstudy-related-courses__instructor "
                                        href="../../user-public-account/1/index.html" target="_blank">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                        <li class="masterstudy-related-courses__item">
                            <div class="masterstudy-related-courses__link">
                                <a href="../lap-trinh-mang-su-dung-java/index.html" target="_blank"
                                    class="masterstudy-related-courses__image-wrapper">
                                    <img src="{{ asset('assets/user/wp-content/uploads/2023/06/laptrinhmang-3.png') }}"
                                        alt="laptrinhmang" class="masterstudy-related-courses__image">
                                </a>
                                <div class="masterstudy-related-courses__item-meta">
                                    <a href="../lap-trinh-mang-su-dung-java/index.html" target="_blank"
                                        class="masterstudy-related-courses__item-title">
                                        [Video] Lập trình mạng (sử dụng Java) </a>
                                    <div class="masterstudy-related-courses__item-block">
                                        <div class="masterstudy-related-courses__price ">
                                            Free </div>
                                        <div class="masterstudy-related-courses__rating">
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                            <span class="masterstudy-related-courses__rating-star "></span>
                                        </div>
                                    </div>
                                    <a class="masterstudy-related-courses__instructor "
                                        href="../../user-public-account/1/index.html" target="_blank">
                                        By admin </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="course-review-section" data-course-id="{{ $course->id }}"></div>
<script>
    $(document).ready(function() {
        const courseId = $('#course-review-section').data('course-id');

        loadReviews();

        $('#submitReview').click(function() {
            const content = $('#reviewContent').val().trim();
            if (!content) {
                alert('Vui lòng nhập nội dung đánh giá');
                return;
            }
            $.post(`/review/${courseId}`, {
                _token: '{{ csrf_token() }}',
                content: content
            }, function(res) {
                if (res.success) {
                    $('#reviewList').prepend(`<div><b>${res.review.user}</b>: ${res.review.content} - <small>${res.review.date}</small></div>`);
                    $('#reviewContent').val('');
                }
            }).fail(function(xhr) {
                alert(xhr.responseJSON.error);
            });
        });

        function loadReviews() {
            $.get(`/reviews/${courseId}`, function(data) {
                let html = '';
                data.forEach(function(review) {
                    html += `<div><b>${review.user.displayname}</b>: ${review.content} - <small>${review.created_at}</small></div>`;
                });
                $('#reviewList').html(html);
            });
        }
    });
</script>


@endsection