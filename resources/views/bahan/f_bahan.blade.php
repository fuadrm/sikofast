@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

{{-- general --}}
@section('container')

  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b>Bahan</b></h3>

          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form action="/bahan/insert" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">

                    <div class="card-body">
                      <div class="form-group">
                        <label for="">Bahan</label>
                        <input name="material_name" class="form-control"  value="{{old('material_name')}}" id="">
                        <div class="text-danger">
                          @error('material_name')
                              {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                  
                  <!-- /.card-body -->
              </div>
              <!-- /.form-group -->
            </div>

            
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">

                <div class="card-body"> 
                  <div class="form-group">
                    <label for="">Harga</label>
                    <input name="price_material" class="form-control" value="{{old('price_material')}}" id="">
                    <div class="text-danger">
                      @error('price_material')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.form-group -->
                
            </div>

              <!-- /.col -->
              
          </div>
          
          <!-- /.row -->
          <div class="card-footer" >
            <button type="submit" class="btn btn-primary float-right" >Submit</button>
            
            <a href="/bahan" class="btn btn-secondary float-lg-left">Kembali</a>
            
          </div>
          </form>
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>


@endsection
