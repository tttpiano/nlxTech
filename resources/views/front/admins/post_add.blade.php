@extends('front.admins.layouts.master')
@section('admin-container')


<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <!-- Account -->
                <hr class="my-0"/>
                <div class="card-body">

                    <form method="post" enctype="multipart/form-data" action="{{ route('image.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                @if($message = Session::get('success'))
                                <img
                                    src="{{ asset('images/'.Session::get('images')) }}"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="100"
                                    width="100"
                                    id="fileUpload"
                                />
                                @else
                                    <img
                                        src="{{ asset('storage/img/uptoload.jpg')}}"
                                        alt="user-avatar"
                                        class="d-block rounded"
                                        height="100"
                                        width="100"
                                        id="fileUpload"
                                    />
                                @endif
                                <div class="button-wrapper">

                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input
                                            type="file"
                                            id="upload"
                                            name="fileUpload"
                                            class="account-file-input"
                                            hidden
                                            accept="image/png, image/jpeg, image/jpg"
                                        />
                                    </label>

                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <button type="submit" class="btn btn-outline-success accougnt-image-reset mb-4 upload submitOk" data-img="{{ Session::get('images') }}">
                                        <i class="bx bx-reset d-block d-sm-none "></i>
                                        <span class="d-none d-sm-block">OK</span>
                                    </button>



                                </div>
                            </div>
                        </div>
                    </form>

                    <form id="formAccountSettings" method="GET"
                          onsubmit="return false" enctype="multipart/form-data">

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Author</label>
                                <input class="form-control" type="text" id="author"
                                       name="author"
                                       placeholder="author" autofocus required/>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Title</label>
                                <input class="form-control" type="text" name="title"
                                       id="title" placeholder="title" required/>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <input class="form-control" type="text" id="description"
                                       name="description"
                                       placeholder="description" required/>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Content</label>

                                <textarea name="content" id="content"></textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Meta Desc</label>
                                <input class="form-control" type="text" id="meta_desc"
                                       name="meta_Desc"
                                       placeholder="Meta Desc" autofocus required/>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Meta Keyword</label>
                                <input class="form-control" type="text" id="meta_keyword"
                                       name="meta_Keyword"
                                       placeholder="Meta Keyword" autofocus required/>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Status</label>
                                <select id="status" class="select2 form-select">
                                    <option value="show" selected>Show</option>
                                    <option value="hidden">Hidden</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Url Seo</label>
                                <input class="form-control" type="text" id="Url_Seo"
                                       name="url_Seo"
                                       placeholder="Url Seo" autofocus required/>
                            </div>
                        </div>
                        <div class="mt-2" style="text-align: right">
                            <button type="reset" class="btn btn-outline-secondary">Reset
                            </button>
                            <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-outline-success me-2 add_post">Save
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
    CKEDITOR.replace('content' ,{
        filebrowserUploadUrl: "{{ route('upload.image', ['_token' => csrf_token()]) }}"
    });
    // Preview


</script>



@endsection
