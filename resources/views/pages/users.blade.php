@extends('layouts.master')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List USER
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Login</a></li>
        <li><a href="#">Calender</a></li>
        <li class="active">Event</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Reminder</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="reminder"></div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div id="Index">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" onclick="Create()"><i
                                    class="fa fa-plus-circle"></i></button>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody id="data-example">
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                {{--Create--}}
                <div id="Create" class="">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form role="form" id="Form-Create">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputNama">NAMA</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputNama"
                                           placeholder="Nama">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputEmail">EMAIL</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail"
                                           placeholder="Email">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputPassword">PASSWORD</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                           placeholder="Password">
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button class="btn btn-default" onclick="Index()">Kembali</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="Edit" class="">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form role="form" id="Form-Edit">
                            <div class="box-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="exampleInputNama">NAMA</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputNama"
                                           placeholder="Nama">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputEmail">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail"
                                           placeholder="Email">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputPassword">PASSWORD</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                           placeholder="Password">
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button class="btn btn-default" onclick="Index()">Kembali</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--Modal--}}

{{--Detail Modal--}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><font face="Bernard MT"></font></h4>
            </div>
            <div class="modal-body">
                {{--<p>Some text in the modal.</p>--}}
                <div id="loader-wrapper">
                    <div id="loader"></div>
                </div>
                <table class="table table-striped">
                    <tbody id="modal-body">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<script src="{!! asset ('assets/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<script src="{!! asset ('assets/plugins/moment/moment.min.js') !!}"></script>
<script>
    $(document).ready(function () {


        var currentRequest = null;
        Index();
        cekevent();
        $("#Form-Create").submit(function (users) {
            users.preventDefault();
            var $form = $(this),
                    nama = $form.find("input[name='nama']").val(),
                    email = $form.find("input[name='email']").val(),
                    password = $form.find("input[name='password']").val();
            //                  $("#Form-Create").reset();
            var posting = $.post('/api/v1/users', {
                nama: nama,
                email: email,
                password: password
            });
            //Put the results in a div
            posting.done(function (data) {
//                    console.log(data);
                window.alert(data.result.message);
//                    getAjax();
                Index();
            });
            return false;
        });
        $("#Form-Edit").submit(function (users) {
            users.preventDefault();
            var $form = $(this),
                    id = $form.find("input[name='id']").val(),
                    nama = $form.find("input[name='nama']").val(),
                    email = $form.find("input[name='email']").val(),
                    password = $form.find("input[name='password']").val(),
                    currentRequest = $.ajax({
                        method: "PUT",
                        url: '/api/v1/users/' + id,
                        data: {
                            nama: nama,
                            email: email,
                            password: password,
                        },
                        beforeSend: function () {
                            if (currentRequest != null) {
                                currentRequest.abort();
                            }
                        },
                        success: function (data) {
                            window.alert(data.result.message);
                            Index();
                        },
                        error: function (data) {
                            window.alert(data.result.message);
                            Index();
                        }
                    });
        });
    });
    function Index() {
        $('#Create').hide();
        $('#Edit').hide();
        $('#Index').show();
        $("#data-example").children().remove();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        getAjax();
    }
    function Create() {
        $('#Edit').hide();
        $('#Index').hide();
        $('#Create').show();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
    }
    function getAjax() {
        $("#data-example").children().remove();
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/users", function (data) {
                var jumlah = data.data.length;
                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#data-example").append("" +
                            "<tr>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.email + "</td>" +
                            "<td>" +
//                                "<button type='button' class='btn btn-outline btn-primary' data-toggle='modal' data-target='#myModal'  " +
//                                "onclick='Detail(" + data.id + ")'>Detail</button> " +
                            "<button type='button' class='btn btn-info' " +
                            "onclick='Edit(\"" + data.id + "\")'>" +
                            "<i class='glyphicon glyphicon-edit'></i></button> " +
                            "<button type='button' class='btn btn-danger'  " +
                            "onclick='Hapus(\"" + data.id + "\")'> " +
                            "<i class='glyphicon glyphicon-trash'></i></button>" +
                            "</td>" +
                            "</tr>");
                })
            });
        }, 2200);
    }
    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#Index').hide();
        $.ajax({
                    method: "Get",
                    url: '/api/v1/users/' + id,
                    data: {}
                })
                .done(function (data) {
//                    var $form = $(this),
                    $("input[name='id']").val(data.id);
                    $("input[name='nama']").val(data.nama);
                    $("input[name='email']").val(data.email);
                    $("input[name='password']").val(data.password);
                    $('#Edit').show();
                });
    }
    function Detail(id) {
        $("#modal-body").children().remove();
        $.ajax({
            method: "GET",
            url: '/api/v1/users/' + id,
            data: {},
            beforeSend: function () {
                $('#loader-wrapper').show();
            },
            success: function (data) {
//                    $('#loader').hide();
                $("#loader-wrapper").hide();
                $("#modal-body").append(
                        "<tr><td> nama </td><td> : </td><td>" + data.nama + "</td></tr>" +
                        "<tr><td> email </td><td> : </td><td>" + data.email + "</td></tr>" +
                        "<tr><td> paswword </td><td> : </td><td>" + data.password+ "</td></tr>"
                )
                ;
            }
        });

    }
    function Hapus(id) {
        var result = confirm("Apakah Anda Yakin ingin Menghapus ?");
        if (result) {
            $.ajax({
                        method: "DELETE",
                        url: '/api/v1/users/' + id,
                        data: {}
                    })
                    .done(function (data) {
                        window.alert(data.result.message);
                        Index();
                    });
        }
    }

    function cekevent() {
        var h ;
        $.getJSON("/api/v1/event", function (data) {
            var jumlah = data.data.length;
            $.each(data.data.slice(0, jumlah), function (i, data) {
                var today = moment().format("YYYY-MM-DD");
                var tgl_3 = moment(data.start).subtract(3, 'days').format("YYYY-MM-DD");
                var tgl_2 = moment(data.start).subtract(2, 'days').format("YYYY-MM-DD");
                var tgl_1 = moment(data.start).subtract(1, 'days').format("YYYY-MM-DD");

                if (moment().format("h") == 3 || moment().format("h") == 6 || moment().format("h") == 9 || moment().format("h") == 12) {
                    if (today == tgl_3) {
                        $('#reminder').append("<div class='alert alert-info alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> " + data.title + "</h4>Kurang 3 hari lagi.</div>");
                    }
                    if (today == tgl_2) {
                        $('#reminder').append("<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> " + data.title + "</h4>Kurang 2 hari lagi.</div>");
                    }
                    if (today == tgl_1) {
                        $('#reminder').append("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> " + data.title + "</h4>Kurang 1 hari lagi.</div>");
                    }

                    h =true;
                }

            })
            if (h){
                var audioElement = document.createElement('audio');
                audioElement.setAttribute('src','assets/1.mp3');
                audioElement.setAttribute('autoplay','autoplay');
                audioElement.Play();
                audioElement.play();
            }
        });
        setTimeout(function () {
            $('reminder').children().remove();
        }, 1000);
    }
</script>
@endsection



