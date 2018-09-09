@extends('layouts.app')


@section('content')

	<!-- interface de manipulation de l'etudiant !-->


	
	<div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
					<div   class="card-body">
						<div  class="row" style="background-color: #f7f7f7">
							<div class="col-12" style="border: 1px solid #ccc;">
								<div class="card-header">
			                        <div class="row">
			                            <div class="col-1 col-sm-4">
			                                <a  href="{{url('Quiz')}}" class="btn btn-sm " style="background-color: #6c757d;color: white"><<<< </a>
			                            </div>
			                            
			                        </div>
			                    </div>
			            		<form action="{{url('/Quiz/'.$qcm->id.'/'.$iteration.'/show')}} " method="post">
				                    	@csrf
					            		<div class="col-12  py-4">
												<div class="row  mt-4 mb-4">
									                <div class="col-md-12 card-title ">
								                   		<h4 >Question : <span style="color: red;"> {{$question->enonce}} ? </span> </h4>
								                   	</div>
							                    </div>
												@foreach ($question->propositions as $Prop)	
													<label id="container" class="offset-md-1">
							                        <input type="checkbox" name="propositions[]" id="{{  $Prop->id }}" value="{{  $Prop->id }}">
							                        <span style="font-weight: bold;">{{  $Prop->name }}</span>
							                        <span id="checkmark"></span>
							                        </label>
														    
												@endforeach
												
							                <div class="col-md-12 text-center mt-4">
							                	<div class="text-right mt-2">
											 		Question : {{$iteration-1}}/{{$Total}}
												</div>
							                	<button type="submit" class="btn btn-primary btn-block ">NextQuestion</button>
							                </div>
						            	</div>
					            	</form>
				            </div>
						</div>
					</div>
				</div>					
		</div>	
	</div>


@endsection

