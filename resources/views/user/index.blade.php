@extends('user.layouts.home')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                                            <div class="ms_lms_courses_grid__sorting_wrapper">
                                                                <ul class="ms_lms_courses_grid__sorting style_2">
                                                                    <li>
                                                                        <span data-id="all"
                                                                            class="ms_lms_courses_grid__sorting_button active">
                                                                            All </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="75"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Mới học lập trình </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="76"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Cơ sở dữ liệu </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="77"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Lập trình Web </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="78"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Java Backend </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="79"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Java Fullstack </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="80"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Data Science </span>
                                                                    </li>
                                                                    <li>
                                                                        <span data-id="81"
                                                                            class="ms_lms_courses_grid__sorting_button ">
                                                                            Kiến thức nền tảng </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="ms_lms_courses_grid__content  title_style_1">
                                                            <div class="ms_lms_courses_card_wrapper">
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
                                                                                        <span class="ms_lms_courses_card_item_info_divider"></span>
                                                                                        <div class="ms_lms_courses_card_item_info_bottom_wrapper">
                                                                                            <div class="ms_lms_courses_card_item_info_rating">
                                                                                                <div class="ms_lms_courses_card_item_info_rating_stars">
                                                                                                    <div class="ms_lms_courses_card_item_info_rating_stars_filled" style="width: {{ $course->rate * 20 }}%;"></div>
                                                                                                </div>
                                                                                                <div class="ms_lms_courses_card_item_info_rating_quantity">
                                                                                                    <span>{{ number_format($course->rate, 1) }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ms_lms_courses_card_item_info_price">
                                                                                                <div class="ms_lms_courses_card_item_info_price_single">
                                                                                                    <span>{{ $course->price > 0 ? number_format($course->price, 0, ',', '.') . ' đ' : 'Miễn phí' }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                <!-- Hiển thị khóa học ngẫu nhiên -->
                                                                <h3 class="section-title">{{ Auth::check() ? 'Khóa học khác' : 'Khóa học mới nhất' }}</h3>
                                                                <div class="ms_lms_courses_grid__content title_style_1">
                                                                    <div class="ms_lms_courses_card_wrapper">
                                                                        <div class="ms_lms_courses_card card-style-1">
                                                                            @foreach ($randomCourses->take(8) as $course)
                                                                            <div class="ms_lms_courses_card_item">
                                                                                <div class="ms_lms_courses_card_item_wrapper">
                                                                                    <a href="{{ route('user.course-detail', ['id' => $course->id]) }}" class="ms_lms_courses_card_item_image_link">
                                                                                        <img decoding="async" src="{{ asset('storage/' . $course->thumbnail) }}" class="ms_lms_courses_card_item_image" alt="{{ $course->title }}">
                                                                                    </a>
                                                                                    <div class="ms_lms_courses_card_item_info">
                                                                                        <a href="{{ route('user.course-detail', ['id' => $course->id]) }}" class="ms_lms_courses_card_item_info_title">
                                                                                            <h3>{{ $course->title }}</h3>
                                                                                        </a>
                                                                                        <div class="ms_lms_courses_card_item_info_meta">
                                                                                            <div class="ms_lms_courses_card_item_meta_block">
                                                                                                <i class="stmlms-members"></i>
                                                                                                <span>{{ $course->student_enrolled }}</span>
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
                                                                                                    <div class="ms_lms_courses_card_item_info_rating_stars_filled" style="width: {{ $course->rate * 20 }}%;"></div>
                                                                                                </div>
                                                                                                <div class="ms_lms_courses_card_item_info_rating_quantity">
                                                                                                    <span>{{ number_format($course->rate, 1) }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="ms_lms_courses_card_item_info_price">
                                                                                                <div class="ms_lms_courses_card_item_info_price_single">
                                                                                                    <span>{{ $course->price > 0 ? number_format($course->price, 0, ',', '.') . ' đ' : 'Miễn phí' }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
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
@endsection
@include('user.chatbot_box')