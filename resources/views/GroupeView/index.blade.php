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
			<h1>Mes Groupes</h1>
			<div class="col-md-12">
				<a href="{{url('Groupe/create')}}" class="btn btn-secondary float-right"><span><img src="/img/plus.svg" style="width: 20px;height: 20px;"></span>  Add New Groupe</a>
			</div>
			<div class="col-md-12 py-4" style="margin-top: 10px;">
				<div>
					<table class="table table-bordered text-center">
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
					      	<a href="{{url('Groupe/'.$Groupe->id.'/show')}}" class="btn btn-sm btn-secondary">Details</a>
					      	<a href="{{url('Groupe/'.$Groupe->id.'/edit')}}" class="btn btn-sm  btn-success">Editer</a>
					      	<a href="{{ url('Groupe/delete/'.$Groupe->id) }} "><button class="btn btn-sm btn-danger">Supprimer</button></a>
					      		
					      	
					      </td>
					    </tr>
						@endforeach
					  </tbody>
					</table>		
				</div>
				
			</div>


@endsection