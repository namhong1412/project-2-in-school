<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Quản lý sân bóng</title>
    @include('components.head')
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
      data-color="bg-gradient-x-purple-blue" data-col="2-columns">

@include('components.navbar')
@include('components.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Quản lý sân bóng</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <!-- Table head options with primary background start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách khu vực</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <a href="/them-san-bong">
                                    <button class="btn btn-primary" type="submit">Thêm khu vực / cơ sở / sân bóng
                                    </button>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khu vực</th>
                                        <th>Tình trạng</th>
                                        <th>Tuỳ chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody id="khu-vuc">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options with primary background end -->
            <!-- Table head options with primary background start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách cơ sở</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên cơ sở</th>
                                        <th>Tình trạng</th>
                                        <th>Tuỳ chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody id="co-so">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options with primary background end -->
            <!-- Table head options with primary background start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách sân bóng</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sân bóng</th>
                                        <th>Loại sân</th>
                                        <th>Cơ sở</th>
                                        <th>Tình trạng</th>
                                        <th>Tuỳ chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody id="san-bong">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options with primary background end -->
        </div>
    </div>
</div>
<!-- END: Content-->

@include('components.footer')

<!-- BEGIN: Vendor JS-->
<script src="/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script src="/app-assets/js/scripts/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var khu_vuc = $("#khu-vuc");
        var co_so = $("#co-so");
        var san_bong = $("#san-bong");
        $.ajax({
            url: '/api/khu-vuc',
            type: 'GET',
            dataType: 'json'
        })
            .done(function (data) {
                var i = 0;
                for (a of data) {
                    i++;
                    var b = "Hoạt động";
                    var c = "Khoá";
                    if (a.status == 1) {
                        var b = "Khoá";
                        var c = "Mở khoá";
                    }
                    khu_vuc.append("<tr><th scope='row'>" + i + "</th><td>" + a.name + "</td><td>" + b + "</td><td><a href='/sua-san-bong/khu-vuc/"+a.id+"' class='btn btn-primary'>Chỉnh sửa </a> <a href='' class='btn btn-danger'> " + c + "</a></td></tr>")
                }
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })

        $.ajax({
            url: '/api/co-so',
            type: 'GET',
            dataType: 'json'
        })
            .done(function (data) {
                var i = 0;
                for (a of data) {
                    i++;
                    var b = "Hoạt động";
                    var c = "Khoá";
                    if (a.status == 1) {
                        var b = "Khoá";
                        var c = "Mở khoá";
                    }
                    co_so.append("<tr><th scope='row'>" + i + "</th><td>" + a.name + "</td><td>" + b + "</td><td><a href='/sua-san-bong/co-so/"+a.id+"' class='btn btn-primary'>Chỉnh sửa </a> <a href='' class='btn btn-danger'> " + c + "</a></td></tr>")
                }
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })

        $.ajax({
            url: '/api/san-bong',
            type: 'GET',
            dataType: 'json'
        })
            .done(function (data) {
                var i = 0;
                for (a of data) {
                    i++;
                    var b = "Hoạt động";
                    var c = "Khoá";
                    if (a.branch_s == 1 || a.pitch_s == 1) {
                        var b = "Khoá";
                        var c = "Mở khoá";
                    }
                    if (a.type_pitch_id == 0) {
                        loai_san = 'Sân 5';
                    } else if (a.type_pitch_id == 1) {
                        loai_san = 'Sân 7';
                    } else {
                        loai_san = 'Sân 11';
                    }
                    san_bong.append("<tr><th scope='row'>" + i + "</th><td>" + a.name + "</td><td>" + loai_san + "</td><td>" + a.branch + "</td><td>" + b + "</td><td><a href='/sua-san-bong/san-bong/"+a.id+"' class='btn btn-primary'>Chỉnh sửa </a> <a href='' class='btn btn-danger'> " + c + "</a></td></tr>")
                }
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })
    });
</script>
</body>
<!-- END: Body-->

</html>
