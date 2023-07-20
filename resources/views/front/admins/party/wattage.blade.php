@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Wattage</h5>
                <div class="add">

                    <a  class="btn btn-success" href="{{route('wattage_add')}}">Add</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Wattage</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        {{--                        @foreach($posts as $post)--}}
                        <tr>
                            <td></td>
                            <td></td>

                            <td>
                                <a href="{{route('wattage_edit')}}" class="btn btn-outline-info"><i
                                        class="bx bx-edit-alt me-1"></i>Edit</a>
                                <br><br>
                                <form id="delete-form" action=""
                                      method="POST"
                                      style="display: inline-block;">

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete">Xoá
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete" tabindex="-1"
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
