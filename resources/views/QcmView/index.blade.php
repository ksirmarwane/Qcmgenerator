@extends('layouts.app')


@section('content')

	<!-- interface de manipulation de l'etudiant !-->


	<div class="container">
		
		<div class="row">
			<h1>Mes Qcms</h1>
			<div class="col-md-12">
				<a href="{{url('Qcm/create')}}" class="btn btn-secondary float-right"><span><img src="/img/plus.svg" style="width: 20px;height: 20px;"></span>  Add New Qcm</a>
			</div>
			<div class="col-md-12 py-4" style="margin-top: 10px;">
				<div>
					<table class="table table-bordered text-center">
					  <thead>
					    <tr>
					      <th scope="col">Titre</th>
					      <th scope="col">Description</th>
					      <th scope="col">Created_by</th>
					      <th scope="col">user_id</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>

					  <tbody>
					  	@foreach($qcms as $Qcm)
					    <tr>
					      <td>{{  $Qcm->title }}</td>
					      <td>{{  $Qcm->description }}</td>
					      <td><p>Mr. {{ $Qcm->user->secondname}} {{ $Qcm->user->firstname}}</p></td>
					      <td>{{  $Qcm->user_id }}</td>
					      <td>
					      	
					      	<a href="{{url('Qcm/'.$Qcm->id.'/show')}}" class="btn btn-sm btn-secondary">Details</a>
					      	<a href="{{url('Qcm/'.$Qcm->id.'/edit')}}" class="btn btn-sm btn-success">Editer</a>
					      	<a href="{{ url('Qcm/delete/'.$Qcm->id) }} "><button class="btn btn-sm btn-danger">Supprimer</button></a>
					      		
					      	
					      </td>
					    </tr>
						@endforeach
					  </tbody>
					</table>		
				</div>
				
			</div>
		</div>
	</div>

@endsection