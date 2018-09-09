@extends('layouts.app')


@section('content')

	<!-- interface de manipulation de l'etudiant !-->


	<div class="container">
		<div class="row">
            <div class="col-md-12">
				<div class="card-header">
				    <div class="row">
                    	<div class="col-md-12 card-title text-center"><h4>Details sur le QCM : <span style="color: red;"><< {{$qcms->title}} >></span> </h4></div>
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
  					  <button class="tablinks" onclick="openTab(event, 'ListQuestion')" id="defaultOpen">ListQuestion</button>
					  <button class="tablinks" onclick="openTab(event, 'ListeGroupe')">ListeGroupe</button>
					</div>

					<div class="card-body tabcontent" id="ListQuestion"  style="background-color: #fff">	
						<div  class="card-body">
							<div class="row">
								<div class="col-md-8">
									<p style="font-weight: bold;"><ins>Liste de Questions :</ins></p>
									<ul class="list-group"  v-for="question in questions">
										<li class="list-group-item mb-2">
											<div class="row">
							                    <div class="col-lg-10 card-title"><span style="font-weight: bold;">Question :</span> " @{{question.enonce}} ? " </div>
							                    <div class="col-lg-2 text-right">
					                    			<button @click="open=true;getProposition(question)" class="btn btn-sm" style="background-color:#7575a3;color: white;">details</button>
					                    		</div>
			                    			</div>
									
										</li>
									</ul>
								</div>
								<div class="col-md-4" v-if="open" style="border: 1px solid #ccc;">
									<p style="font-weight: bold;"><ins>Liste de Propositions :</ins></p>
			                    		<div class="col-md-9 offset-md-1">
				                            <label id="container" v-for="proposition in propositions">
				                                <input type="checkbox" name="">
				                                <span style="font-weight: bold;">@{{proposition.name}}</span>
				                                <span id="checkmark"></span>
				                            </label>      
				                      	</div>
				                      	<div class="col-md-12 text-center mt-5 mb-2">
				                      		<button @click="open=false;" class="btn btn-danger btn-block ">Fermer</button>
				                      	</div>
				                      	
								</div>
							</div>
						</div>
					</div>

					<div  class="card-body tabcontent"  id="ListeGroupe" style="background-color: #fff">
						<div   class="card-body">
							<div  class="row">
								<div class="col-md-12 card-title">
										<p style="font-weight: bold;"><ins>Liste de Groupes :</ins></p>
											<ul class="list-group">
												@foreach($qcms->groupes as $Groupe)
												<li class="list-group-item mb-2 "><span style="color: red;font-weight: bold;">
													{{  $Groupe->name }} <br></span><span style="font-weight: bold;margin-left: 15px;">Created par :</span> Mr.{{$Groupe->user->secondname ." ". $Groupe->user->firstname }}</li> 
											</ul>
											@endforeach
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

		window.laravel ={!!json_encode([
			'crsfToken'	=> csrf_token(),
			'idQcm' => $qcms->id,
			'url'	=> url('/')
			])!!};

	</script>
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

	<script >
		
		var app = new Vue({
		    el: '#app',
		    data : {
		    	questions :[],
		    	question: {
		    		id: '',
		    		qcm_id:  window.laravel.idQcm,
		    		enonce:'',
		    		created_at:0,
		    		updated_at:0
		    	},
		    	propositions :[],
                proposition: {
                    id: '',
                    question_id: '',
                    name:'',
                    value:false,
                    created_at:0,
                    updated_at:0
                },
		   		open:false,	
		    	detail:false
		    	
		    },
		    methods:{

		    	getQuestions:function() {
		    		axios.get(window.laravel.url+'/getquestions/'+window.laravel.idQcm)
		    		.then(response =>{
		    			console.log('success :' ,response.data)
		    			this.questions = response.data;
		    		})
		    		.catch(error=>{
		    			console.log('error :' ,error.message)
		    		})
		    	},
		    	getProposition:function(question) {
                    axios.get(window.laravel.url+'/getpropositions/'+question.id)
                    .then(response =>{
                        console.log('success :' ,response.data)
                        this.propositions = response.data;
                    })
                    .catch(error=>{
                        console.log('error :' ,error.message)
                    })
                },

		    	addQuestions:function() {
		    		axios.post(window.laravel.url+'/addquestions',this.question)
		    		.then(response =>{
		    			console.log('success :' ,response.data)
		    			this.getQuestions();
		    		})
		    		.catch(error=>{
		    			console.log('error :' ,error.message)
		    		})
		    	}


		    },
		    mounted:function () {
		    	console.log('Mounted ....')
		    	this.getQuestions();
		    	this.getAllPropositions();
		    }
		    	

		});

	</script>

@endsection





















