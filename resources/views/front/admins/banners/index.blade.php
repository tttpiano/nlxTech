@extends('front.admins.layouts.master')
@section('admin-container')
    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center" style="width: 100%;">
                <div class="nav-item d-flex align-items-center" style="width: 100%;">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" id="search_post" placeholder="Search..."
                           aria-label="Search..." style="width: 100%;" />
                </div>
            </div>
            <!-- /Search -->


        </div>
    </nav>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Banner</h5>
                <div class="add">
                    <a class="btn btn-success" href="{{ route('admin.banners.create') }}">Add</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr class="color_tr">
                            <th>ID</th>
                            <th>Image</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 alldata" >
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                                <td><img src="{{ asset($banner->image_path) }}" alt="Banner Image" width="100"></td>
                                <td>{{ $banner->order }}</td>
                                <td>{{ $banner->active ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-outline-info"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <br><br>
                                    <form id="delete-form" action="{{ route('admin.banners.destroy', $banner->id) }}"
                                          method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{$banner->id}}">Xoá
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{$banner->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có muốn xoá bài viết này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Đóng
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tbody id="Content" class="searchdata">

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
    <!-- Button trigger modal -->
    <!--  -->

@endsection
