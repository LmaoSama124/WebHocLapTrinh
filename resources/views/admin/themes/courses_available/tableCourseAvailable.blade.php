@extends('admin.layouts.admin')

@section('content') 
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Quản lý khoá học khả dụng</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="?mode=admin">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Bảng quản lý khoá học khả dụng</a>
                    </li>
                </ul>
            </div>

            <div class="row table-row">
                <div class="table-container">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="sticky-id">Id</th>
                                <th>ID User</th>
                                <th>Name</th>
                                <th>ID Course</th>
                                <th>Title</th>
                                <th>Expiration At</th>
                                <th>Status</th>
                                <th>LPT</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="sticky-actions">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="sticky-id">Id</th>
                                <th>ID User</th>
                                <th>Name</th>
                                <th>ID Course</th>
                                <th>Title</th>
                                <th>Expiration At</th>
                                <th>Status</th>
                                <th>LPT</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="sticky-actions">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($incomes as $income)
                                <tr>
                                    <td class="sticky-id">{{ $income->id }}</td>
                                    <td>{{ $income->id_user ?? '--' }}</td>
                                    <td>{{ $income->name ?? '--' }}</td>
                                    <td>{{ $income->id_course ?? '--' }}</td>
                                    <td>{{ $income->title ?? '--'}}</td>
                                    <td>{{ $income->expiration_at ?? '--'}}</td>
                                    <td>{{ $income->status ?? '--'}}</td>
                                    <td>{{ $income->lpt ?? '--'}}</td>
                                    <td>{{ $income->updated_at ?? '--' }}</td>
                                    <td class="text-center sticky-actions">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href=""
                                                class="btn btn-warning btn-sm w-100 d-flex align-items-center justify-content-center">
                                                <i class="fas fa-income$income me-1"></i> Chi tiết
                                            </a>
                                            <a href=""
                                                class="btn btn-warning btn-sm w-100 d-flex align-items-center justify-content-center">
                                                <i class="fas fa-edit me-1"></i> Sửa
                                            </a>
                                            <button
                                                class="btn btn-danger btn-sm w-100 d-flex align-items-center justify-content-center delete-income$income"
                                                data-id="{{ $income->id }}">
                                                <i class="fas fa-trash me-1"></i> Xóa
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center fw-bold text-danger">
                                        Không có bản ghi nào được tìm thấy
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xác nhận Xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalBtn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa người dùng này không?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                    <button type="button" class="btn btn-secondary" id="cancelModalBtn">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script xử lý Xóa --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let deletecourseAvailableButtons = document.querySelectorAll('.delete-courseAvailable');
            let closeModalBtn = document.getElementById('closeModalBtn');
            let cancelModalBtn = document.getElementById('cancelModalBtn');

            deletecourseAvailableButtons.forEach(button => {
                button.addEventListener('click', function () {
                    let courseAvailableId = this.getAttribute('data-id');
                    let form = document.getElementById('deleteForm');
                    form.action = '{{ url("admin/courseAvailables") }}/' + courseAvailableId;
                    $('#deleteModal').modal('show');
                });
            });

            // Đóng modal khi bấm "Hủy" hoặc nút "X"
            closeModalBtn.addEventListener('click', function () {
                $('#deleteModal').modal('hide');
            });

            cancelModalBtn.addEventListener('click', function () {
                $('#deleteModal').modal('hide');
            });
        });
    </script>
@endsection