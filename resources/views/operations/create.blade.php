@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Create New Operation:</h1>

			<form action="{{ route('operations.store') }}" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">Title:</label>					
					<input type="text" id=	"title" class="form-control" name="title">
				</div>

				<div class="form-group">
					<label for="amount">Amount:</label>					
					<input type="text" id="amount" class="form-control" name="amount">
				</div>

				<div class="form-group">
					<label for="type">Type:</label>		

					<select name="type" id="type">
						<option value="income">Income</option>
						<option value="loss">Loss</option>
					</select>
				</div>

				<div class="form-group">
					<button class="btn btn-success pull-right">Create</button>
				</div>
			</form>
		</div>
	</div>
@stop