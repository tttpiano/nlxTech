@extends('front.admins.layouts.master')
@section('admin-container')


    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">PRODUCT</h5>
                <div class="add">
                    <a  class="btn btn-success" href="{{route('product_add')}}">Add</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>

                            <th>Name</th>
                            <th>Images</th>
                            <th>Dessciption</th>
                            <th>Price</th>
                            <th>Price_status</th>
                            <th>Url_seo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>

                            <td>Albert Cook</td>
                            <td>
                                <img style="width: 100px;" src="../assets/img/avatars/5.png" alt="Avatar"
                                     class="rounded-circle" />
                            </td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>
                                <a href="{{route('product_edit')}}" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                                <button type="submit" class="btn btn-danger">Xoá</button>
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

    <!-- Modal -->



@endsection
