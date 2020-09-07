<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Đặt sân {{ $set_pitch_id ?? '' }}</title>
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
                <h3 class="content-header-title">Đặt sân</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-icons">Thông tin đặt sân</h4>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Tên khách hàng</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="name" class="form-control"
                                                                   placeholder="Tên khách hàng">
                                                            <div class="form-control-position">
                                                                <i class="ft-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="san-bong-hoat-dong">Sân</label>
                                                        <select id="san-bong-hoat-dong" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>                                              
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Ngày</label>
                                                <div class="position-relative has-icon-left">
                                                    <input type="date" id="time" class="form-control">
                                                    <div class="form-control-position">
                                                        <i class="ft-message-square"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="time_from">Thời gian bắt đầu</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="time" id="time_from" class="form-control">
                                                            <div class="form-control-position">
                                                                <i class="ft-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="time_to">Thời gian kết thúc</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="time" id="time_to" class="form-control">
                                                            <div class="form-control-position">
                                                                <i class="ft-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tiền 1 giờ</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">₫</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Tiền 1 giờ"
                                                                   aria-label="Amount (to the nearest dollar)"
                                                                   id="per_hour">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.000</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tiền cọc trước</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">₫</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Phí thu khác"
                                                                   aria-label="Amount (to the nearest dollar)"
                                                                   id="deposit" value="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.000</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phí thu khác</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">₫</span>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Phí thu khác"
                                                                   aria-label="Amount (to the nearest dollar)"
                                                                   id="surcharge" value="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.000</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kind">Tình trạng</label>
                                                        <select id="kind" class="form-control">
                                                            <option value="0" selected=''>Chưa thanh toán</option>
                                                            <option value="1">Đã thanh toán</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="note">Ghi chú</label>
                                                <textarea id="note" rows="5" class="form-control" name="comments"
                                                          placeholder="Ghi chú" data-toggle="tooltip"
                                                          data-trigger="hover" data-placement="top"
                                                          data-title="Comments" data-original-title=""
                                                          title=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <a href="/lich-dat-san">
                                                <button type="button" class="btn btn-danger mr-1">
                                                    <i class="ft-x"></i> Thoát
                                                </button>
                                            </a>
                                            <button type="button" id="submit" class="btn btn-primary mr-1">
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
        @if (isset($set_pitch_id))

            function addZero(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

            function get_info() {
                var id = {{ $set_pitch_id }};
                $.ajax({
                    url: '/api/dat-san/' + id, 
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function (data) {
                    var name = $("#name");
                    var time = $("#time");
                    var time_from = $("#time_from");
                    var time_to = $("#time_to");
                    var per_hour = $("#per_hour");
                    var surcharge = $("#surcharge");
                    var deposit = $("#deposit");
                    var note = $("#note");
                    var info = data[0];
                    var date = new Date(info.time_from);
                    var date_to = new Date(info.time_to);

                    var dd = date.getDate();
                    var mm = date.getMonth() + 1;
                    var yyyy = date.getFullYear();

                    var hour_from = addZero(date.getHours());
                    var minute_from = addZero(date.getMinutes());
                    var hour_to = addZero(date_to.getHours());
                    var minute_to = addZero(date_to.getMinutes());

                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    date = yyyy + '-' + mm + '-' + dd;
                    $('#time').val(date);

                    name.val(info.name);
                    time_from.val(hour_from + ':' + minute_from);
                    time_to.val(hour_to + ':' + minute_to);
                    per_hour.val(info.per_hour);
                    surcharge.val(info.surcharge);
                    deposit.val(info.deposit);
                    note.val(info.note);
                    $('#kind option[value="' + info.kind + '"]').prop("selected", true);
                    $('#san-bong-hoat-dong option[value="' + info.type_pitch_id + '"]').prop("selected", true);
                    $('#loai-san option[value="' + info.type_pitch_id + '"]').prop("selected", true);
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
            }
            
            // Cập nhật
            $('#submit').click(() => {
                var name = $("#name");
                var pitch_id = $("#san-bong-hoat-dong").find('option:selected').val();
                var type_pitch_id = $("#loai-san").find('option:selected').val();
                var time = $("#time");
                var time_from = $("#time_from");
                var time_to = $("#time_to");
                var per_hour = $("#per_hour");
                var surcharge = $("#surcharge");
                var deposit = $("#deposit");
                var kind = $("#kind").find('option:selected').val();
                var note = $("#note");
                var time_from_c = time.val() + ' ' + time_from.val() + ':00';
                var time_to_c = time.val() + ' ' + time_to.val() + ':00';
                var id = {{ $set_pitch_id }};
                $.ajax({
                        url: '/api/dat-san/' + id,
                        type: 'PUT',
                        dataType: 'json',
                        data: {
                            name: name.val(),
                            pitch_id: pitch_id,
                            type_pitch_id: type_pitch_id,
                            time_from: time_from_c,
                            time_to: time_to_c,
                            per_hour: per_hour.val(),
                            surcharge: surcharge.val(),
                            deposit: deposit.val(),
                            kind: kind,
                            note: note.val()
                        }
                    })
                    .done(function(data) {
                        swal("Thành công", data.message, "success");
                    })
                    .fail(function(error) {
                        swal("Thất bại", error.responseJSON.message, "error");
                    })
            });
            get_info();
        @else

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            today = yyyy + '-' + mm + '-' + dd;
            $('#time').val(today);
            $('#submit').click(() => {
                var name = $("#name");
                var pitch_id = $("#san-bong-hoat-dong").find('option:selected').val();
                var type_pitch_id = $("#loai-san").find('option:selected').val();
                var time = $("#time");
                var time_from = $("#time_from");
                var time_to = $("#time_to");
                var per_hour = $("#per_hour");
                var surcharge = $("#surcharge");
                var deposit = $("#deposit");
                var kind = $("#kind").find('option:selected').val();
                var note = $("#note");
                var time_from_c = time.val() + ' ' + time_from.val() + ':00';
                var time_to_c = time.val() + ' ' + time_to.val() + ':00';
                $.ajax({
                    url: '/api/dat-san',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        pitch_id: pitch_id,
                        type_pitch_id: type_pitch_id,
                        time_from: time_from_c,
                        time_to: time_to_c,
                        per_hour: per_hour.val(),
                        surcharge: surcharge.val(),
                        deposit: deposit.val(),
                        kind: kind,
                        note: note.val()
                    }
                })
                    .done(function (data) {
                        swal("Thành công", data.message, "success");
                        name.val('');
                        time_from.val('');
                        time_to.val('');
                        per_hour.val('');
                        surcharge.val('0');
                        deposit.val('0');
                        note.val('');
                    })
                    .fail(function (error) {
                        swal("Thất bại", error.responseJSON.message, "error");
                    })
            });

        @endif

            function get_san_bong() {
                var branch = $('#san-bong-hoat-dong');
                $.ajax({
                    url: '/api/san-bong-hoat-dong',
                    type: 'GET',
                    dataType: 'json',
                })
                    .done(function (data) {
                        branch.html('');
                        var i = 0;
                        for (a of data) {
                            i++;
                            if (a.type_pitch_id == 0) {
                                loai_san = 'Sân 5';
                            } else if (a.type_pitch_id == 1) {
                                loai_san = 'Sân 7';
                            } else {
                                loai_san = 'Sân 11';
                            }
                            if (i == 1) {
                                branch.append("<option value=" + a.id + " selected=''>" + a.name + " - " + loai_san + "</option>");
                            } else {
                                branch.append("<option value=" + a.id + ">" + a.name + " - " + loai_san + "</option>");
                            }
                        }
                    })
                    .fail(function (error) {
                        console.error(error);
                    })
            }
            get_san_bong()
</script>
</body>
<!-- END: Body-->

</html>
