@extends('layouts.app')

@section('content')
<div class="container py-4" style="background-color: #fff;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mr-auto ml-2">
                <img src="/uploads/avatars/{{ Auth::user()->avatar}}" style="width: 150px;height: 150px;float: left;border-radius: 50%;margin-right: 25px;">
                <h2>{{ Auth::user()->firstname }}'s Profil<span style="font-size: 12px;margin-left: 10px;">({{ Auth::user()->user_type}})</span></h2>
                

            </div>
       
            <div class=" ml-auto">
                <form enctype="multipart/form-data" action="/home" method="POST">
                    <label>Update Profile image</label><br>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="pull-right btn btn-sm btn-secondary">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container py-4"  style="background-color: #fff;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="tab">
                      <button class="tablinks" onclick="openTab(event, 'MesGroupes')" id="defaultOpen">MesGroupes</button>
                      <button class="tablinks" onclick="openTab(event, 'MesQcms')">MesQcms</button>
                    </div>

                    <div class="card-body tabcontent" id="MesGroupes"  style="background-color: #fff"> 
                        <div  class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-weight: bold;"><ins>Liste de Groupe :</ins></p>
                                    <ul class="list-group">
                                        @foreach (Auth::user()->studentgroupes as $Groupe)
                                        <li class="list-group-item mb-2">
                                            <div class="row">
                                                <div class="col-lg-10 card-title">
                                                    <span style="color: red;font-weight: bold;">{{  $Groupe->name }} <br></span>
                                                    <span style="font-weight: bold;margin-left: 15px;">Created par :</span> Mr.{{  $Groupe->user->secondname }} {{ $Groupe->user->firstname}}
                                                </div>
                                                <div class="col-lg-2 text-right">
                                                    <button @click="open=true;getProposition(question)" class="btn btn-sm" style="background-color:#7575a3;color: white;">details</button>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @foreach (Auth::user()->teachergroupes as $Groupe)
                                        <li class="list-group-item mb-2">
                                            <div class="row">
                                                <div class="col-lg-10 card-title">
                                                    <span style="color: red;font-weight: bold;">{{  $Groupe->name }} <br></span>
                                                    <span style="font-weight: bold;margin-left: 15px;">Created par :</span> Mr.{{  $Groupe->user->secondname }} {{ $Groupe->user->firstname}}
                                                </div>
                                                <div class="col-lg-2 text-right">
                                                    <button @click="open=true;getProposition(question)" class="btn btn-sm" style="background-color:#7575a3;color: white;">details</button>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>   
                    </div>
                    <div  class="card-body tabcontent"  id="MesQcms" style="background-color: #fff">
                            <div  class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-weight: bold;"><ins>Liste de Qcms :</ins></p>
                                    <ul class="list-group">
                                        
                                        @foreach (Auth::user()->qcms as $Qcm)
                                        <li class="list-group-item mb-2">
                                            <div class="row">
                                                <div class="col-lg-10 card-title">
                                                    <span style="color: red;font-weight: bold;">{{  $Qcm->title }} <br></span>
                                                    <span style="font-weight: bold;margin-left: 15px;">Created par :</span> Mr.{{  $Qcm->user->secondname }} {{ $Qcm->user->firstname}}
                                                </div>
                                                <div class="col-lg-2 text-right">
                                                    <button @click="open=true;getProposition(question)" class="btn btn-sm" style="background-color:#7575a3;color: white;">details</button>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

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