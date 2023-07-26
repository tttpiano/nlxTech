<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ $pageTitle }}</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('storage/img/logo/logo.jpg')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('storage/css/multi-select-tag.css')}}">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/fonts/boxicons.css')}}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/css/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/css/theme-default.css')}}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('storage/assets/css/demo.css')}}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>

    <link rel="stylesheet" href="{{asset('storage/assets/vendor/libs/apex-charts/apex-charts.css')}}"/>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('storage/assets/vendor/js/helpers.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="{{asset('storage/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('storage/ckeditor/lang/vi.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('storage/assets/js/config.js')}}"></script>
</head>

<body>

@include('front/admins/layouts/header')
<!-- header end -->

<!-- body - container -->
@yield('admin-container')

<!-- footer -->
@include('front/admins/layouts/footer')
<script src="{{asset('storage/js/multi-select-tag.js')}}"></script>
<script>
    new MultiSelectTag('brand1')
    new MultiSelectTag('category_child')
    // id
</script>
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('storage/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('storage/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('storage/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('storage/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('storage/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('storage/assets/js/dashboards-analytics.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('storage/assets/js/pages-account-settings-account.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->


<script>

    $(document).ready(function () {
        $('.edit_post').click(function () {
            var url = new URL(window.location.href);
            var postId = url.pathname.split('/').pop();
            console.log(postId);
            var author1 = $('#author1').val();
            var title1 = $('#title1').val();
            var description1 = $('#description1').val();
            var content2 = CKEDITOR.instances.content1.getData();
            var meta_desc1 = $('#meta_desc1').val();
            var meta_keyword1 = $('#meta_keyword1').val();
            var statusValue1 = $('#status1 option:selected').val();

            var url_Seo1 = $('#url_seo1').val();
            console.log(author1 + title1 + description1 + statusValue1 + content2 + meta_desc1 + meta_keyword1 + url_Seo1);

            $.ajax({
                type: 'PUT',
                url: '{{ route('post.edit') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: postId,
                    author1: author1,
                    title1: title1,
                    description1: description1,
                    content2: content2,
                    meta_desc1: meta_desc1,
                    meta_keyword1: meta_keyword1,
                    status1: statusValue1,
                    url_Seo1: url_Seo1
                },
                success: function (response) {
                    if (response.success) {
                        swal("Sửa thành công", "You clicked the button!", "success");
                        ;

                    } else {
                        swal("Sửa không thành công", "You clicked the button!", "warning");
                    }
                },
                error: function () {
                    swal("Sửa không thành công.", "You clicked the button!", "warning");
                }
            });

        });
    });

    $(document).ready(function () {
        var fileName = "uptoload.jpg";
        $('.submitOk').click(function () {
            // Lấy danh sách các tệp tin đã chọn
            var files = $(this).prop('files');

            // Kiểm tra xem đã có tệp tin được chọn hay chưa
            if (files.length > 0) {
                // Lấy tên của tệp tin đầu tiên
                fileName = files[0].name;
                // In ra tên của tệp tin
                $('#fileUpload').attr('src', URL.createObjectURL(files[0]));
            }
        });
        $('.add_post').click(function () {
            var img = fileName;
            console.log(img);
            var author = $('#author').val();
            var title = $('#title').val();
            var description = $('#description').val();
            var content = CKEDITOR.instances.content.getData();
            var meta_desc = $('#meta_desc').val();
            var meta_keyword = $('#meta_keyword').val();
            var statusValue = $('#status option:selected').val();
            console.log(statusValue);
            var url_Seo = $('#Url_Seo').val();
            console.log(author + title + description + content + meta_desc + meta_keyword + url_Seo);
            $.ajax({
                type: 'POST',
                url: '{{ route('post.add') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    author: author,
                    title: title,
                    description: description,
                    content1: content,
                    meta_desc: meta_desc,
                    meta_keyword: meta_keyword,
                    status: statusValue,
                    url_Seo: url_Seo,
                    img: img
                },
                success: function (response) {
                    if (response.success) {
                        swal("Thêm Thành công", "You clicked the button!", "success");
                        ;

                    } else {
                        swal("Thêm không thành công", "You clicked the button!", "warning");
                    }
                },
                error: function () {
                    swal("Thêm không thành công.", "You clicked the button!", "warning");
                }
            });

        });
    });

    $('#search_post').on('keyup', function () {
        $value = $(this).val();
        if ($value) {
            $('.alldata').hide();
            $('.searchdata').show();
        } else {
            $('.alldata').show();
            $('.searchdata').hide();
        }
        $.ajax(
            {
                type: 'get',
                url: '{{route("search.post")}}',
                data: {
                    'search': $value
                },
                success: function (data) {
                    console.log(data);
                    $('#Content').html(data);
                }
            }
        )
    });


</script>

</body>
</html>
