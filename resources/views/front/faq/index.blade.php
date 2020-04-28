@extends('layouts.app')

@section('content')
<main>

    <div class="container">
        <row>
           <h1 class="my-3 text-center">Preguntas Frecuentes</h1>
        </row>
           <div class="row my-3">
               <div class="col-lg-4">
                   <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                       <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1" aria-selected="true">
                          Productos
                       </a>
                       <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2" aria-selected="false">
                          Login
                       </a>
                       <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3" aria-selected="false">
                          Perfil
                       </a>
                       <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4" aria-selected="false">
                          Envios
                       </a>
                       <a href="#tab5" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab5" aria-selected="false">
                          Medios de Pago
                       </a>
                       <a href="#tab6" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6" aria-selected="false">
                          Generales
                       </a>
                   </div>
               </div>
               <div class="col-lg-8">
                   <div class="tab-content" id="faq-tab-content">
                       <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                           <div class="accordion" id="accordion-tab-1">
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-1-heading-1">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-1" aria-expanded="false" aria-controls="accordion-tab-1-content-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse show" id="accordion-tab-1-content-1" aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                                       <div class="card-body">
                                           <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-1-heading-2">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-2" aria-expanded="false" aria-controls="accordion-tab-1-content-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-1-content-2" aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>

                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-1-heading-3">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-3" aria-expanded="false" aria-controls="accordion-tab-1-content-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-1-content-3" aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-1-heading-4">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-4" aria-expanded="false" aria-controls="accordion-tab-1-content-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-1-content-4" aria-labelledby="accordion-tab-1-heading-4" data-parent="#accordion-tab-1">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                           <div class="accordion" id="accordion-tab-2">
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-2-heading-1">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-1" aria-expanded="false" aria-controls="accordion-tab-2-content-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse show" id="accordion-tab-2-content-1" aria-labelledby="accordion-tab-2-heading-1" data-parent="#accordion-tab-2">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-2-heading-2">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-2" aria-expanded="false" aria-controls="accordion-tab-2-content-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-2-content-2" aria-labelledby="accordion-tab-2-heading-2" data-parent="#accordion-tab-2">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-2-heading-3">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-3" aria-expanded="false" aria-controls="accordion-tab-2-content-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-2-content-3" aria-labelledby="accordion-tab-2-heading-3" data-parent="#accordion-tab-2">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-2-heading-4">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-4" aria-expanded="false" aria-controls="accordion-tab-2-content-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-2-content-4" aria-labelledby="accordion-tab-2-heading-4" data-parent="#accordion-tab-2">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                           <div class="accordion" id="accordion-tab-3">
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-3-heading-1">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-1" aria-expanded="false" aria-controls="accordion-tab-3-content-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse show" id="accordion-tab-3-content-1" aria-labelledby="accordion-tab-3-heading-1" data-parent="#accordion-tab-3">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-3-heading-2">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-2" aria-expanded="false" aria-controls="accordion-tab-3-content-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-3-content-2" aria-labelledby="accordion-tab-3-heading-2" data-parent="#accordion-tab-3">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-3-heading-3">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-3" aria-expanded="false" aria-controls="accordion-tab-3-content-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-3-content-3" aria-labelledby="accordion-tab-3-heading-3" data-parent="#accordion-tab-3">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-3-heading-4">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-4" aria-expanded="false" aria-controls="accordion-tab-3-content-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-3-content-4" aria-labelledby="accordion-tab-3-heading-4" data-parent="#accordion-tab-3">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                           <div class="accordion" id="accordion-tab-4">
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-4-heading-1">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-1" aria-expanded="false" aria-controls="accordion-tab-4-content-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse show" id="accordion-tab-4-content-1" aria-labelledby="accordion-tab-4-heading-1" data-parent="#accordion-tab-4">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-4-heading-2">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-2" aria-expanded="false" aria-controls="accordion-tab-4-content-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-4-content-2" aria-labelledby="accordion-tab-4-heading-2" data-parent="#accordion-tab-4">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-4-heading-3">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-3" aria-expanded="false" aria-controls="accordion-tab-4-content-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-4-content-3" aria-labelledby="accordion-tab-4-heading-3" data-parent="#accordion-tab-4">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-4-heading-4">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-4" aria-expanded="false" aria-controls="accordion-tab-4-content-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-4-content-4" aria-labelledby="accordion-tab-4-heading-4" data-parent="#accordion-tab-4">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5">
                           <div class="accordion" id="accordion-tab-5">
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-5-heading-1">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-1" aria-expanded="false" aria-controls="accordion-tab-5-content-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse show" id="accordion-tab-5-content-1" aria-labelledby="accordion-tab-5-heading-1" data-parent="#accordion-tab-5">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-5-heading-2">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-2" aria-expanded="false" aria-controls="accordion-tab-5-content-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-5-content-2" aria-labelledby="accordion-tab-5-heading-2" data-parent="#accordion-tab-5">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-5-heading-3">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-3" aria-expanded="false" aria-controls="accordion-tab-5-content-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-5-content-3" aria-labelledby="accordion-tab-5-heading-3" data-parent="#accordion-tab-5">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-5-heading-4">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-4" aria-expanded="false" aria-controls="accordion-tab-5-content-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-5-content-4" aria-labelledby="accordion-tab-5-heading-4" data-parent="#accordion-tab-5">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6">
                           <div class="accordion" id="accordion-tab-6">
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-6-heading-1">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-1" aria-expanded="false" aria-controls="accordion-tab-6-content-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse show" id="accordion-tab-6-content-1" aria-labelledby="accordion-tab-6-heading-1" data-parent="#accordion-tab-6">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-6-heading-2">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-2" aria-expanded="false" aria-controls="accordion-tab-6-content-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-6-content-2" aria-labelledby="accordion-tab-6-heading-2" data-parent="#accordion-tab-6">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-6-heading-3">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-3" aria-expanded="false" aria-controls="accordion-tab-6-content-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-6-content-3" aria-labelledby="accordion-tab-6-heading-3" data-parent="#accordion-tab-6">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="card">
                                   <div class="card-header" id="accordion-tab-6-heading-4">
                                       <h5>
                                           <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-4" aria-expanded="false" aria-controls="accordion-tab-6-content-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit?</button>
                                       </h5>
                                   </div>
                                   <div class="collapse" id="accordion-tab-6-content-4" aria-labelledby="accordion-tab-6-heading-4" data-parent="#accordion-tab-6">
                                       <div class="card-body">
                                       <p>Laborum consectetur eos modi a, aliquam error porro ex amet nemo delectus assumenda cum facere libero commodi alias consequuntur tempora qui sapiente</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


  </main>
@endsection
