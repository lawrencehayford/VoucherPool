@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
  		@include('includes.voucher-dash')
     @include('includes.voucher-table')
     @include('includes.add-voucher-modal')
		</div>
	</div>
</div>
@endsection
