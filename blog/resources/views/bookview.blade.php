<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        
		<!-- Scripts -->
		<script src="{{ URL::asset('js/jquery-3.2.1.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    </head>
    <body>
		<div class="col-lg-4 col-lg-offset-4">
				<center>
					<h1>Book Info</h1>
					<a class="btn btn-primary" href="/book-list">Go Back</a>
				</center>
		</div>
		<div class="container-fluid">
		  <table class="table table-striped">
			<thead>
			  <tr>
				<th>Title</th>
				<th>Author</th>
				<th>Publication Date</th>
			  </tr>
			</thead>
			<tbody>
				<tr>
					<td>
						{{$item->title}}
					</td>
					<td>
						{{$item->author}}
					</td>
					<td>
						{{$item->publicationDate}}
					</td>
				</tr>
			</tbody>
		  </table>
		</div>
    </body>
</html>
