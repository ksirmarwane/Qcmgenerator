@extends('layouts.app')


@section('content')

	<!-- interface de manipulation de l'etudiant !-->


	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				@if(session()->has('success'))

				<div class="alert alert alert-success">
					{{ session()->get('success') }}<br>
				</div>

				@endif
			</div>
			<h1>List de  Groupes</h1>
			
			<div class="col-md-12" style="margin-top: 10px;">
				<div>
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Created_by</th>
					      <th scope="col">user_id</th>
					      <th scope="col">Date</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>

					  <tbody>
					  	@foreach($groupes as $Groupe)
					    <tr>
					      <td>{{  $Groupe->name }}</td>
					      <td><p>Mr. {{ $Groupe->user->secondname}} {{ $Groupe->user->firstname}}</p></td>
					      <td>{{  $Groupe->user_id }}</td>
					      <td>{{  $Groupe->created_at }}</td>
					      <td>
					      	<form  action="{{ url('Joindre/'.$Groupe->id) }}" method="post">
					      		
	                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                            @csrf
					      		<button type="submit" class="btn btn-primary" >Envoyer demande d'addition</button>
					      	</form>
					      </td>
					    </tr>
						@endforeach
					  </tbody>
					</table>		
				</div>
				
			</div>


@endsection