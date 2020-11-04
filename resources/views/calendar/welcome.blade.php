@extends('layouts.page')

@section('title', 'Calendar Page')

@section('content_header', 'Calendar')

<link rel="stylesheet" href="{{ asset('public/adminlte/plugins/fullcalendar/fullcalendar.css') }}"/>

@section('css')


@stop

@section('content')

<form id="formRequest">

	<div class="row">
		<div class="col-md-3">
			<div class="card">
			    <div class="card-header">
			      <h4 class="card-title">Add Event</h4>
			    </div>
			    <div class="card-body">
			      <!-- the events -->

			      	<div class="row">
				      	<div class="col-md-12">
				          <label>Event:</label>
			              <input type="text" class="form-control" name="eventName" id="eventName" placeholder="Event Name" autocomplete="off">
				        </div>
			        </div>

			        <div class="row mt-3">
				        <div class="col-md-6">
				        	<label>From:</label>
				        	<input type="text" class="form-control" name="eventStartDate" id="eventStartDate" autocomplete="off">
				        </div>

				        <div class="col-md-6">
				        	<label>To:</label>
				        	<input type="text" class="form-control" name="eventEndDate" id="eventEndDate" autocomplete="off">
				        </div>
			        </div>


			        <div class="row mt-3">
			        	<div class="col-md-12">
					        @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
						        <div class="checkbox d-inline">
						          <label for="drop-remove">
						            <input type="checkbox" name="eventDay[]" value="{{ $day }}">
						            {{ $day }}
						          </label>
						        </div>
					        @endforeach

				        </div>
				        <div class="col-md-12">
					        <button type="button" id="btnSubmit" class="btn btn-primary">SAVE</button>
				        </div>
			        </div>
			    </div>
			    <!-- /.card-body -->
			</div>
		</div>

		<div class="col-md-9">
			<div class="card">	

			    <div class="card-body">
			    	<div id='calendar'></div>
			    </div>
			    <!-- /.card-body -->
			</div>

		</div>
	</div>
</form>

@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="{{ asset('public/adminlte/plugins/fullcalendar/fullcalendar.js') }}"></script>
<script src="{{ asset('public/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>


<script type="text/javascript">

	$(document.body).removeClass('sidebar-collapse');
	$(document.body).addClass('sidebar-collapse');

</script>

<script>
$(document).ready(function () {
    // page is now ready, initialize the calendar...

    $('#eventStartDate').datepicker({
        autoclose: true
    });
    $('#eventEndDate').datepicker({
        autoclose: true
    });


    renderCalendar()

    function renderCalendar() {

	    setTimeout(function() {
	      $('#calendar').fullCalendar({
	        events: '{{ url('getEvents') }}'
		  })
	    }, 500)

    }


    $( "#btnSubmit" ).on('click', function( event ) {

	    $.ajax({ 
		    type: 'post',
		    headers: {'x-csrf-token': '{{ csrf_token() }}'},
		    url: '{{ url('createEvent') }}',
		    data: $('#formRequest').serialize(),
		    dataType : 'json',
		    success: function(data) {
		    	// console.log(data)
		    	Swal.fire({
			        type: 'success',
			        title: data.message,
			        width: '370px',
			        showConfirmButton: false,
			        timer: 2000
		        })

		        $('#calendar').fullCalendar('destroy');
				renderCalendar()
		    },
		    error: function(xhr) {
		    	// console.log(xhr)
		    	$('#validation-errors').html('');
				   $.each(xhr.responseJSON.errors, function(key,value) {
				     toastr.error(value)
				 }); 
		    }
 		})

	});

});
</script>

@stop

