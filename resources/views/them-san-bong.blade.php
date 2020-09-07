<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Thêm sân bóng</title>
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
                @if(isset($area_id) || isset($branch_id) || isset($pitch_id))
                    @if(isset($area_id))
                <h3 class="content-header-title">Sửa khu vực</h3>
                    @elseif(isset($branch_id))
                <h3 class="content-header-title">Sửa cơ sở</h3>
                    @elseif(isset($pitch_id))
                <h3 class="content-header-title">Sửa sân bóng</h3>
                    @endif
                @else
                <h3 class="content-header-title">Thêm sân bóng</h3>
                @endif
            </div>
        </div>
        <div class="content-body">
        @if(isset($area_id) || isset($branch_id) || isset($pitch_id))
            @if(isset($area_id))
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Sửa khu vực</h4>
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
                                                <i class="ft-flag"></i> Thông tin khu vực</h4>
                                            <div class="form-group">
                                                <label for="companyName">Tên khu vực</label>
                                                <input type="text" id="name-khu-vuc" class="form-control"
                                                       placeholder="Tên khu vực">
                                            </div>
                                            <a href="/quan-ly-san-bong">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="update_khu_vuc" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Lưu
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
            @elseif(isset($branch_id))
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Sửa cơ sở</h4>
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
                                                <i class="ft-flag"></i> Thông tin cơ sở</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyName">Tên cơ sở</label>
                                                        <input type="text" id="name-co-so" class="form-control"
                                                               placeholder="Tên cơ sở">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="khu-vuc-hoat-dong">Khu vực</label>
                                                        <select id="khu-vuc-hoat-dong" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/quan-ly-san-bong">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="update_co_so" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Lưu
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
            @elseif(isset($pitch_id))
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Sửa sân bóng</h4>
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
                                            <i class="ft-flag"></i> Thông tin sân bóng</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="companyName">Tên sân bóng</label>
                                                        <input type="text" id="name-san-bong" class="form-control"
                                                               placeholder="Tên sân bóng">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="co-so-hoat-dong">Cơ sở</label>
                                                        <select id="co-so-hoat-dong" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="loai-san">Loại sân</label>
                                                        <select id="loai-san" class="form-control">
                                                            <option value="0" selected="">Sân 5</option>
                                                            <option value="1">Sân 7</option>
                                                            <option value="2">Sân 11</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="quan-ly-san-bong">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="update_san_bong" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Lưu
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
            @endif
        @else
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Thêm sân bóng</h4>
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
                                            <i class="ft-flag"></i> Thông tin sân bóng</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="companyName">Tên sân bóng</label>
                                                        <input type="text" id="name-san-bong" class="form-control"
                                                               placeholder="Tên sân bóng">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="co-so-hoat-dong">Cơ sở</label>
                                                        <select id="co-so-hoat-dong" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="loai-san">Loại sân</label>
                                                        <select id="loai-san" class="form-control">
                                                            <option value="0" selected="">Sân 5</option>
                                                            <option value="1">Sân 7</option>
                                                            <option value="2">Sân 11</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="quan-ly-san-bong">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="them-san-bong" class="btn btn-primary">
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
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Thêm khu vực</h4>
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
                                                <i class="ft-flag"></i> Thông tin khu vực</h4>
                                            <div class="form-group">
                                                <label for="companyName">Tên khu vực</label>
                                                <input type="text" id="name-khu-vuc" class="form-control"
                                                       placeholder="Tên khu vực">
                                            </div>
                                            <a href="quan-ly-san-bong">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="them-khu-vuc" class="btn btn-primary">
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
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Thêm cơ sở</h4>
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
                                                <i class="ft-flag"></i> Thông tin cơ sở</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="companyName">Tên cơ sở</label>
                                                        <input type="text" id="name-co-so" class="form-control"
                                                               placeholder="Tên cơ sở">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="khu-vuc-hoat-dong">Khu vực</label>
                                                        <select id="khu-vuc-hoat-dong" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/quan-ly-san-bong">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="them-co-so" class="btn btn-primary">
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
        @endif
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
    $(document).ready(function () {
        $('#them-khu-vuc').click(() => {
            var name = $("#name-khu-vuc");
            $.ajax({
                url: '/api/khu-vuc',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name.val(),
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                    name.val('');
                    get_khu_vuc();
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });

        $('#them-co-so').click(() => {
            var name = $("#name-co-so");
            var area_id = $("#khu-vuc-hoat-dong").find('option:selected').val();
            $.ajax({
                url: '/api/co-so',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name.val(),
                    area_id: area_id
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                    name.val('');
                    get_co_so();
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });

        $('#them-san-bong').click(() => {
            var name = $("#name-san-bong");
            var branch_id = $("#co-so-hoat-dong").find('option:selected').val();
            var type_pitch_id = $("#loai-san").find('option:selected').val();
            $.ajax({
                url: '/api/san-bong',
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name.val(),
                    branch_id: branch_id,
                    type_pitch_id: type_pitch_id
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                    name.val('');
                    get_co_so();
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });

        function get_khu_vuc() {
            var area = $('#khu-vuc-hoat-dong');
            $.ajax({
                url: '/api/khu-vuc-hoat-dong',
                type: 'GET',
                dataType: 'json',
            })
                .done(function (data) {
                    area.html('');
                    var i = 0;
                    for (a of data) {
                        i++;
                        if (i == 1) {
                            area.append("<option value=" + a.id + " selected=''>" + a.name + "</option>");
                        } else {
                            area.append("<option value=" + a.id + ">" + a.name + "</option>");
                        }
                    }
                })
                .fail(function (error) {
                    console.error(error);
                })
        }

        function get_co_so() {
            var branch = $('#co-so-hoat-dong');
            $.ajax({
                url: '/api/co-so-hoat-dong',
                type: 'GET',
                dataType: 'json',
            })
                .done(function (data) {
                    branch.html('');
                    var i = 0;
                    for (a of data) {
                        i++;
                        if (i == 1) {
                            branch.append("<option value=" + a.id + " selected=''>" + a.name + "</option>");
                        } else {
                            branch.append("<option value=" + a.id + ">" + a.name + "</option>");
                        }
                    }
                })
                .fail(function (error) {
                    console.error(error);
                })
        }

        function get_khu_vuc_detail(area_id) {
            $.ajax({
                url: '/api/khu-vuc/'+area_id,
                type: 'GET',
                dataType: 'json',
            })
                .done(function (data) {
                    var khu_vuc = $('#name-khu-vuc');
                    khu_vuc.val(data[0].name);
                })
                .fail(function (error) {
                    console.error(error);
                })
        }

        function get_co_so_detail(branch_id) {
            $.ajax({
                url: '/api/co-so/'+branch_id,
                type: 'GET',
                dataType: 'json',
            })
                .done(function (data) {
                    var co_so = $('#name-co-so');
                    co_so.val(data[0].name);
                    $('#khu-vuc-hoat-dong option[value="' + data[0].area_id + '"]').prop("selected", true);
                })
                .fail(function (error) {
                    console.error(error);
                })
        }

        function get_san_bong_detail(pitch_id) {
            $.ajax({
                url: '/api/san-bong/'+pitch_id,
                type: 'GET',
                dataType: 'json',
            })
                .done(function (data) {
                    var san_bong = $('#name-san-bong');
                    san_bong.val(data[0].name);
                    $('#co-so-hoat-dong option[value="' + data[0].branch_id + '"]').prop("selected", true);
                    $('#loai-san option[value="' + data[0].type_pitch_id + '"]').prop("selected", true);
                })
                .fail(function (error) {
                    console.error(error);
                })
        }

        $('#update_khu_vuc').click(() => {
            var area = $('#name-khu-vuc');
            $.ajax({
                url: '/api/khu-vuc/{{ $area_id ?? '' }}',
                type: 'PUT',
                dataType: 'json',
                data: {
                    name: area.val()
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });

        $('#update_co_so').click(() => {
            var name = $("#name-co-so");
            var area_id = $("#khu-vuc-hoat-dong").find('option:selected').val();
            $.ajax({
                url: '/api/co-so/{{ $branch_id ?? '' }}',
                type: 'PUT',
                dataType: 'json',
                data: {
                    name: name.val(),
                    area_id: area_id,
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });

        $('#update_san_bong').click(() => {
            var name = $("#name-san-bong");
            var branch_id = $("#co-so-hoat-dong").find('option:selected').val();
            var type_pitch_id = $("#loai-san").find('option:selected').val();
            $.ajax({
                url: '/api/san-bong/{{ $pitch_id ?? '' }}',
                type: 'PUT',
                dataType: 'json',
                data: {
                    name: name.val(),
                    branch_id: branch_id,
                    type_pitch_id: type_pitch_id
                }
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        });

        @if(isset($area_id))
            get_khu_vuc_detail({{ $area_id }});

        @elseif(isset($branch_id))
            get_khu_vuc();
            get_co_so_detail({{$branch_id}});
        @elseif(isset($pitch_id))
            get_co_so();
            get_san_bong_detail({{$pitch_id}})
        @else
            get_khu_vuc();
            get_co_so();
        @endif
    });
</script>
</body>
<!-- END: Body-->

</html>
