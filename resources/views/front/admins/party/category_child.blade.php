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
                    <input type="text" class="form-control border-0 shadow-none" id="search_category_child"
                           placeholder="Search..."
                           aria-label="Search..." style="width: 100%;"/>
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
    border-color: #696cff; color:#fff">Category_Child</h5>
                <div class="add">

                    <a class="btn btn-success" href="{{route('category_child_add')}}">Add</a>
                </div>
                <div class="table-responsive text-nowrap content1">
                    <table class="table">
                    <thead>
                    <tr class="color_tr">
                        <th>STT</th>
                        <th>Category_Child</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 alldata">
                    @foreach($category_child as $category_childs)
                        <tr>
                            <td></td>
                            <td>{{$category_childs -> description}}</td>
                            <td>
                                <a href="{{route('category_child_edit',$category_childs -> id)}}" class="btn btn-outline-info"><i
                                        class="bx bx-edit-alt me-1"></i>Edit</a>
                                <br><br>
                                <form id="delete-form" action="{{ route('category_child.destroy', $category_childs->id) }}"
                                      method="POST"
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{$category_childs->id}}">Xoá
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$category_childs->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có muốn xoá <strong style="text-transform: uppercase;">{{$category_childs -> description}}</strong> này? <br>
                                                    Khi xóa mục này những bảng có liên kết cũng sẽ bị xóa theo
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
                    <tbody class="searchdata" id="Content">

                    </tbody>

                    </table>
                   
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>

    <script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script>
        // Sử dụng document.querySelectorAll để lấy tất cả các thẻ td chứa giá trị $post -> id
        var tdElements = document.querySelectorAll("td:nth-child(1)");
        // Duyệt qua từng thẻ td và thay đổi giá trị của nó từ 1 đến n
        for (var i = 0; i < tdElements.length; i++) {
            tdElements[i].textContent = i + 1;
        }
        $('#search_category_child').on('keyup', function () {
            $value = $(this).val();
            if ($value) {
                $('.alldata').hide();
                $('.searchdata').show();
            } else {
                $('.alldata').show();
                $('.searchdata').hide();
            }
            $.ajax(
                {
                    type: 'get',
                    url: '{{route("search.category_child")}}',
                    data: {
                        'search': $value
                    },
                    success: function (data) {
                        console.log(data);
                        $('#Content').html(data);
                    }
                }
            )
        });
    </script>
    <script>
        $(document).ready(function () {
            function loadBrands(page) {
                $.ajax({
                    url: '/ajax/category_childs?page=' + page,
                    type: 'get',
                    success: function (data) {
                        $('.content1').html(data);
                        // Rest of your code (e.g., update the STT column)
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Initial load
            loadBrands(1);

            // Handle pagination click
            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadBrands(page);
            });

            // ... Rest of your code (search functionality, etc.)
        });
    </script>
    <!-- Button trigger modal -->
    <!--  -->
@endsection
