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
					<table class="table table-bordered text-center">
					  <thead>
					    <tr>
					      <th scope="col">Titre</th>
					      <th scope="col">Description</th>
					      <th scope="col">Created_by</th>
					      <th scope="col">user_id</th>
					    </tr>
					  </thead>

					  <tbody>
					  	@foreach($qcms as $Qcm)
					    <tr>
					      <td><a href="{{ url('Quiz/'.$Qcm->id.'/1/show') }}">{{  $Qcm->title }}</a></td>
					      <td>{{  $Qcm->description }}</td>
					      <td><p>Mr. {{ $Qcm->user->secondname}} {{ $Qcm->user->firstname}}</p></td>
					      <td>{{  $Qcm->user_id }}</td>
					    </tr>
						@endforeach
					  </tbody>
					</table>		
				</div>
				
			</div>


@endsection