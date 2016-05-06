@extends('layouts.master')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List KLIEN
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Login</a></li>
        <li><a href="#">Calender</a></li>
        <li class="active">Event</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div id="list">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" onclick="Create()">
                            <i  class="fa fa-plus-circle"></i></button>
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
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>Status</th>
                                    <th>No_HP</th>
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
                                    <label for="exampleInputTitle">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputNama"
                                           placeholder="Nama">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputEmail">EMAIL</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail"
                                           placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIs_status">STATUS</label>
                                    <input type="text" name="status" class="form-control" id="exampleInputStatus"
                                           placeholder="Status">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIs_status">NO_HP</label>
                                    <input type="text" name="no_hp" class="form-control" id=" exampleInputNo_hp"
                                           placeholder="No_hp">
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
                                    <label for="exampleInputNama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputNama"
                                           placeholder="Nama">
                                </div>
                                <div class="form-group date">
                                    <label for="exampleInputEmail">EMAIL</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail"
                                           placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIs_status">STATUS</label>
                                    <input type="text" name="status" class="form-control" id="exampleInputStatus"
                                           placeholder="Status">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIs_status">NO_HP</label>
                                    <input type="text" name="no_hp" class="form-control" id="exampleInputNo_hp"
                                           placeholder="No_hp">
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
        $("#Form-Create").submit(function (klien) {
            klien.preventDefault();
            var $form = $(this),
                    nama = $form.find("input[name='nama']").val(),
                    email = $form.find("input[name='email']").val(),
                    status = $form.find("input[name='status']").val(),
                    no_hp = $form.find("input[name='no_hp']").val();
            //           $("#Form-Create").reset();
            var posting = $.post('/api/v1/klien', {
                nama: nama,
                email: email,
                status: status,
                no_hp: no_hp,
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
        $("#Form-Edit").submit(function (klien) {
            klien.preventDefault();
            var $form = $(this),
                    id = $form.find("input[name='id']").val(),
                    nama = $form.find("input[name='nama']").val(),
                    email = $form.find("input[name='email']").val(),
                    status = $form.find("input[name='status']").val(),
                    no_hp = $form.find("input[name='no_hp']").val();
            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/klien/' + id,
                data: {
                    nama: nama,
                    email: email,
                    status: status,
                    no_hp: no_hp
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
        $('#list').show();
        $("#data-example").children().remove();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        getAjax();
    }
    function Create() {
        $('#Edit').hide();
        $('#list').hide();
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
            $.getJSON("/api/v1/klien", function (data) {
                var jumlah = data.data.length;
                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#data-example").append("" +
                            "<tr>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.email + "</td>" +
                            "<td>" + data.status + "</td>" +
                            "<td>" + data.no_hp + "</td>" +
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
        $('#list').hide();
        $('#Create').hide();
        $('#Edit').show();

        $.ajax({
                    method: "Get",
                    url: '/api/v1/klien/' + id,
                    data: {}
                })
                .done(function (data) {
//                    var $form = $(this),
                    $("input[name='id']").val(data.id);
                    $("input[name='nama']").val(data.nama);
                    $("input[name='email']").val(data.email);
                    $("input[name='status']").val(data.status);
                    $("input[name='no_hp']").val(data.no_hp);
                    $('#Edit').show();
                });
    }
    function Detail(id) {
        $("#modal-body").children().remove();
        $.ajax({
            method: "GET",
            url: '/api/v1/klien/' + id,
            data: {},
            beforeSend: function () {
                $('#loader-wrapper').show();
            },
            success: function (data) {
//                    $('#loader').hide();
                $("#loader-wrapper").hide();
                $("#modal-body").append(
                        "<tr><td> Nama </td><td> : </td><td>" + dat.Nama + "</td></tr>" +
                        "<tr><td> Email </td><td> : </td><td>" + data.Email + "</td></tr>" +
                        "<tr><td> Status </td><td> : </td><td>" + data.Status + "</td></tr>" +
                        "<tr><td> No_hp  </td><td> : </td><td>" + data.No_hp + "</td></tr>"
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
                        url: '/api/v1/klien/' + id,
                        data: {}
                    })
                    .done(function (data) {
                        window.alert(data.result.message);
                        Index();
                    });
        }


    }

    function cekevent(){

        $.getJSON("/api/v1/event", function (data) {
            var jumlah = data.data.length;
            $.each(data.data.slice(0, jumlah), function (i, data) {
                var today = Date.now();
                var tgl = today.getFullYear()+"-"+today.getMonth()+"-"+today.getDate();
                console.log(tgl);
                console.log(data.start);
                console.log(data.end);

            })
        });
    }
</script>
@endsection
