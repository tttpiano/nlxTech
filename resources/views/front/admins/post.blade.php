@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">POST</h5>
                <div class="add">

                    <a  class="btn btn-success" href="{{route('post_add')}}">Add</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Content</th>
                            <th>Meta_desc</th>
                            <th>Meta_keyword</th>
                            <th>Url_seo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post -> id}}</td>
                                <td>{{$post -> author}}</td>
                                <td>{{$post -> title}}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post->description, 10) }}
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($post->content, 10) }}
                                </td>
                                <td>{{$post -> meta_desc}}</td>
                                <td>{{$post -> meta_keyword}}</td>
                                <td>{{$post -> url_seo}}</td>
                                <td>{{$post -> status}} </td>
                                <td>
                                    <a href="{{route('post_edit', $post->id)}}" class="btn btn-outline-info"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>
                                    <br><br>
                                    <form id="delete-form" action="{{ route('posts.destroy', $post->id) }}"
                                          method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
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
