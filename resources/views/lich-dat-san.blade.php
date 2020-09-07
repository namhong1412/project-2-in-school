<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Hong Nguyen Nam">
    <title>Lịch đặt sân</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://themeselection.com/demo/chameleon-admin-template/app-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-switch.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/calendars/fullcalendar.min.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
@include('components.navbar')
@include('components.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Lịch đặt sân</h3>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lịch sử đặt sân - Hôm nay ngày {{ date('d') }} tháng {{ date('m') }} năm {{ date('Y') }}</h4>
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
                                                    <th>Thu thêm</th>
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
                                                    <th>Thu thêm</th>
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
            <!-- Full calendar basic example section start -->
            <section id="basic-examples">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div id='fc-default'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Full calendar basic example section end -->
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
<script src="/app-assets/vendors/js/extensions/moment.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/extensions/fullcalendar.min.js" type="text/javascript"></script>
<script src="/app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<script src="/app-assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
<script src="/app-assets/js/scripts/extensions/sweet-alerts.min.js" type="text/javascript"></script>
<!-- END: Page JS-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="/app-assets/js/scripts/extensions/fullcalendar.min.js" type="text/javascript"></script>
<!-- END: Page JS-->

<script>
    function get_dat_san_on() {
        $.ajax({
            url: '/api/dat-san',
            type: 'GET',
            dataType: 'json'
        })
        .done(function (data) {
            var obj = [];
            for (a of data) {
                obj.push({"id":a.id,
                    "title": a.title,
                    "start": a.start,
                    "end": a.end,
                    "url": '/dat-san/'+a.id
                })
            }
            calendar(obj);
        })
        .fail(function (error) {
            console.error(error);
        })
    }

    function get_lich_hom_nay() {
        $.ajax({
            url: '/api/hom-nay',
            type: 'GET',
            dataType: 'json'
        })
            .done(function (data) {
                var history = $("#history");
                history.html('');
                for (a of data) {
                        if (a.type_pitch_id == 0) {
                            var type_pitch_id = 'Sân 5';
                        } else if (a.type_pitch_id == 1) {
                            var type_pitch_id = 'Sân 7';
                        } else {
                            var type_pitch_id = 'Sân 11';
                        }
                        history.append("<tr><td>"+a.name+"</td><td>"+a.time_from+"</td><td>"+a.time_to+"</td><td>"+a.pitch+" - "+type_pitch_id+"</td><td>₫"+a.revenue+"k</td><td>"+a.kind+"</td><td><a href='/dat-san/"+a.id+"'><i class='ft-eye'></i></a>  <span onclick='xoa_dat_san("+a.id+")'><i class='ft-trash-2'></i></span></td></tr>");

                    }
                table = $(".zero-configuration").DataTable({
                    order: [
                        [1, "desc"]
                    ]
                });
            })
            .fail(function (error) {
                swal("Thất bại", error.responseJSON.message, "error");
            })
    }

    function calendar(data) {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        if(dd<10) 
        {
            dd='0'+dd;
        } 
        if(mm<10) 
        {
            mm='0'+mm;
        } 
        today = yyyy+'-'+mm+'-'+dd;
        $("#fc-default").fullCalendar({
            defaultDate: today,
            editable: !0,
            eventLimit: !0,
            events: data
        })
    }

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

    function xoa_dat_san(id) {
        $.ajax({
            url: '/api/xoa-dat-san/'+id,
            type: 'DELETE',
            dataType: 'json',
        })
            .done(function (data) {
                swal("Thành công", data.message, "success");
                $(".zero-configuration").DataTable().destroy();
                get_dat_san_on();
                get_lich_hom_nay();
            })
            .fail(function (error) {
                console.error(error);
            })
    }

    get_dat_san_on();
    get_lich_hom_nay();
</script>
<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
</body>
<!-- END: Body-->

</html>
