@extends('layouts.master')
@section('styles')
        <!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="{!! asset('assets/plugins/fullcalendar/fullcalendar.min.css') !!}">
<link rel="stylesheet" href="{!! asset('assets/plugins/fullcalendar/fullcalendar.print.css') !!}" media="print">
@endsection
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Calendar
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
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
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('scripts')
        <!-- fullCalendar 2.2.5 -->
<!-- daterangepicker -->
<script src="{!! asset ('assets/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- datepicker -->
<script src="{!! asset ('assets/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<script src="{!! asset ('assets/plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/fullcalendar/fullcalendar.js') !!}"></script>
<script>
    $(function () {
        cekevent();
        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });
        }

        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month',
            },
            buttonText: {
                today: 'today',
                month: 'month',
            },
            //Random default events
            events: '{!! route('api.v1.list.event') !!}',
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (date, allDay) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = allDay;
                copiedEventObject.backgroundColor = $(this).data("background_color");
                copiedEventObject.borderColor = $(this).data("border_color");

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            }
        });

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