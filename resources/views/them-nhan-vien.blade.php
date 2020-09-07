<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Thêm nhân viên {{ $admin_id ?? '' }}</title>
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
                <h3 class="content-header-title">Thêm nhân viên</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Thêm nhân viên</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse">
                                                <i class="ft-minus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="reload">
                                                <i class="ft-rotate-cw"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="expand">
                                                <i class="ft-maximize"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-action="close">
                                                <i class="ft-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form">
                                        <div class="form-body">
                                            <h4 class="form-section">
                                                <i class="ft-flag"></i> Thông tin đăng nhập nhân viên</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyName">Tên đăng nhập</label>
                                                        @if(isset($admin_id))
                                                            <input type="text" id="username" class="form-control"
                                                               placeholder="Tên đăng nhập" disabled="">
                                                        @else
                                                            <input type="text" id="username" class="form-control"
                                                               placeholder="Tên đăng nhập">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyName">Mật khẩu</label>
                                                        @if(isset($admin_id))
                                                            <input type="password" id="password" class="form-control"
                                                               placeholder="Mật khẩu">
                                                        @else
                                                            <input type="password" id="password" class="form-control"
                                                               placeholder="Mật khẩu">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyName">Số điện thoại</label>
                                                        <input type="text" id="phone_number" class="form-control"
                                                               placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kind">Chức vụ</label>
                                                        <select id="kind" class="form-control">
                                                            <option value="1" selected="">Nhân viên</option>
                                                            <option value="0">Quản lý</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="/quan-ly-nhan-vien">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Thêm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
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
<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<!-- BEGIN: Page JS-->
<script src="/app-assets/js/scripts/extensions/sweet-alerts.min.js" type="text/javascript"></script>
<!-- END: Page JS-->
<!-- END: Page JS-->
<script src="/app-assets/js/scripts/jquery.min.js"></script>
<script>
    @if(isset($admin_id))

    $(document).ready(function () {
        var username = $("#username");
        var password = $("#password");
        var phone_number = $("#phone_number");
        $.ajax({
            url: '/api/admin/' +{{ $admin_id }},
            type: 'GET',
            dataType: 'json',
        })
        .done(function (data) {
            var info = data[0];
            username.val(info.username);
            password.val(info.password);
            phone_number.val(info.phone_number);
            $('#kind option[value="' + info.kind + '"]').prop("selected", true);
        })
        .fail(function (error) {
            swal("Thất bại", error.responseJSON.message, "error");
        })

        $('#submit').click(() => {
            var username = $("#username");
            var password = $("#password");
            var phone_number = $("#phone_number");
            var kind = $("#kind").find('option:selected').val();
            $.ajax({
                url: '/api/admin/' +{{ $admin_id }},
                type: 'PUT',
                dataType: 'json',
                data: {
                    username: username.val(),
                    password: password.val(),
                    phone_number: phone_number.val(),
                    kind: kind,
                }
            })
            .done(function (data) {
                swal("Thành công", data.message, "success");
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })
        });
    });

    @else
    
    $(document).ready(function () {
        $('#submit').click(() => {
            var username = $("#username");
            var password = $("#password");
            var phone_number = $("#phone_number");
            var kind = $("#kind").find('option:selected').val();
            $.ajax({
                url: '/api/admin',
                type: 'POST',
                dataType: 'json',
                data: {
                    username: username.val(),
                    password: password.val(),
                    phone_number: phone_number.val(),
                    kind: kind,
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                    username.val('');
                    password.val('');
                    phone_number.val('');
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });
    });
    @endif

</script>
</body>
<!-- END: Body-->

</html>
