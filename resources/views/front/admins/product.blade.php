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
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Add</button>

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
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModaledit" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</button><br><br>
                        <button type="button" class="btn btn-outline-danger"><i class="bx bx-trash me-1"></i>Delete</button>
                        <div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl  modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header pt-10 pl-10 pb-6" style="background-color: #696cff;
                          border-color: #696cff;">
                              <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">EDIT PRODUCT</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                            <div class="content-wrapper">
                                  <!-- Content -->

                                  <div class="container-xxl flex-grow-1 container-p-y">
                                    <div class="row">
                                      <div class="col-md-12">

                                        <div class="card mb-4">
                                          <!-- Account -->
                                          <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                              <img
                                                src="{{asset('storage/img/product_image.jpg')}}"
                                                alt="user-avatar"
                                                class="d-block rounded"
                                                height="100"
                                                width="100"
                                                id="uploadedAvatar"
                                              />
                                              <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                  <span class="d-none d-sm-block">Upload new photo</span>
                                                  <i class="bx bx-upload d-block d-sm-none"></i>
                                                  <input
                                                    type="file"
                                                    id="upload"
                                                    class="account-file-input"
                                                    hidden
                                                    accept="image/png, image/jpeg"
                                                  />
                                                </label>
                                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                  <i class="bx bx-reset d-block d-sm-none"></i>
                                                  <span class="d-none d-sm-block">Reset</span>
                                                </button>


                                              </div>
                                            </div>
                                          </div>
                                          <hr class="my-0" />
                                          <div class="card-body">
                                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                                              <div class="row">
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Name</label>
                                                  <input
                                                    class="form-control"
                                                    type="text"
                                                    id="Name"
                                                    name="Name"
                                                    placeholder="Name"
                                                    autofocus
                                                  />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Description</label>
                                                  <input class="form-control" type="text" name="Description" id="Description" placeholder="Description" />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Price</label>
                                                  <input
                                                    class="form-control"
                                                    type="text"
                                                    id="Price"
                                                    name="Price"
                                                    placeholder="Price"
                                                  />
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Price status</label>
                                                  <select id="Price status" class="select2 form-select">
                                                    <option value="" selected>Show</option>
                                                    <option value="Australia">Hidden</option>
                                                  </select>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Category</label>
                                                  <select id="Price status" class="select2 form-select">
                                                    <option value="" selected>Show</option>
                                                    <option value="Australia">Hidden</option>
                                                  </select>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">CategoryChild</label>
                                                  <select id="Price status" class="select2 form-select">
                                                    <option value="" selected>Show</option>
                                                    <option value="Australia">Hidden</option>
                                                  </select>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Brand</label>
                                                  <select id="Price status" class="select2 form-select">
                                                    <option value="" selected>Show</option>
                                                    <option value="Australia">Hidden</option>
                                                  </select>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                  <label class="form-label">Wattage</label>
                                                  <select id="Price status" class="select2 form-select">
                                                    <option value="" selected>Show</option>
                                                    <option value="Australia">Hidden</option>
                                                  </select>
                                                </div>
                                              </div>
                                              <div class="mt-2" style="text-align: right">
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-success me-2">Save </button>
                                              </div>
                                            </form>
                                          </div>
                                          <!-- /Account -->
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                  <!-- / Content -->
                            </div>
                            <!-- <div class="modal-footer">

                              <button type="button" class="btn btn-primary">ADD</button>
                            </div> -->
                          </div>
                        </div>
                        </div>
                      </td>
                    </tr>ADD

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
