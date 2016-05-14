@extends('layouts.master')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List EVENT
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
    <!-- /.box -->
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
                                        <th>TITLE</th>
                                        <th>START</th>
                                        <th>END</th>
                                        <th>CONTENT</th>
                                        <th>Status</th>
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
                                    <label for="exampleInputTitle">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputTitle"
                                           placeholder="Title">
                                </div>
                                <div class="form-group date">
                                    <label>START</label>
                                    <input type="text" name="start" class="form-control" id="datepicker"
                                           placeholder="Start">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputEnd">END</label>
                                    <input type="text" name="end" class="form-control" id="datepickers"
                                           placeholder="End">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUrl">URL</label>
                                    <input type="text" name="url" class="form-control" id="exampleInputUrl"
                                           placeholder="Url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputContent">CONTENT</label>
                                    <select md-select-label name="content" class="form-control" ng-model="input.content"
                                            required>
                                        <option value="" disabled selected>Pilih Content</option>
                                        <option value="1">Guru</option>
                                        <option value="2">Wali Murid</option>
                                        <option value="2">Siswa</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputIs_status">STATUS</label>
                                <select md-select-label name="status" class="form-control" ng-model="input.status"
                                        required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="1">Biasa</option>
                                    <option value="2">Penting</option>
                                    <option value="3">Segera</option>
                                    <option value="4">Sangat Segera</option>
                                    <option value="5">Rahasia</option>
                                    <option value="6">Sangat Rahasia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputIs_remember">REMEMBER</label>
                                <input type="text" name="is_remember" class="form-control"
                                       id="exampleInputIs_remember"
                                       placeholder="Is_remember">
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button class="btn btn-default" onclick="Index()">Kembali</button>
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
                                    <label for="exampleInputTitle">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputTitle"
                                           placeholder="Title">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputStart">START</label>
                                    <input type="text" name="start" class="form-control" id="datepicker1"
                                           placeholder="Start">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputEnd">END</label>
                                    <input type="text" name="end" class="form-control" id="datepicker2"
                                           placeholder="End">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUrl">URL</label>
                                    <input type="text" name="url" class="form-control" id="exampleInputUrl"
                                           placeholder="Url">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputContent">CONTENT</label>
                                    <textarea name="content" class="form-control"
                                              placeholder="Content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIs_status">STATUS</label>
                                    <select md-select-label name="status" class="form-control" ng-model="input.status"
                                            required>
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="1">Biasa</option>
                                        <option value="2">Penting</option>
                                        <option value="3">Segera</option>
                                        <option value="4">Sangat Segera</option>
                                        <option value="5">Rahasia</option>
                                        <option value="6">Sangat Rahasia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIs_remember">REMEMBER</label>
                                    <input type="text" name="is_remember" class="form-control"
                                           id="exampleInputIs_remember"
                                           placeholder="Is_remember">
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
        $("#Form-Create").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                    title = $form.find("input[name='title']").val(),
                    start = $form.find("input[name='start']").val(),
                    end = $form.find("input[name='end']").val(),
            //            background_color = $form.find("input[name='background_color']").val(),
            //            border_color = $form.find("input[name='border_color']").val(),
                    url = $form.find("input[name='url']").val(),
                    content = $form.find("select[name='content']").val(),
                    status = $form.find("select[name='status']").val(),
                    sifat = $form.find("input[name='sifat']").val(),
                    is_remember = $form.find("input[name='is_remember']").val();
