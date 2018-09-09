@extends('layouts.app')


@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-1 col-sm-4">
                                <a  href="{{url('Groupe')}}" class="btn btn-sm " style="background-color: #6c757d;color: white"><<<< </a>
                            </div>
                            <div class="col-10 col-sm-8 card-title"> 
                                Modifier le Groupe <span style="color: red;">" {{$groupes->name}} "</span> 
                            </div>
                        </div>
                    </div>
                <div class="card-body">

                        <form action="{{ url('Groupe/'.$groupes->id) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right ">Nouveau Nom</label>

                                <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{$groupes->name}}" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="qcms" class="col-sm-4 col-form-label text-md-right ">Ajouter Un Qcm</label>
                                <div class="col-md-6">
                                      <select class="form-control" name="qcms">
                                          @foreach($qcms as $Qcm)
                                          <option value="{{$Qcm->id}}">{{$Qcm->title}}</option>
                                          @endforeach
                                      </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-8 offset-md-6">
                                    <button type="submit" class="btn btn-primary" >Modifier</button>
                                </div>
                            </div>
                        </form>
                    

                </div>
                
            </div>
        </div>
    </div>
</div>




@endsection