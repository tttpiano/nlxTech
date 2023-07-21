@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">PARTY_RELATIONSHIP</h5>
                <div class="add">

                    <a class="btn btn-success" href="{{route('party_relationship_add')}}">Add</a>
                </div>

                <div class="table-responsive text-nowrap">

                    <table class="table">
                        <thead>
                        <tr class="color_tr">
                            <th>STT</th>
                            <th>Categoty</th>
                            <th>Categoty Child</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>


                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>
                                <a href="{{route('party_relationship_edit')}}" class="btn btn-outline-info"><i
                                        class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                    <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr class="color_tr">
                            <th>STT</th>
                            <th>Categoty Child</th>
                            <th>Brand</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>

                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>
                                <a href="{{route('party_relationship_edit')}}" class="btn btn-outline-info"><i
                                        class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                                <button type="submit" class="btn btn-danger">Delete</button>
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
