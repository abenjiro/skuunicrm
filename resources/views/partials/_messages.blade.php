<div style="margin-top: 15px;"></div>
@if (Session::has('success'))

	<div id="notify" class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
		<strong>Success: </strong>{{ Session::get('success') }}
	</div>

@endif



@if (count($errors) > 0)

	<div id="notify" class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
		<strong>Errors: </strong>

		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach

	</div>

@endif


<script type="text/javascript">

	
    setTimeout(function(){
        $("div.alert").remove();
    }, 10000 ); // 5 secs

</script>