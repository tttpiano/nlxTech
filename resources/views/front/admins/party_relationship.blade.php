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

                <div class="table-responsive text-nowrap content1">

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
                        
                        @foreach ($relatedParties as $relatedParty)

                            <tr>

                            <td></td>
                            <td>{{ $relatedParty->party->description}} </td>
                            <td>{{ $relatedParty->child->description }}</td>
                            <td>
                                <a href="{{route('party_relationship_edit',$relatedParty->id)}}" class="btn btn-outline-info"><i
                                        class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                                <form id="delete-form" action="{{ route('party_relationship.destroy1', $relatedParty->id) }}"
                                      method="POST"
                                      style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{$relatedParty->id}}">Xoá
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$relatedParty->id}}" tabindex="-1"
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
                    </table>
                    
                </div>

                <div class="table-responsive text-nowrap content2">
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
                       
                        @foreach ($relatedParties2 as $related)

                            <tr>

                                <td></td>
                                <td>{{ $related->party->description}} </td>
                                <td>{{ $related->child->description }}</td>
                                <td>
                                    <a href="{{route('party_relationship_edit2',$related->id)}}" class="btn btn-outline-info"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                                    <form id="delete-form" action="{{ route('party_relationship.destroy2', $related->id) }}"
                                          method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{$related->id}}">Xoá
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{$related->id}}" tabindex="-1"
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
                    </table>
                    
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>

    </div>
    <!-- Button trigger modal -->
    <!--  -->
    <script>
        $(document).ready(function () {
            function loadRelationships(page) {
                $.ajax({
                    url: '/ajax/party_relationships1?page=' + page,
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
            loadRelationships(1);
            

            // Handle pagination click
            $(document).on('click', '.pagin1 .pagination a', function (e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadRelationships(page);
               
            });

            // ... Rest of your code (search functionality, etc.)
        });
    </script>
    <script>
        $(document).ready(function () {
            function loadRelationships2(page) {
                $.ajax({
                    url: '/ajax/party_relationships2?page=' + page,
                    type: 'get',
                    success: function (data) {
                        $('.content2').html(data);
                        // Rest of your code (e.g., update the STT column)
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
            

            // Initial load
            loadRelationships2(1);
            

            // Handle pagination click
            $(document).on('click', '.pagin2 .pagination a', function (e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadRelationships2(page);
               
            });

            // ... Rest of your code (search functionality, etc.)
        });
    </script>
    
@endsection
