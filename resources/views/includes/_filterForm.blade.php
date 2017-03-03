<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form action="/filter">
			<div class="form-group">
				<label for="from">From:</label>
				<input class="form-control" 
						value="{{ $operations['dates']['from'] ?? '' }}" 
						style="width: 150px" 
						type="date" 
						name="from">
			</div>

			<div class="form-group">
				<label for="from">To:</label>
				<input class="form-control" 
				value="{{ $operations['dates']['to'] ?? ''}}" 
				style="width: 150px" 
				type="date" 
				name="to">
			</div>
			<a href="{{ route('operations.index') }}" class="btn btn-primary">To All</a>
			
			<button type="submit" class="btn btn-primary pull-right">Filter</button>
		</form>
	</div>
</div>