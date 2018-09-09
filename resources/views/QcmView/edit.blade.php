@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align:center;background-color: #ccc">
                        <div class="row">
                            <div class="col-md-10 card-title">
                                <h4><span style="color: red;font-weight: bold;">{{$qcms->title}}</span></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <button class="btn" style="background-color: #06701b;color: white" @click="open=true">Editer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"  v-if="open" style="background-color: #fff">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-sm" @click="open=false" style="background-color: white;"><img src="/icon/close.png" style="width: 15px;height: 15px;"></button>
                            </div>
                        </div>
                        

                        <form action="{{ url('Qcm/'.$qcms->id) }}" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @csrf

                            <!-- il faut transmettre id aussi !-->
                            <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="id" value="{{$qcms->id}}" required autofocus>

                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right ">Titre</label>

                                <div class="col-md-6">
                                        <input type="text" class="form-control" name="title" value="{{$qcms->title}}" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"  class="col-sm-4 col-form-label text-md-right " >Description</label>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control" name="description"  value="{{$qcms->description}}"required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                    <button type="submit" class="btn btn-block"  style="background-color: #06701b;color: #fff" >Modifier</button>
                                    <hr>
                            </div>
                    
                        </form>
                    
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
                      <button class="tablinks" onclick="openTab(event, 'QuestionManager')" id="defaultOpen">QuestionManager</button>
                      <button class="tablinks" onclick="openTab(event, 'ListeGroupe')">ListeGroupe</button>
                    </div>

                    <div class="card-body tabcontent" id="QuestionManager"  style="background-color: #fff">
                        <div  class="card-body"  style="background-color: #fff">
                            <div class="row">
                                <div class="col-md-4 card-title">
                                        <button class="btn btn-primary mb-5" @click="switchToAdd">New Question</button>
                                </div>


                             <!-- Ajouter les Questions!-->

                                <div class="col-md-8" v-if="openquestion" style="background-color: #fff;">
                                    
                                    <!-- ajouter des questions !-->
                                    
                                    <div class="card-body py-4 mt-2" style="background-color: #fff;border: 1px solid #ccc;">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label v-if="!edit">Nouvelle Question <sub style="color: red;font-size: 24px;">*</sub></label>
                                                        <label v-if="edit">Nouvelle Enonce <sub style="color: red;font-size: 24px;">*</sub></label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input v-model="question.enonce" type="text"  name="enonce" class="form-control" required autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <!-- liste de prposition!-->
                                        <div  class="form-group row" v-if="edit" >
                                            <div class="col-md-8 offset-md-1"> 
                                                <ul v-for="proposition in propositions">
                                                    <li>
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <input class="form-check-input" type="checkbox"value="0">
                                                                <label style="font-weight: bold;"> @{{proposition.name}}</label>

                                                             </div>
                                                        </div>
                                                    </li>
                                                </ul> 
                                            </div>
                                        </div>
                                                                           
                                        <div class="row">
                                            <div class="col-md-12 offset-md-4">
                                                <button v-show="edit" @click="updateQuestion" class="btn btn-warning ">Modifier Question</button>
                                                <button v-show="!edit" @click="addQuestions" class="btn btn-success ">Ajouter Question</button>
                                                <button @click="openquestion=false;edit = false;" class="btn btn-danger ">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  class="card-body"  style="background-color: #fff">
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <p style="font-weight: bold;"><ins>Liste de Questions :</ins></p>
                                        </div>
                                    </div>

                                    <div class=col-lg-12">
                                <!-- lister les questions !-->
                                        <ul class="list-group"  v-for="question in questions">
                                                <li class="list-group-item mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-6 card-title"><span style="font-weight: bold;">Question :</span> " @{{question.enonce}} ? " </div>
                                                        <div class="col-lg-6 text-right">
                                                                <a :href="'/Question/' + question.id + '/show'"><img src="/img/plus.svg" style="height: 15px;width: 15px;margin-bottom: 4px;"> New</a>      
                                                            <button class="btn btn-info btn-sm ml-2" @click="editQuestion(question)">Editer</button>
                                                            <button class="btn btn-sm" @click="deleteQuestion(question)" style="background-color: #f44242;color: white;">Supprimer</button>
                                                        </div>   
                                                    </div>
                                                </li>
                                        </ul>
                                        <div class="row ">
                                            <div class=" col-4 text-right">
                                                <button  class="btn btn-default btn-sm "><<</button>
                                            </div>
                                            <div class=" col-4">
                                                <button  class="btn btn-default btn-sm ">1</button>
                                                <button  class="btn btn-default btn-sm ">2</button>
                                                <button  class="btn btn-default btn-sm ">3</button>
                                            </div>
                                            <div class=" col-4 text-left">
                                                <button  class="btn btn-default btn-sm ">>></button>
                                            </div>
                                        </div>
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
                            <div class="row ">
                                <div class=" col-2 offset-md-4 text-right">
                                    <button  class="btn btn-success btn-sm "><<</button>
                                </div>
                                <div class=" col-2">
                                    <button  class="btn btn-success btn-sm ">1</button>
                                    <button  class="btn btn-success btn-sm ">2</button>
                                </div>
                                <div class=" col-2 text-left">
                                    <button  class="btn btn-success btn-sm ">>></button>
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
            'crsfToken' => csrf_token(),
            'idQcm' => $qcms->id,
            'url'   => url('/'),
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
                openquestion:true,
                edit:false,
                prop:false
                
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
                getPropositions:function(question) {
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
                        if(response.data.etat){
                            this.question.id=response.data.id;
                            this.questions.unshift(this.question);
                            this.question ={
                                id: '',
                                qcm_id:  window.laravel.idQcm,
                                enonce:'',
                                created_at:0,
                                updated_at:0
                            };
                        this.openquestion=true;
                        }
                    })
                    .catch(error=>{
                        console.log('error :' ,error.message)
                    })
                },
                 editQuestion:function(question) {
                    this.openquestion=true;
                    this.edit=true;
                    this.question=question;
                    this.getPropositions(this.question);
                },
                  getQuestionId:function(question) {
                    this.openquestion=true;
                    this.edit=true;
                    this.question=question;
                    return this.question.id;
                },

                editProposition:function(question) {
                    this.openquestion=true;
                    this.proposition ={
                                id: '',
                                qcm_id:  window.laravel.idQcm,
                                enonce:'',
                                created_at:0,
                                updated_at:0
                    };
                    this.openquestion=true;
                    this.edit=true;
                    this.question=question;
                    this.getPropositions(this.question);
                },
                 updateQuestion:function(question) {
                    axios.put(window.laravel.url+'/updatequestions',this.question)
                    .then(response =>{
                        console.log('success :' ,response.data)
                        if(response.data.etat){
                            this.openquestion=true;
                            this.question ={
                                id: '',
                                qcm_id:  window.laravel.idQcm,
                                enonce:'',
                                created_at:0,
                                updated_at:0
                            };
                        }
                        this.edit = false;
                    })
                    .catch(error=>{
                        console.log('error :' ,error.message)
                    })
                },

                deleteQuestion:function(question) {

                        axios.delete(window.laravel.url+'/deletequestions/'+question.id)
                        .then(response =>{
                            console.log('success :' ,response.data)
                            if(response.data.etat){
                                
                                var pos =this.questions.indexOf(question);
                                    this.questions.splice(pos,1); 
                            }
                        })
                        .catch(error=>{
                            console.log('error :' ,error.message)
                        })
                },
                switchToAdd:function() {
                    this.openquestion=false;
                    this.question ={
                                id: '',
                                qcm_id:  window.laravel.idQcm,
                                enonce:'',
                                created_at:0,
                                updated_at:0
                    };
                    this.edit=false;
                    this.openquestion=true;
                    
                },

            },
            mounted:function () {
                console.log('Mounted ....')
                this.getQuestions();
            }
                

        });

    </script>

@endsection