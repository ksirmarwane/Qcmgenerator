@extends('layouts.app')

    <!-- Formulaire de Creation de student !-->


@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4 col-sm-5">
                                <a  href="{{url('Groupe')}}" class="btn btn-sm " style="background-color: #6c757d;color: white"><<<< </a>
                            </div>
                            <div class="col-8 col-sm-7 card-title"> 
                                 Ajouter Un Groupe
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                    <form action="{{ url('Groupe') }}" method="post">
                        @csrf

                            
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right ">Name</label>

                            <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"  required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qcms" class="col-sm-4 col-form-label text-md-right ">Qcm</label>
                            <div class="col-md-6">
                                  <select class="form-control" name="qcms">
                                      @foreach($qcms as $Qcm)
                                      <option value="{{$Qcm->id}}">{{$Qcm->title}}</option>
                                      @endforeach
                                  </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-6">
                                <button type="submit" class="btn btn-primary" >Ajouter</button>
                            </div>
                        </div>
                        
                
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>


	




@endsection