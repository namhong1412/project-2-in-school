<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Quản lý nhân viên</title>
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
                <h3 class="content-header-title">Quản lý nhân viên</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <!-- Table head options with primary background start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách quản lý</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <a href="them-nhan-vien">
                                    <button class="btn btn-primary" type="submit">Thêm quản lý / nhân viên</button>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Số điện thoại</th>
                                        <th>Chức vụ</th>
                                        <th>Tuỳ chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody id="admin">
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
<!-- BEGIN: Page JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<script src="/app-assets/js/scripts/extensions/sweet-alerts.min.js" type="text/javascript"></script>
<!-- END: Page JS-->
<script src="/app-assets/js/scripts/jquery.min.js"></script>
<script>
    var admin = $("#admin");
    function get_admin(){
        $.ajax({
            url: '/api/nhan-vien',
            type: 'GET',
            dataType: 'json'
        })
            .done(function (data) {
                var i = 0;
                admin.html('');
                for (a of data) {
                    i++;
                    var b = "Quản lý";
                    var lock = "<span class='btn btn-danger' onclick='lock("+a.id+")'>Khoá</span>"
                    if (a.kind == 1) {
                        var b = "Nhân viên";
                    } else if (a.kind == 2) {
                        var b = "Bị khoá";
                        var lock = "<span class='btn btn-danger' onclick='unlock("+a.id+")'>Mở khoá</span>";
                    }
                    admin.append("<tr><th scope='row'>" + i + "</th><td>" + a.username + "</td><td>" + a.phone_number + "</td><td>" + b + "</td><td><a href='sua-nhan-vien/"+a.id+"' class='btn btn-primary'>Chỉnh sửa</a> "+lock+"</td></tr>")
                }
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })
    }
    get_admin();
    function lock(id){
        $.ajax({
            url: '/api/khoa/',
            type: 'POST',
            dataType: 'json',
            data: {
                id : id
            }
        })
            .done(function (data) {
                swal("Thành công", data.message, "success");
                get_admin();
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })
    }

    function unlock(id){
        $.ajax({
            url: '/api/mo-khoa/',
            type: 'POST',
            dataType: 'json',
            data: {
                id : id
            }
        })
            .done(function (data) {
                swal("Thành công", data.message, "success");
                get_admin();
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })
    }
</script>
</body>
<!-- END: Body-->

</html>
