<!-- Sidebar -->
<div class="stm_lms_user_float_menu __collapsed __position_left __logged_in">
    <div class="stm_lms_user_float_menu__toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12">
            <rect id="backgroundrect" width="100%" height="100%" x="0" y="0" fill="none" stroke="none" />
            <g class="currentLayer" style="">
                <title>Layer 1</title>
                <g id="svg_1" class="selected"
                    transform="rotate(-179.99197387695312 8.001564025878908,6.000000000000001) ">
                    <g id="svg_2">
                        <path fill="#273044"
                            d="M1 0h9a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm14.793 6.483L13.411 8.78a.742.742 0 0 1-1.021 0 .679.679 0 0 1 0-.985l.848-.817H.954c-.527 0-.954-.448-.954-1s.427-1 .954-1h12.281l-.845-.814a.678.678 0 0 1 0-.985.74.74 0 0 1 1.02 0l2.383 2.297a.678.678 0 0 1 .21.504.679.679 0 0 1-.21.503zM1 10h9a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2z"
                            id="svg_3" />
                    </g>
                </g>
            </g>
        </svg>
    </div>
    <a href="#" class="stm_lms_user_float_menu__user float_menu_item">
        <div class="stm_lms_user_float_menu__user_avatar">
            <img src='https://secure.gravatar.com/avatar/c91b9db5b89ee07e68ac57f3a5602ae8?s=215&#038;d=mm&#038;r=g'
                class='avatar avatar-215 photo' />
        </div>

        <div class="stm_lms_user_float_menu__user_info">
            <h3>vuong8aqhqlna</h3>
            <span>Student</span>
        </div>

        <div class="stm_lms_user_float_menu__user_settings">
            <i class="fas fa-cog"></i>
        </div>
    </a>

    <div class="stm_lms_user_float_menu__scrolled">
        <a href="{{route('user.enrolled-courses')}}" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                Enrolled Courses </span>
            <i class="fa fa-book float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                Messages </span>
            <i class="fa fa-envelope float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                Wishlist </span>
            <i class="fa fa-star float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                Enrolled Quizzes </span>
            <i class="fa fa-question float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                My Orders </span>
            <i class="fa fa-shopping-basket float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                My Certificates </span>
            <i class="fa fa-medal float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                Groups </span>
            <i class="fa fa-users float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                My Assignments </span>
            <i class="fa fa-pen-nib float_menu_item__icon"></i>
        </a>

        <a href="#" class="float_menu_item float_menu_item__inline __icon">
            <span class="float_menu_item__title heading_font">
                My Points </span>
            <i class="fa fa-trophy float_menu_item__icon"></i>
        </a>

        <div class="stm_lms_user_float_menu__scrolled_label">
            <i class="fa fa-chevron-down"></i>
        </div>
    </div>

    <a href="#" class="stm-lms-logout-button">
        <i class="fas fa-power-off"></i>
        <span>Log out</span>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.stm_lms_user_float_menu');
        const mainContent = document.querySelector('.main-content');
        const toggleButton = document.querySelector('.stm_lms_user_float_menu__toggle');

        // Toggle sidebar on click
        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('__collapsed');
            mainContent.classList.toggle('sidebar-expanded');
        });
    });
</script>