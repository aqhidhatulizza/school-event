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