@extends('layouts.app')


@section('content')

	<!-- interface de manipulation de l'etudiant !-->

	<div class="container">
		<div class="row">
            <div class="col-md-12">
				<div class="card-header">
				    <div class="row">
				    	<div class="col-1 col-sm-4">
                                <a  href="{{url('Groupe')}}" class="btn btn-sm " style="background-color: #6c757d;color: white"><<<< </a>
                        </div>
                        <div class="col-10 col-sm-8 card-title"> 
                            Informations sur le Groupe <span style="color: red;">" {{$groupes->name}} </span> 
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                	<div class="tab">
  					  <button class="tablinks" onclick="openTab(event, 'List Qcms')" id="defaultOpen">List Qcms</button>
					  <button class="tablinks" onclick="openTab(event, 'List Students')">List Students</button>
					</div>
					<div class="card-body tabcontent" id="List Qcms"  style="background-color: #fff">
						<div class="card-body" style="background-color: #fff">
							<div  class="row">
								<div class="col-md-12 card-title">
									<p style="font-weight: bold;"><ins>Liste de Qcms :</ins></p>
										<ul class="list-group">
										@foreach($groupes->qcms as $Qcm)
											<li class="list-group-item mb-2 "><span style="color: red;font-weight: bold;">
												{{  $Qcm->title }} <br></span><span style="font-weight: bold;margin-left: 15px;">Created par :</span> Mr.{{  $Qcm->user->secondname }} {{ $Qcm->user->firstname}}</li> 
										</ul>
										@endforeach
								</div>
							</div>
						</div>
					</div>
					<div  class="card-body tabcontent"  id="List Students" style="background-color: #fff">
						<div   class="card-body">
							<div  class="row">
								
							</div>
						</div>
					</div>	
                </div>
            </div>
        </div>
    </div>
	
@endsection
@section('javascripts')
	
	<script >
		function openTab(evt, Tabname) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById(Tabname).style.display = "block";
		    evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();	
	</script>

@endsection