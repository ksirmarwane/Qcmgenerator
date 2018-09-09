@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div  class="card-body"  style="background-color: #fff">
                        <div class="row">
                            <div class="col-md-10 card-title">
                                <h4>Modifier les informations sur le Question <span style="color: red;font-weight: bold;">{{$question->id}}</span></h4>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                             <!-- Ajouter les Questions!-->
                            <div class="col-md-8"  style="background-color: #fff;">
                                <!-- ajouter des questions !-->
                                <div class="card-body py-4 mt-2" style="background-color: #fff;border: 1px solid #ccc;">
                                    <div class="form-group row">
                                        <div class="col-12 offset-md-1">
                                            <label> Question {{$question->id}} : {{$question->enonce}}</label>
                                        </div>
                                    </div>
                                    <!-- liste de prposition!-->
                                    <div>
                                        <div class="col-md-9 offset-md-1">
                                            <label id="container" v-for="proposition in propositions">
                                            <input type="checkbox">
                                            <span style="font-weight: bold;">@{{proposition.name}}</span>
                                            <span id="checkmark"></span>
                                            </label>       
                                        </div>                                        
                                    </div>
                                    <!-- ajouter une proposition!-->
                                        <div class="col-md-9 offset-md-1">
                                              <div class="form-group row" >
                                                  <div class="col-md-9 offset-md-1">
                                                          <input v-model="proposition.name" type="text"  name="name" class="form-control" required autofocus>
                                                  </div>
                                              </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-12 offset-md-2">
                                            <a  href="{{url('Qcm/'.$question->qcm_id.'/edit')}}" class="btn btn-success "> << Retour au Questions</a>
                                            <button @click="addPropositions" class="btn btn-danger ">Ajouter Proposition</button>
                                        </div>
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

        window.laravel ={!!json_encode([
            'crsfToken' => csrf_token(),
            'idQuestion' => $question->id,
            'url'   => url('/')
            ])!!};

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
                    question_id: window.laravel.idQuestion,
                    name:'',
                    value:false,
                    created_at:0,
                    updated_at:0
                },
                open:false,
                openquestion:false,
                edit:false
                
            },
            methods:{

                getPropositions:function() {
                    axios.get(window.laravel.url+'/getpropositions/'+window.laravel.idQuestion+'/show')
                    .then(response =>{
                        console.log('success :' ,response.data)
                        this.propositions = response.data;
                    })
                    .catch(error=>{
                        console.log('error :' ,error.message)
                    })
                },
                addPropositions:function() {
                    axios.post(window.laravel.url+'/addpropositions',this.proposition)
                    .then(response =>{
                        console.log('success :' ,response.data)
                        if(response.data.etat){
                            this.openquestion=false;
                            this.proposition.id=response.data.id;
                            this.proposition.name='';
                            this.getPropositions();
                        }
                    })
                    .catch(error=>{
                        console.log('error :' ,error.message)
                    })
                }

            },
            mounted:function () {
                console.log('Mounted ....');
                this.getPropositions();
            }
                

        });

    </script>

@endsection