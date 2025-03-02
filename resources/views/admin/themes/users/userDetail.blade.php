@extends('admin.layouts.admin')

@section('content') 
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">User Information</h3>
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
                    <a href="#">User Details</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Field</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td>{{ $user->id ?? '--' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $user->email ?? '--' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>{{ $user->name ?? '--' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Age</strong></td>
                            <td>
                                @if (!empty($user->age))
                                    {{ $user->age }}
                                @else
                                    <span class="badge bg-danger">No data</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>
                                @if (!empty($user->address))
                                    {{ $user->address }}
                                @else
                                    <span class="badge bg-danger">No data</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td>
                                @if (!empty($user->gender))
                                    {{ $user->gender }}
                                @else
                                    <span class="badge bg-danger">No data</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date of Birth</strong></td>
                            <td>
                                @if (!empty($user->date_of_birth))
                                    {{ $user->date_of_birth }}
                                @else
                                    <span class="badge bg-danger">No data</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Phone</strong></td>
                            <td>
                                @if (!empty($user->phone))
                                    {{ $user->phone }}
                                @else
                                    <span class="badge bg-danger">No data</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Created At</strong></td>
                            <td>{{ $user->created_at ?? '--' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated At</strong></td>
                            <td>{{ $user->updated_at ?? '--' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection