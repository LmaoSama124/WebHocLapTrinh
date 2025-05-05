@extends('user.layouts.home')

@section('content')
    @if (session('banking_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('banking_success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('banking_error'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Thông báo',
                text: '{{ session('banking_error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <div id="wrapper" class="wrapper">
        <div class="container">
            <div class="pages-template">
                <section class="page-content">
                    <div class="entry-content">
                        <div data-elementor-type="wp-page" data-elementor-id="55605" class="elementor elementor-55605">
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-a60f352 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="a60f352" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a151359"
                                        data-id="a151359" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-2069d1f elementor-widget elementor-widget-ms_lms_courses"
                                                data-id="2069d1f" data-element_type="widget"
                                                data-settings="{&quot;type&quot;:&quot;courses-grid&quot;,&quot;sort_by_cat&quot;:&quot;yes&quot;,&quot;pagination_presets&quot;:&quot;pagination-style-2&quot;,&quot;cards_to_show&quot;:80,&quot;sort_by&quot;:&quot;price_high&quot;,&quot;status_presets&quot;:&quot;status_style_2&quot;,&quot;slides_to_scroll&quot;:&quot;25%&quot;,&quot;slides_to_scroll_tablet&quot;:&quot;33.333333%&quot;,&quot;slides_to_scroll_mobile&quot;:&quot;100%&quot;,&quot;loop&quot;:&quot;true&quot;,&quot;course_card_presets&quot;:&quot;card-style-1&quot;,&quot;cards_to_show_choice&quot;:&quot;number&quot;,&quot;cards_to_show_choice_featured&quot;:&quot;number&quot;,&quot;cards_to_show_featured&quot;:4,&quot;show_progress&quot;:&quot;yes&quot;,&quot;show_divider&quot;:&quot;yes&quot;,&quot;show_rating&quot;:&quot;yes&quot;,&quot;show_price&quot;:&quot;yes&quot;,&quot;show_slots&quot;:&quot;yes&quot;,&quot;card_slot_1&quot;:&quot;current-students&quot;,&quot;card_slot_2&quot;:&quot;views&quot;,&quot;featured_position&quot;:&quot;left&quot;,&quot;status_position&quot;:&quot;right&quot;,&quot;show_popup&quot;:&quot;yes&quot;,&quot;popup_show_author_name&quot;:&quot;yes&quot;,&quot;popup_show_author_image&quot;:&quot;yes&quot;,&quot;popup_show_excerpt&quot;:&quot;yes&quot;,&quot;popup_show_slots&quot;:&quot;yes&quot;,&quot;popup_slot_1&quot;:&quot;level&quot;,&quot;popup_slot_2&quot;:&quot;lectures&quot;,&quot;popup_slot_3&quot;:&quot;duration&quot;,&quot;popup_show_wishlist&quot;:&quot;yes&quot;,&quot;popup_show_price&quot;:&quot;yes&quot;,&quot;show_instructor_label&quot;:&quot;yes&quot;,&quot;show_instructor_position&quot;:&quot;yes&quot;,&quot;show_instructor_bio&quot;:&quot;yes&quot;,&quot;course_image_size&quot;:{&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;}}"
                                                data-widget_type="ms_lms_courses.default">
                                                <div class="elementor-widget-container">
                                                    <div class="ms_lms_courses_grid">
                                                        <div class="ms_lms_courses_grid__title style_1">
                                                            <h2>
                                                                CHỌN LỘ TRÌNH CỦA BẠN &amp; CÙNG HỌC NHÉ! </h2>
                                                            <!-- filter -->
                                                            <ul id="course-categories"
                                                                class="ms_lms_courses_grid__sorting style_2">
                                                                <li>
                                                                    <span data-id="all"
                                                                        class="ms_lms_courses_grid__sorting_button active">All</span>
                                                                </li>
                                                                @foreach ($categories as $category)
                                                                    <li>
                                                                        <span data-id="{{ $category->id }}"
                                                                            class="ms_lms_courses_grid__sorting_button">
                                                                            {{ $category->category_name }}
                                                                        </span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="ms_lms_courses_grid__content  title_style_1">
                                                            <div class="ms_lms_courses_card_wrapper" id="course-list">
                                                                <div class="ms_lms_courses_card card-style-1">

                                                                    <!-- Content -->
                                                                    @foreach ($courses as $course)
                                                                        <div class="ms_lms_courses_card_item">
                                                                            <div class="ms_lms_courses_card_item_wrapper">
                                                                                <a href="{{ route('user.course-detail', ['id' => $course->id]) }}"
                                                                                    class="ms_lms_courses_card_item_image_link">
                                                                                    <img decoding="async"
                                                                                        src="{{ asset('storage/' . $course->thumbnail) }}"
                                                                                        class="ms_lms_courses_card_item_image">
                                                                                </a>
                                                                                <div class="ms_lms_courses_card_item_info">
                                                                                    <a href="{{ route('user.course-detail', ['id' => $course->id]) }}"
                                                                                        class="ms_lms_courses_card_item_info_title">
                                                                                        <h3>{{ $course->title }}</h3>
                                                                                    </a>
                                                                                    <div
                                                                                        class="ms_lms_courses_card_item_info_meta">
                                                                                        <div
                                                                                            class="ms_lms_courses_card_item_meta_block">
                                                                                            <i class="stmlms-members"></i>
                                                                                            <span>{{ $course->student_enrolled }}</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="ms_lms_courses_card_item_meta_block">
                                                                                            <i class="stmlms-views"></i>
                                                                                            <span>15634</span>
                                                                                            <!-- (Nếu bạn có số lượt xem thì lấy từ CSDL) -->
                                                                                        </div>
                                                                                    </div>
                                                                                    <span
                                                                                        class="ms_lms_courses_card_item_info_divider"></span>
                                                                                    <div
                                                                                        class="ms_lms_courses_card_item_info_bottom_wrapper">
                                                                                        <div
                                                                                            class="ms_lms_courses_card_item_info_rating">
                                                                                            <div
                                                                                                class="ms_lms_courses_card_item_info_rating_stars">
                                                                                                <div class="ms_lms_courses_card_item_info_rating_stars_filled"
                                                                                                    style="width: {{ $course->rate * 20 }}%;">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="ms_lms_courses_card_item_info_rating_quantity">
                                                                                                <span>{{ number_format($course->rate, 1) }}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="ms_lms_courses_card_item_info_price">
                                                                                            <div
                                                                                                class="ms_lms_courses_card_item_info_price_single">
                                                                                                <span>{{ number_format($course->price, 0, ',', '.') }}
                                                                                                    đ</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms_lms_courses_card_item_popup">
                                                                                <div
                                                                                    class="ms_lms_courses_card_item_popup_author">
                                                                                    <img decoding="async"
                                                                                        src="https://secure.gravatar.com/avatar/e57afffbfde92ad891a8a7aec1694f85?s=215&#038;d=mm&#038;r=g">
                                                                                    <span
                                                                                        class="ms_lms_courses_card_item_popup_author_name">HTAV2</span>
                                                                                    <!-- Nếu có trường giảng viên thì sửa -->
                                                                                </div>
                                                                                <a href="{{ route('user.course-detail', ['id' => $course->id]) }}"
                                                                                    class="ms_lms_courses_card_item_popup_title">
                                                                                    <h3>{{ $course->title }}</h3>
                                                                                </a>
                                                                                <div
                                                                                    class="ms_lms_courses_card_item_popup_meta">
                                                                                    <div
                                                                                        class="ms_lms_courses_card_item_meta_block">
                                                                                        <i class="stmlms-levels"></i>
                                                                                        <span>{{ ucfirst($course->level) }}</span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="ms_lms_courses_card_item_meta_block">
                                                                                        <i class="stmlms-cats"></i>
                                                                                        <span>{{ $course->lesson }}
                                                                                            Lectures</span>
                                                                                    </div>
                                                                                    <div
                                                                                        class="ms_lms_courses_card_item_meta_block">
                                                                                        <i class="stmlms-lms-clocks"></i>
                                                                                        <span>{{ $course->total_time_finish }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="ms_lms_courses_card_item_popup_button_wrapper">
                                                                                    <a href="{{ route('user.course-detail', ['id' => $course->id]) }}"
                                                                                        class="ms_lms_courses_card_item_popup_button">
                                                                                        <span>Preview this course</span>
                                                                                    </a>
                                                                                    <div
                                                                                        class="ms_lms_courses_card_item_popup_bottom_wrapper">
                                                                                        <div
                                                                                            class="ms_lms_courses_card_item_popup_wishlist">
                                                                                            <div class="stm-lms-wishlist"
                                                                                                data-add="Add to Wishlist"
                                                                                                data-add-icon="far fa-heart"
                                                                                                data-remove="Remove from Wishlist"
                                                                                                data-remove-icon="fa fa-heart"
                                                                                                data-id="{{ $course->id }}">
                                                                                                <i class="far fa-heart"></i>
                                                                                                <span>Add to Wishlist</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="ms_lms_courses_card_item_popup_price">
                                                                                            <div
                                                                                                class="ms_lms_courses_card_item_popup_price_single">
                                                                                                <span>{{ number_format($course->price, 0, ',', '.') }}
                                                                                                    đ</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                                <div class="ms_lms_courses_grid__pagination_wrapper">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('course-categories').addEventListener('click', function(e) {
            if (e.target && e.target.matches('.ms_lms_courses_grid__sorting_button')) {
                const buttons = document.querySelectorAll('.ms_lms_courses_grid__sorting_button');
                buttons.forEach(btn => btn.classList.remove('active'));
                e.target.classList.add('active');

                const categoryId = e.target.getAttribute('data-id');

                fetch(`/filter/${categoryId}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const courses = data.courses || [];

                        const courseList = document.querySelector(
                            '#course-list .ms_lms_courses_card.card-style-1');
                        courseList.innerHTML = ''; // Đảm bảo xóa content cũ đúng vị trí

                        if (courses.length > 0) {
                            courses.forEach(course => {
                                courseList.innerHTML += `
                        <div class="ms_lms_courses_card_item">
                            <div class="ms_lms_courses_card_item_wrapper">
                                <a href="/user/course-detail/${course.id}" class="ms_lms_courses_card_item_image_link">
                                    <img decoding="async"
                                        src="/storage/${course.thumbnail}"
                                        class="ms_lms_courses_card_item_image">
                                </a>
                                <div class="ms_lms_courses_card_item_info">
                                    <a href="/user/course-detail/${course.id}" class="ms_lms_courses_card_item_info_title">
                                        <h3>${course.title}</h3>
                                    </a>
                                    <div class="ms_lms_courses_card_item_info_meta">
                                        <div class="ms_lms_courses_card_item_meta_block">
                                            <i class="stmlms-members"></i>
                                            <span>${course.student_enrolled}</span>
                                        </div>
                                        <div class="ms_lms_courses_card_item_meta_block">
                                            <i class="stmlms-views"></i>
                                            <span>15634</span>
                                        </div>
                                    </div>
                                    <span class="ms_lms_courses_card_item_info_divider"></span>
                                    <div class="ms_lms_courses_card_item_info_bottom_wrapper">
                                        <div class="ms_lms_courses_card_item_info_rating">
                                            <div class="ms_lms_courses_card_item_info_rating_stars">
                                                <div class="ms_lms_courses_card_item_info_rating_stars_filled"
                                                    style="width: ${parseFloat(course.rate) * 20}%;">
                                                </div>
                                            </div>
                                            <div class="ms_lms_courses_card_item_info_rating_quantity">
                                                <span>${parseFloat(course.rate).toFixed(1)}</span>
                                            </div>
                                        </div>
                                        <div class="ms_lms_courses_card_item_info_price">
                                            <div class="ms_lms_courses_card_item_info_price_single">
                                                <span>${Number(course.price).toLocaleString('vi-VN')} đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms_lms_courses_card_item_popup">
                                <div class="ms_lms_courses_card_item_popup_author">
                                    <img decoding="async"
                                        src="https://secure.gravatar.com/avatar/e57afffbfde92ad891a8a7aec1694f85?s=215&d=mm&r=g">
                                    <span class="ms_lms_courses_card_item_popup_author_name">HTAV2</span>
                                </div>
                                <a href="/user/course-detail/${course.id}" class="ms_lms_courses_card_item_popup_title">
                                    <h3>${course.title}</h3>
                                </a>
                                <div class="ms_lms_courses_card_item_popup_meta">
                                    <div class="ms_lms_courses_card_item_meta_block">
                                        <i class="stmlms-levels"></i>
                                        <span>${course.level.charAt(0).toUpperCase() + course.level.slice(1)}</span>
                                    </div>
                                    <div class="ms_lms_courses_card_item_meta_block">
                                        <i class="stmlms-cats"></i>
                                        <span>${course.lesson} Lectures</span>
                                    </div>
                                    <div class="ms_lms_courses_card_item_meta_block">
                                        <i class="stmlms-lms-clocks"></i>
                                        <span>${course.total_time_finish}</span>
                                    </div>
                                </div>
                                <div class="ms_lms_courses_card_item_popup_button_wrapper">
                                    <a href="/user/course-detail/${course.id}" class="ms_lms_courses_card_item_popup_button">
                                        <span>Preview this course</span>
                                    </a>
                                    <div class="ms_lms_courses_card_item_popup_bottom_wrapper">
                                        <div class="ms_lms_courses_card_item_popup_wishlist">
                                            <div class="stm-lms-wishlist"
                                                data-add="Add to Wishlist"
                                                data-add-icon="far fa-heart"
                                                data-remove="Remove from Wishlist"
                                                data-remove-icon="fa fa-heart"
                                                data-id="${course.id}">
                                                <i class="far fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </div>
                                        </div>
                                        <div class="ms_lms_courses_card_item_popup_price">
                                            <div class="ms_lms_courses_card_item_popup_price_single">
                                                <span>${Number(course.price).toLocaleString('vi-VN')} đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                            });
                        } else {
                            courseList.innerHTML = '<p>No courses found.</p>';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endsection
