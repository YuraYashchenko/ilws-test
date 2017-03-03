@extends('layouts.master')

@section('content')
	@include('includes._filterForm')	

	<operations-table :operations="{{ $operations }}"></operations-table>
	
@stop