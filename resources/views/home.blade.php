<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <title>Bảng điều khiển</title>
    @include('components.head')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
      data-color="bg-gradient-x-purple-blue" data-col="2-columns">
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
@include('components.navbar')
@include('components.sidebar')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Bảng quản trị</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Emails Products & Avg Deals -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title float-left">Thống kê - Hôm nay ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer text-center p-1">
                                <div class="row">
                                    <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Người đặt</p>
                                        <p class="font-medium-5 text-bold-400" id="all_set_pitch"></p>
                                    </div>
                                    <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Đã cọc</p>
                                        <p class="font-medium-5 text-bold-400" id="deposit_number"></p>
                                    </div>
                                    <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Đã T.toán</p>
                                        <p class="font-medium-5 text-bold-400" id="paid"></p>
                                    </div>
                                    <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Chưa T.toán</p>
                                        <p class="font-medium-5 text-bold-400" id="non-paid"></p>
                                    </div>
                                    <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Thu thêm</p>
                                        <p class="font-medium-5 text-bold-400" id="surcharge_money"></p>
                                    </div>
                                    <div class="col-md-2 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="blue-grey lighten-2 mb-0">Doanh thu</p>
                                        <p class="font-medium-5 text-bold-400" id="revenue"></p>
                                    </div>
                                </div>
                                <hr>
                                <span class="text-muted"><a href="/" class="danger darken-2">ManaKaido</a> Thống kê</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Emails Products & Avg Deals -->
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lịch sử đặt sân</h4>
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
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Khách hàng</th>
                                                    <th>Thuê từ</th>
                                                    <th>Thuê đến</th>
                                                    <th>Sân</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Tuỳ chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody id="history"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Khách hàng</th>
                                                    <th>Thuê từ</th>
                                                    <th>Thuê đến</th>
                                                    <th>Sân</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Tình trạng</th>
                                                    <th>Tuỳ chọn</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
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

<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<script src="/app-assets/js/scripts/extensions/sweet-alerts.min.js" type="text/javascript"></script>
<!-- END: Page JS-->
<script src="/app-assets/js/scripts/jquery.min.js"></script>
<script>
        function thong_ke() {
            $.ajax({
                url: '/api/thong-ke',
                type: 'GET',
                dataType: 'json'
            })
                .done(function (data) {
                    var all_set_pitch = $('#all_set_pitch'),
                    deposit_number = $('#deposit_number'),
                    paid = $('#paid'),
                    non_paid = $('#non-paid'),
                    surcharge_money = $('#surcharge_money'),
                    revenue = $('#revenue');

                    all_set_pitch.html(data.all_set_pitch);
                    revenue_money  = data.per_hour_money + data.surcharge_money;
                    revenue.html("₫"+ revenue_money +"k");
                    surcharge_money.html("₫"+data.surcharge_money+"k");
                    paid.html(data.paid);
                    non_paid.html(data.all_set_pitch - data.paid);
                    deposit_number.html(data.deposit_number);
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        }

        function lich_su() {
            $.ajax({
                url: '/api/lich-su',
                type: 'GET',
                dataType: 'json'
            })
                .done(function (data) {
                    var history = $("#history");
                    history.html('');
                    for (a of data) {
                        if (a.type_pitch_id == 0) {
                            var type_pitch_id = '5';
                        } else if (a.type_pitch_id == 1) {
                            var type_pitch_id = '7';
                        } else {
                            var type_pitch_id = '11';
                        }
                        history.append("<tr><td>"+a.name+"</td><td>"+a.time_from+"</td><td>"+a.time_to+"</td><td>"+a.pitch+" - "+type_pitch_id+"</td><td>₫"+a.revenue+"k</td><td>"+a.kind+"</td><td><a href='/dat-san/"+a.id+"'><i class='ft-eye'></i></a>  <span class='remove-set-pitch' onclick='xoa_dat_san("+a.id+")' ><i class='ft-trash-2'></i></span></td></tr>");

                    }
                    $(".zero-configuration").DataTable({
                        order: [
                            [1, "desc"]
                        ]
                    });
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        }   

        function xoa_dat_san(id) {
            $.ajax({
                url: '/api/xoa-dat-san/'+id,
                type: 'DELETE',
                dataType: 'json',
            })
                .done(function (data) {
                    swal("Thành công", data.message, "success");
                    $(".zero-configuration").DataTable().destroy();
                    lich_su();
                    thong_ke();
                })
                .fail(function (error) {
                    swal("Thất bại", error.responseJSON.message, "error");
                })
        }
        lich_su();
        thong_ke();
</script>
<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
</body>
<!-- END: Body-->
</html>
