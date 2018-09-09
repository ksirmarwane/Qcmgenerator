@extends('layouts.app')

    <!-- Formulaire de Creation de student !-->


@section('content')
	<div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4 col-sm-5">
                                <a  href="{{url('Qcm')}}" class="btn btn-sm "  style="background-color: #6c757d;color: white"><<<< </a>
                            </div>
                            <div class="col-8 col-sm-7 card-title"> 
                                 Ajouter Un Qcm
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                    <form action="{{ url('Qcm') }}" method="post">
                        @csrf

                            
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right ">Titre</label>

                            <div class="col-md-6">
                                    <input type="text" class="form-control" name="title"  required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"  class="col-sm-4 col-form-label text-md-right " >Description</label>
                            <div class="col-md-6">
                                <input type="text"  class="form-control" name="description" required autofocus>
                                <p> Le texte de description est affiché au demarrage de Qcm</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bonnereponse"  class="col-sm-4 col-8 col-form-label text-md-right " >Bonne Reponse <sup style="color: red;font-size: 30px;">*</sup></label>
                            <div class="col-lg-1 col-1 col-md-2">
                                <input type="text"  class="form-control" name="bonnereponse" required >
                            </div>  
                        </div>
                        <div class="form-group row">
                            <label for="pasdereponse"  class="col-sm-4 col-8  col-form-label text-md-right " >Reponse vide <sup style="color: red;font-size: 30px;">*</sup></label>
                            <div class="col-lg-1 col-1  col-md-2">
                                <input type="text"  class="form-control" name="pasdereponse" required>
                            </div>
                            
                                
                        </div>
                        <div class="form-group row">
                            <label for="mauvaisereponse"  class="col-sm-4 col-8  col-form-label text-md-right " >Mauvaise Reponse <sup style="color: red;font-size: 30px;">*</sup> </label>
                            <div class="col-lg-1 col-1  col-md-2">
                                <input type="text"  class="form-control" name="mauvaisereponse" required >
                            </div>
                                
                        </div>
                        <div class="form-group row">
                            <label for="note"  class="col-sm-4 col-8  col-form-label text-md-right " >Note sur <sup style="color: red;font-size: 30px;">*</sup></label>
                            <div class="col-lg-1 col-1  col-md-2">
                                <input type="text"  class="form-control" name="note" required >
                            </div>
                            
                                
                        </div>
                        
                        <div class="form-group row">
                            <label for="note"  class="col-sm-4 col-6 col-form-label text-md-right " >Partagee </label>
                                <div class="col-3 col-lg-1 form-check">
                                        
                                       <input class="form-check-input" type="radio" name="partagee" id="partagee" value="0">
                                       <label class="form-form-label" for="partagee">
                                            {{ __('Non') }}
                                        </label>
                                            
                                </div>
                                <div class=" col-3 col-lg-1 form-check">
                                        <input class="form-check-input" type="radio" name="partagee" id="partagee" value="1">

                                        <label class="form-form-label" for="partagee">
                                            {{ __('Oui') }}
                                        </label>
                                        
                                
                                </div>
                        </div>
                           
                        

                        <div class="form-group row mt-5">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block" >Ajouter</button>
                            </div>
                        </div>
                        
                
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>


	




@endsection