//                $("#Form-Create").reset();
            var posting = $.post('/api/v1/event', {
                title: title,
                start: start,
                end: end,
                content: content,
                url: url,
                status: status,
                sifat: sifat,
                is_remember: is_remember,
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
        $("#Form-Edit").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                    id = $form.find("input[name='id']").val(),
                    title = $form.find("input[name='title']").val(),
                    start = $form.find("input[name='start']").val(),
                    end = $form.find("input[name='end']").val(),
            //      background_color = $form.find("input[name='background_color']").val(),
            //  border_color = $form.find("input[name='border_color']").val(),
                    url = $form.find("input[name='url']").val(),
                    content = $form.find("textarea[name='content']").val(),
                    status = $form.find("input[name='status']").val(),
                    sifat = $form.find("input[name='sifat']").val(),
                    is_remember = $form.find("input[name='is_remember']").val(),
                    currentRequest = $.ajax({
                        method: "PUT",
                        url: '/api/v1/event/' + id,
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            //            background_color: background_color,
                            //             border_color: border_color,
                            url: url,
                            content: content,
                            status: status,
                            sifat: sifat,
                            is_remember: is_remember,
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
//        document.getElementById("Form-Edit").reset();
        getAjax();
    }
    function Create() {
        $('#Edit').hide();
        $('#Index').hide();
        $('#Create').show();
        //Date picker
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#datepickers').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
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
            $.getJSON("/api/v1/event", function (data) {
                var jumlah = data.data.length;
                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#data-example").append("" +
                            "<tr>" +
                            "<td>" + data.title + "</td>" +
                            "<td>" + data.start + "</td>" +
                            "<td>" + data.end + "</td>" +
                            "<td>" + data.content + "</td>" +
                            "<td>" + data.status + "</td>" +
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
        $('#Index').hide();
        $('#Create').hide();
        $('#Edit').show();
        $('#list').hide();
        $('#datepicker1').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $.ajax({
                    method: "Get",
                    url: '/api/v1/event/' + id,
                    data: {}
                })
                .done(function (data) {
//                    var $form = $(this),
                    $("input[name='id']").val(data.id);
                    $("input[name='title']").val(data.title);
                    $("input[name='start']").val(data.start);
                    $("input[name='end']").val(data.end);
                    $("input[name='background_color']").val(data.background_color);
                    $("input[name='boder_color']").val(data.border_color);
                    $("input[name='url']").val(data.url);
                    $("input[name='content']").val(data.content);
                    $("input[name='status']").val(data.status);
                    $("input[name='sifat']").val(data.sifat);
                    $("input[name='is_remember']").val(data.is_remember);
                    $('#Edit').show();
                });
    }
    function Detail(id) {
        $("#modal-body").children().remove();
        $.ajax({
            method: "GET",
            url: '/api/v1/event/' + id,
            data: {},
            beforeSend: function () {
                $('#loader-wrapper').show();
            },
            success: function (data) {
//                    $('#loader').hide();
                $("#loader-wrapper").hide();
                $("#modal-body").append(
                        "<tr><td> Title </td><td> : </td><td>" + data.title + "</td></tr>" +
                        "<tr><td> Start </td><td> : </td><td>" + data.start + "</td></tr>" +
                        "<tr><td> End </td><td> : </td><td>" + data.end + "</td></tr>" +
                            //           "<tr><td> Background_color </td><td> : </td><td>" + data.background_color + "</td></tr>" +
                            //           "<tr><td> Border_color </td><td> : </td><td>" + data.border_color + "</td></tr>" +
                        "<tr><td> Url</td><td> : </td><td>" + data.url + "</td></tr>" +
                        "<tr><td> Content </td><td> : </td><td>" + data.content + "</td></tr>" +
                        "<tr><td>Status </td><td> : </td><td>" + data.status + "</td></tr>" +
                        "<tr><td>Sifat </td><td> : </td><td>" + data.sifat + "</td></tr>" +
                        "<tr><td>Is_remember</td><td> : </td><td>" + data.is_remember + "</td></tr>"
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
                        url: '/api/v1/event/' + id,
                        data: {}
                    })
                    .done(function (data) {
                        window.alert(data.result.message);
                        Index();
                    });
        }
    }
    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("color");
        console.log(currColor);
        $("input[name='background_color']").val(currColor);
        $("input[name='border_color']").val(currColor);
    });
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

