 <!-- Info boxes -->
 <div class="row">
     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <span class="info-box-icon "
                 style=" background: url('imgs/Imagen1.jpg');background-size: cover;  "><i></i></span>
             <div>
                 <span class="info-box-text">Diagnóstico Inicial</span>
                 <span class="info-box-number"
                     style="font-size:1.4em;">{{ $diagnostico_inicial->puntaje }}/{{ $diagnostico_inicial->total }}</span>
             </div>
         </div>
     </div>

     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <span class="info-box-icon "
                 style=" background: url('imgs/Imagen2.jpg');background-size: cover;  "><i></i></span>
             <div class="info-box-conten" style="text-align:center">
                 <span class="info-box-text">Resultado del Diagnóstico</span>
                 <span class="info-box-number"
                     style="font-size:1.4em;">{{ $diagnostico_final->puntaje }}/{{ $diagnostico_final->total }}</span>
             </div>
         </div>
     </div>

     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <span class="info-box-icon bg-dange"
                 style=" background: url('imgs/Imagen3.jpg');background-size: cover;  "><i></i></span>
             <div style="text-align:center">
                 <span class="info-box-text">Puntuación extra</span>
                 <span class="info-box-number" style="font-size:1.4em;">{{ $puntaje_extra->puntaje }}</span>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <div class="info-box-content">
                 <span class="info-box-number">
                     <h4><strong>{{ Auth::user()->paralelo->nombre }}</strong> - {{ Auth::user()->carrera->nombre }}
                     </h4>
                 </span>
             </div>
             <!-- /.info-box-content -->
         </div>
     </div>
 </div>
