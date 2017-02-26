@extends('layouts.master')

@section('content')
	<operations-table :operations="{{ $operations }}"></operations-table>
@stop