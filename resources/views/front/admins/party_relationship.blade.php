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
                        @php
                            $count1 = 1;
                        @endphp
                        @foreach ($relatedParties as $relatedParty)

                            <tr>

                            <td>{{$count1++}}</td>
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
                        @php
                            $count2 = 1;
                        @endphp
                        @foreach ($relatedParties2 as $related)

                            <tr>

                                <td>{{$count2++}}</td>
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

@endsection
