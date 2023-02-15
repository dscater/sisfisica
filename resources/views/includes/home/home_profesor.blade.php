 <!-- Info boxes -->
 <div class="row">
     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard-list"></i></span>
             <div class="info-box-content">
                 <span class="info-box-text">Ejercicios</span>
                 <span class="info-box-number">{{ $ejercicios }}</span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-clipboard-list"></i></span>
             <div class="info-box-content">
                 <span class="info-box-text">Formulas</span>
                 <span class="info-box-number">{{ $formulas }}</span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
 </div>
 <div class="row">
     <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
             <div class="info-box-content">
                 <span class="info-box-number"><h4><strong>{{ Auth::user()->paralelo->nombre }}</strong> - {{ Auth::user()->carrera->nombre }}</h4></span>
             </div>
             <!-- /.info-box-content -->
         </div>
     </div>
 </div>
 <!-- /.row -->
