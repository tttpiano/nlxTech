@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- Account -->
                    <div class="card-body">
                        <form id="formAccountSettings"
                              action=""
                              method="PUT"
                              onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Author</label>
                                    <input class="form-control"
                                           type="text" id="author1"
                                           name="author1"
                                           placeholder="author"
                                           autofocus
                                           value="{{$post->author}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Title</label>
                                    <input class="form-control"
                                           type="text" name="title1"
                                           id="title1"
                                           placeholder="title"
                                           value="{{$post->title}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Description</label>
                                    <input class="form-control"
                                           type="text"
                                           id="description1"
                                           name="description1"
                                           placeholder="description"
                                           value="{{$post->description}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Content</label>
                                    <textarea

                                        style="resize: none"
                                        rows="8"
                                        class="form-control"
                                        id="content1"
                                        name="content1">{{$post->content}}</textarea>

                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Meta
                                        Desc</label>
                                    <input class="form-control"
                                           type="text"
                                           id="meta_desc1"
                                           name="meta_desc1"
                                           placeholder="meta_desc"
                                           value="{{$post->meta_desc}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Meta
                                        Keyword</label>
                                    <input class="form-control"
                                           type="text"
                                           id="meta_keyword1"
                                           name="meta_keyword1"
                                           placeholder="meta_keyword"
                                           value="{{$post->meta_keyword}}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Status</label>
                                    <select id="status1" class="select1 form-select">
                                        <option value="show" selected>Show</option>
                                        <option value="hidden">Hidden</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Url
                                        Seo</label>
                                    <input class="form-control"
                                           type="text" id="url_seo1"
                                           name="url_seo1"
                                           placeholder="url_seo"
                                           value="{{$post->url_seo}}"/>
                                </div>
                            </div>
                            <div class="mt-2"
                                 style="text-align: right">

                                <a href="{{route('admin_post')}}">
                                <button type="button"
                                        class="btn btn-outline-danger"
                                       >
                                    Close
                                </button>
                                </a>
                                <button type="submit"
                                        class="btn btn-outline-success me-2 edit_post">
                                    Save
                                </button>

                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->

    <script>
        CKEDITOR.replace('content1' ,{
            filebrowserUploadUrl: "{{ route('upload.image', ['_token' => csrf_token()]) }}",


        });

    </script>

@endsection
