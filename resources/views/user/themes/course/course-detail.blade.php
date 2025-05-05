@extends('user.layouts.home')
@section('content')
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Thông báo',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <div class="stm-lms-wrapper">
        <div class="container">
            <div class="masterstudy-single-course-sleek-sidebar">
                <!-- Sidebar Topbar -->
                <div class="masterstudy-single-course-sleek-sidebar__topbar">
                    <div class="masterstudy-single-course-sleek-sidebar__sticky">
                        <div
                            class="masterstudy-single-course-sleek-sidebar__sticky-wrapper masterstudy-single-course-sleek-sidebar__sticky-wrapper_on">
                            <!-- Thumbnail dynamic -->
                            <img class="masterstudy-single-course-thumbnail"
                                src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : asset('assets/user/wp-content/uploads/2023/07/lap-trinh-c-300-%c3%97-152-px.png') }}"
                                alt="{{ $course->title }}">
                            <div class="masterstudy-single-course-sleek-sidebar__sticky-block">
                                <div class="masterstudy-single-course-expired">
                                    Course available for <strong>{{ $course->available_days ?? '180' }} days</strong>
                                </div>
                                <div class="masterstudy-single-course-sleek-sidebar__cta">
                                    <div class="masterstudy-buy-button">
                                        <a href="{{ route('user.course-payment', $course->id) }}"
                                            class="masterstudy-buy-button__link" data-authorization-modal="login">
                                            <span class="masterstudy-buy-button__title">Get course</span>
                                            <span class="masterstudy-buy-button__separator"></span>
                                            <span class="masterstudy-buy-button__price">
                                                <span class="masterstudy-buy-button__price_regular">
                                                    {{ $course->price ? number_format($course->price) . ' đ' : 'Free' }}
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="masterstudy-single-course-stickybar">
                                    <div class="masterstudy-single-course-stickybar__wrapper">
                                        <div class="masterstudy-single-course-stickybar__column">
                                            <div class="masterstudy-single-course-stickybar__title">
                                                {{ $course->video_title ?? $course->title }}
                                            </div>
                                            <div class="masterstudy-single-course-stickybar__row">
                                                <div
                                                    class="masterstudy-single-course-instructor masterstudy-single-course-instructor_no-title">
                                                    <div class="masterstudy-single-course-instructor__avatar">
                                                        <img src="" class="avatar avatar-215 photo" />
                                                    </div>
                                                    <div class="masterstudy-single-course-instructor__info">
                                                    </div>
                                                </div>
                                                <div
                                                    class="masterstudy-single-course-categories masterstudy-single-course-categories_only-one">
                                                    <div class="masterstudy-single-course-categories__wrapper">
                                                        <div class="masterstudy-single-course-categories__container">
                                                            <span class="masterstudy-single-course-categories__icon"></span>
                                                            <div class="masterstudy-single-course-categories__list">
                                                                <span class="masterstudy-single-course-categories__title">
                                                                    Category:
                                                                </span>
                                                                <div
                                                                    class="masterstudy-single-course-categories__item-wrapper">
                                                                    @if ($course->category)
                                                                        <a class="masterstudy-single-course-categories__item"
                                                                            href="{{ route('user.course', $course->category->id) }}"
                                                                            target="_blank">
                                                                            {{ $course->category->name }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="masterstudy-single-course-stickybar__row">
                                            <a href="#"
                                                class="masterstudy-button masterstudy-button_style-primary masterstudy-button_size-sm"
                                                data-id="masterstudy-single-course-stickybar-button">
                                                <span class="masterstudy-button__title">Get this Course</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="masterstudy-single-course-sleek-sidebar__buttons">
                                    <div class="masterstudy-single-course-wishlist">
                                        <a href="{{ route('user.index') }}">
                                            <span class="masterstudy-single-course-wishlist__title">Add to wishlist</span>
                                        </a>
                                    </div>
                                    <div class="masterstudy-single-course-share-button">
                                        <span class="masterstudy-single-course-share-button__title">Share</span>
                                    </div>
                                    <div class="masterstudy-single-course-share-button-modal" style="display:none">
                                        <!-- Share modal content remains the same -->
                                        <div class="masterstudy-single-course-share-button-modal__wrapper">
                                            <div class="masterstudy-single-course-share-button-modal__container">
                                                <div class="masterstudy-single-course-share-button-modal__header">
                                                    <span
                                                        class="masterstudy-single-course-share-button-modal__header-title">
                                                        Share &quot;{{ $course->title }}&quot;
                                                    </span>
                                                    <div class="masterstudy-single-course-share-button-modal__close"></div>
                                                </div>
                                                <div class="masterstudy-single-course-share-button-modal__content">
                                                    <!-- Các link chia sẻ -->
                                                    <div class="masterstudy-single-course-share-button-modal__link-wrapper">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('user.course-detail', $course->id)) }}"
                                                            target="_blank"
                                                            class="masterstudy-single-course-share-button-modal__link masterstudy-single-course-share-button-modal__link_facebook">
                                                            Facebook
                                                        </a>
                                                    </div>
                                                    <div class="masterstudy-single-course-share-button-modal__link-wrapper">
                                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('user.course-detail', $course->id)) }}&amp;text={{ urlencode($course->title) }}"
                                                            target="_blank"
                                                            class="masterstudy-single-course-share-button-modal__link masterstudy-single-course-share-button-modal__link_twitter">
                                                            Twitter
                                                        </a>
                                                    </div>
                                                    <div class="masterstudy-single-course-share-button-modal__link-wrapper">
                                                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(route('user.course-detail', $course->id)) }}&amp;title={{ urlencode($course->title) }}"
                                                            target="_blank"
                                                            class="masterstudy-single-course-share-button-modal__link masterstudy-single-course-share-button-modal__link_linkedin">
                                                            Linkedin
                                                        </a>
                                                    </div>
                                                    <div class="masterstudy-single-course-share-button-modal__link-wrapper">
                                                        <a href="https://t.me/share/url?url={{ urlencode(route('user.course-detail', $course->id)) }}&amp;text={{ urlencode($course->title) }}"
                                                            target="_blank"
                                                            class="masterstudy-single-course-share-button-modal__link masterstudy-single-course-share-button-modal__link_telegram">
                                                            Telegram
                                                        </a>
                                                    </div>
                                                    <div class="masterstudy-single-course-share-button-modal__link-wrapper">
                                                        <a href="#"
                                                            class="masterstudy-single-course-share-button-modal__link masterstudy-single-course-share-button-modal__link_copy">
                                                            Copy link
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="masterstudy-single-course-price-info">
                                    {{ $course->contact_info ?? 'Liên hệ' }}
                                </div>
                                <span class="masterstudy-single-course-sleek-sidebar__sticky-block-delimiter"></span>
                            </div>
                            <ul class="masterstudy-single-course-tabs masterstudy-single-course-tabs_style-sidebar">
                                <li class="masterstudy-single-course-tabs__item" data-id="curriculum">Curriculum</li>
                                <li class="masterstudy-single-course-tabs__item" data-id="reviews">Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Main Content -->
                    <div class="masterstudy-single-course-sleek-sidebar__main">
                        <div class="masterstudy-single-course-sleek-sidebar__main-topbar">
                            <div class="masterstudy-single-course-sleek-sidebar__row">
                                <div class="masterstudy-single-course-categories">
                                    <div class="masterstudy-single-course-categories__wrapper">
                                        <div class="masterstudy-single-course-categories__container">
                                            <div class="masterstudy-single-course-categories__list">
                                                @if ($course->category)
                                                    <a class="masterstudy-single-course-categories__item"
                                                        href="{{ route('user.course', $course->category->id) }}"
                                                        target="_blank">
                                                        {{ $course->category->name }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="masterstudy-single-course-sleek-sidebar__heading">
                                <h1 class="masterstudy-single-course-title">{{ $course->title }}</h1>
                            </div>
                        </div>
                        <div class="masterstudy-single-course-sleek-sidebar__details">
                            <div class="masterstudy-single-course-details masterstudy-single-course-details_row">
                                <span class="masterstudy-single-course-details__title">Course details</span>
                                <div class="masterstudy-single-course-details__item">
                                    <span
                                        class="masterstudy-single-course-details__icon masterstudy-single-course-details__icon_lectures"></span>
                                    <span class="masterstudy-single-course-details__name">Lectures</span>
                                    <span class="masterstudy-single-course-details__separator">:</span>
                                    <span class="masterstudy-single-course-details__quantity">
                                        {{ $course->lesson }}
                                    </span>
                                </div>
                                <div class="masterstudy-single-course-details__item">
                                    <span
                                        class="masterstudy-single-course-details__icon masterstudy-single-course-details__icon_level"></span>
                                    <span class="masterstudy-single-course-details__name">Level</span>
                                    <span class="masterstudy-single-course-details__separator">:</span>
                                    <span class="masterstudy-single-course-details__quantity">
                                        {{ $course->level }}
                                    </span>
                                </div>
                                <div class="masterstudy-single-course-details__item">
                                    <span
                                        class="masterstudy-single-course-details__icon masterstudy-single-course-details__icon_access-devices"></span>
                                    <span class="masterstudy-single-course-details__name">Access on mobile and TV</span>
                                    <span class="masterstudy-single-course-details__quantity"></span>
                                </div>
                            </div>
                        </div>
                        <div class="masterstudy-single-course-tabs__content masterstudy-single-course-tabs_style-sidebar">
                            <!-- Curriculum Section -->
                            <div class="masterstudy-single-course-tabs__container" data-id="curriculum">
                                <span class="masterstudy-single-course-tabs__container-title">Curriculum</span>
                                <div class="masterstudy-curriculum-list">
                                    @if ($course->lessons->count())
                                        @foreach ($course->lessons->groupBy('chapter') as $chapterNumber => $lessons)
                                            @php
                                                // Tìm title của chương từ list_chapter
                                                $chapterTitle =
                                                    collect($chapters)->firstWhere('chapter_number', $chapterNumber)[
                                                        'chapter_title'
                                                    ] ?? 'Chưa có tiêu đề';
                                            @endphp
                                            <div
                                                class="masterstudy-curriculum-list__wrapper masterstudy-curriculum-list__wrapper_opened">
                                                <div class="masterstudy-curriculum-list__section">
                                                    <span class="masterstudy-curriculum-list__section-title">
                                                        Chương {{ $chapterNumber }} - {{ $chapterTitle }}
                                                    </span>
                                                    <span class="masterstudy-curriculum-list__toggler"></span>
                                                </div>
                                                <ul class="masterstudy-curriculum-list__materials">
                                                    @foreach ($lessons as $lesson)
                                                        <li class="masterstudy-curriculum-list__item">
                                                            <a href="{{ route('user.lessons.show', ['id' => $course->id, 'lessonId' => $lesson->id]) }}"
                                                                class="masterstudy-curriculum-list__link">
                                                                <div class="masterstudy-curriculum-list__order">
                                                                    {{ $loop->iteration }}</div>
                                                                <img src="{{ asset('assets/user/wp-content/plugins/masterstudy-lms-learning-management-system/_core/assets/icons/lessons/video.svg') }}"
                                                                    class="masterstudy-curriculum-list__image">
                                                                <div class="masterstudy-curriculum-list__container">
                                                                    <div
                                                                        class="masterstudy-curriculum-list__container-wrapper">
                                                                        <div class="masterstudy-curriculum-list__title">
                                                                            {{ $lesson->title }}</div>
                                                                        <div
                                                                            class="masterstudy-curriculum-list__meta-wrapper">
                                                                            @if ($lesson->is_preview)
                                                                                <span
                                                                                    class="masterstudy-curriculum-list__preview">Preview</span>
                                                                            @endif
                                                                            <span
                                                                                class="masterstudy-curriculum-list__meta">{{ $lesson->time }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No curriculum available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Popular Courses Section -->
                <div class="masterstudy-popular-courses">
                    <span class="masterstudy-popular-courses__title">Popular courses</span>
                    <ul class="masterstudy-popular-courses__list">
                        @foreach ($popularCourses as $popCourse)
                            <li class="masterstudy-popular-courses__item">
                                <div class="masterstudy-popular-courses__link">
                                    <a href="{{ route('user.course-detail', $popCourse->id) }}" target="_blank"
                                        class="masterstudy-popular-courses__image-wrapper">
                                        <img src="{{ asset('storage/' . $popCourse->thumbnail) }}"
                                            alt="{{ $popCourse->title }}" class="masterstudy-popular-courses__image">
                                    </a>
                                    <div class="masterstudy-popular-courses__item-meta">
                                        <a href="{{ route('user.course-detail', $popCourse->id) }}" target="_blank"
                                            class="masterstudy-popular-courses__item-title">
                                            {{ $popCourse->title }}
                                        </a>
                                        <div class="masterstudy-popular-courses__item-block">
                                            <div class="masterstudy-popular-courses__price">
                                                {{ $popCourse->price > 0 ? number_format($popCourse->price) . ' đ' : 'Free' }}
                                            </div>
                                            <div class="masterstudy-popular-courses__rating">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span
                                                        class="masterstudy-popular-courses__rating-star {{ $popCourse->rating > $i ? 'active' : '' }}"></span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Related Courses Section -->
                <div class="masterstudy-related-courses">
                    <span class="masterstudy-related-courses__title">Related courses</span>
                    <ul class="masterstudy-related-courses__list">
                        @foreach ($relatedCourses as $relCourse)
                            <li class="masterstudy-related-courses__item">
                                <div class="masterstudy-related-courses__link">
                                    <a href="{{ route('user.course-detail', $relCourse->id) }}" target="_blank"
                                        class="masterstudy-related-courses__image-wrapper">
                                        <img src="{{ asset('storage/' . $relCourse->thumbnail) }}"
                                            alt="{{ $relCourse->title }}" class="masterstudy-related-courses__image">
                                    </a>
                                    <div class="masterstudy-related-courses__item-meta">
                                        <a href="{{ route('user.course-detail', $relCourse->id) }}" target="_blank"
                                            class="masterstudy-related-courses__item-title">
                                            {{ $relCourse->title }}
                                        </a>
                                        <div class="masterstudy-related-courses__item-block">
                                            <div class="masterstudy-related-courses__price">
                                                {{ $relCourse->price > 0 ? number_format($relCourse->price) . ' đ' : 'Free' }}
                                            </div>
                                            <div class="masterstudy-related-courses__rating">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span
                                                        class="masterstudy-related-courses__rating-star {{ $relCourse->rating > $i ? 'active' : '' }}"></span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
