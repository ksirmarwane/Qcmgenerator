@extends('layouts.app')


@section('content')

	<!-- interface de manipulation de l'etudiant !-->


	
	<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div  class="card-body"style="background-color: #fff">
						<div class="row">
		                   	<div class="col-md-12 card-title ">
		                   		<h4>Question : <span style="color: red;"> {{$questions->enonce}} ? </span> </h4>
		                   	</div>
		                </div>
						<div   class="card-body">
							<div  class="row">
								<div class="col-md-12" v-if="open" style="border: 1px solid #ccc;">
									<p style="font-weight: bold;"><ins>Liste de Propositions :</ins></p>
			                    		<div class="col-md-9 offset-md-1">
				                            @foreach($questions->propositions as $Prop)
												<label id="container" class="offset-md-1">
				                                <input type="checkbox">
				                                <span style="font-weight: bold;">{{  $Prop->name }} => {{$Prop->id ." ". $Prop->value }}</span>
				                                <span id="checkmark"></span>
				                            	</label>
											@endforeach	 
				                      	</div>
				                      	<div class="col-md-12 text-center mt-5 mb-2">
				                      		<button @click="open=false;" class="btn btn-primary btn-block ">submit</button>
				                      	</div>
				                </div>
							</div>
							</div>
						</div>
					</div>		
            </div>			
		</div>	
	</div>


@endsection

@section('javascripts')
	
	
	<script src="/js/vue.js"></script>
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





















