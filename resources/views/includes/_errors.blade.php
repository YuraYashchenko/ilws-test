<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<ul>
          @foreach($errors->all() as $error)
              <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>
	</div>
</div>