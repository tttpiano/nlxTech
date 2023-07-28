

@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="card-header" style="background-color: #696cff;
    border-color: #696cff; color:#fff">Edit-Banner</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <!-- Account -->
                    <div class="card-body">
                        <label
                            class="form-label">Banner</label>
                        <form method="post" enctype="multipart/form-data" action="{{ route('image.banner') }}">
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
                                            src="{{ asset($banner->image_path) }}"
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

                                        <button type="button"
                                                class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <button
                                            class="btn btn-outline-success accougnt-image-reset mb-4 upload submitOk"
                                            data-img="{{ Session::get('images') }}">
                                            <i class="bx bx-reset d-block d-sm-none "></i>
                                            <span class="d-none d-sm-block">OK</span>
                                        </button>


                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Order</label>
                                    <input class="form-control"
                                           type="number" name="order"
                                           id="order"
                                           placeholder="order"
                                           value="{{ $banner->order }}"/>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label
                                        class="form-label">Active</label>
                                    <input  type="checkbox" id="active" name="active" value="1" @if($banner->active) checked @endif/>
                                </div>
                            </div>
                            <div class="mt-2"
                                 style="text-align: right">

                                <a href="{{route('admin.banners.index')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                    >
                                        Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
