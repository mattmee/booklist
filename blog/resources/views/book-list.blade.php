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
					<h1>Book List</h1>
					<a class="btn btn-primary" data-toggle="modal" data-target="#addBook"> Add New Book</a>
				</center>
		</div>
		<div class="container-fluid">
		  <table class="table table-striped">
			<thead>
			  <tr>
				<th><a href="/book-list?r=title">Title</a></th>
				<th><a href="/book-list?r=author">Author</a></th>
				<th><a href="/book-list">Rank</a></th>
				<th>Options</th>
			  </tr>
			</thead>
			<tbody>
			@foreach ($books as $book) 
				<tr>
					<td>
						<a href="book-list/{{$book->id}}">{{$book->title}}</a>
					</td>
					<td>
						{{$book->author}}
					</td>
					<td>
						{{$book->rank}}
					</td>
					<td>
						<a href="{{'/book-list/' . $book->id . '/edit'}}"><button type="button" class="btn btn-info">Move to top</button></a>
						<form class="form-group" action="{{'/book-list/' .  $book->id }}" method="post">
							{{method_field('DELETE')}}
							{{csrf_field()}}
							<button type="submit" class="btn btn-warning">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach

			</tbody>
		  </table>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add New Book</h4>
			  </div>
			  <div class="modal-body">
			  <hr>
			  <form class="form-horizontal" action="/book-list" method="post">
			  {{csrf_field()}}
				<label class="col-sm-2 control-label" for="bookTitle">Title: </label>
				<div class="col-sm-10" id="childCrmNameDiv">
					<input class="form-control" type="text" id="bookTitle" name="bookTitle" placeholder="Book Title"required pattern="[a-zA-Z0-9 ]{1,50}" required autocomplete="off">
				</div>
				<label class="col-sm-2 control-label" for="bookAuthor">Author: </label>
				<div class="col-sm-10">
					<input class="form-control" type="text" id="bookAuthor" name="bookAuthor" placeholder="Author" pattern="[a-zA-Z0-9 ]{1,30}" required autocomplete="off">
				</div>	
				<label class="col-sm-2 control-label" for="publicationDate">Publication Date: </label>
				<div class="col-sm-10">
					<input class="form-control" type="text" id="publicationDate" name="publicationDate" placeholder="Publication Date" pattern="{1,30}" required autocomplete="off">
				</div>				
			  </div>
			  <br>
			  <hr>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Add Book</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
    </body>
</html>
