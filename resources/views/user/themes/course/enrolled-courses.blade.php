<!-- enrolled-courses.blade.php -->
@extends('user.layouts.home')

@section('content')
<!-- Bootstrap Icons -->


<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Enrolled courses</h2>
        
    </div>
    
    <hr class="bg-primary" style="width: 200px; height: 3px; opacity: 1;">
    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card status-tab active">
                <a href="#" class="card-body d-flex align-items-center">
                    <div class="status-icon all-icon">
                        <i class="bi bi-collection"></i>
                    </div>
                    <div>
                        <div>All</div>
                        <h3 class="mb-0">3</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card status-tab">
                <a href="#" class="card-body d-flex align-items-center">
                    <div class="status-icon completed-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div>
                        <div>Completed</div>
                        <h3 class="mb-0">0</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card status-tab">
                <a href="#" class="card-body d-flex align-items-center">
                    <div class="status-icon progress-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <div>In progress</div>
                        <h3 class="mb-0">1</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card status-tab">
                <div class="card-body d-flex align-items-center">
                    <div class="status-icon failed-icon">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <div>
                        <div>Failed</div>
                        <h3 class="mb-0">0</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Course 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('assets/user/wp-content/uploads/2023/01/jdbc.png') }}" class="card-img-top" alt="Java JDBC Course">
                <div class="card-body d-flex flex-column">
                    <div class="small text-muted mb-2">Cơ sở dữ liệu</div>
                    <h5 class="card-title">[Video] JDBC - Lập trình Java với cơ sở dữ liệu (Phần 1)</h5>
                    <div class="text-muted small mb-2">Java Backend</div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small>0% Complete</small>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <a href="#" class="btn btn-primary mt-auto text-center py-3">START COURSE</a>
                </div>
            </div>
        </div>
        
        <!-- Course 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('assets/user/wp-content/uploads/2023/06/laptrinhmang-3.png') }}" class="card-img-top" alt="Network Programming Course">
                <div class="card-body d-flex flex-column">
                    <div class="small text-muted mb-2">Java Backend</div>
                    <h5 class="card-title">[Video] Lập trình mạng (sử dụng Java)</h5>
                    <div class="text-muted small mb-2">Java Backend</div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small>11% Complete</small>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <a href="#" class="btn btn-success mt-auto text-center py-3">CONTINUE</a>
                </div>
            </div>
        </div>
        
        <!-- Course 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('assets/user/wp-content/uploads/2023/01/Lap-trinh-Java.png') }}" class="card-img-top" alt="Java Core Course">
                <div class="card-body d-flex flex-column">
                    <div class="small text-muted mb-2">Java Backend</div>
                    <h5 class="card-title">[Video] Lập trình Java (Java Core)</h5>
                    <div class="text-muted small mb-2">Java Backend</div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small>0% Complete</small>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <a href="#" class="btn btn-primary mt-auto text-center py-3">START COURSE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusTabs = document.querySelectorAll('.status-tab');
        
        statusTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                statusTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                // Add filtering logic here if needed
            });
        });
    });
</script>
@endsection