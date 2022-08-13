@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

@section('container')

<section class="content">
    <div class="container-fluid">
     
      <!-- /.row -->
      <!-- END ALERTS AND CALLOUTS -->
      <h5 class="mt-4 mb-2">Laporan FastPrint Bandung</h5>

      <div class="row">
        <div class="col-6">
          <!-- Custom Tabs -->
          <div class="card">
            <div class="card-header ">
              <h3 class="card-title p-3">Laporan Pemesanan</h3>
              <a href="/pemesanan/generateExcel" class="btn btn-success float-lg-right">ExportExcel</a>
              
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-pane" id="tab_3">
                  Laporan Pemesanan yang dicetak dibuat berdasarkan<br>
                  status pemesanan yang telah selesai<br>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <!-- Custom Tabs -->
          <div class="card">
            <div class="card-header ">
              <h3 class="card-title p-3">Laporan Pembayaran</h3>
              <a href="/pembayaran/generateExcel" class="btn btn-success float-lg-right">ExportExcel</a>
              
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-pane" id="tab_3">
                    Laporan Pembayaran yang dicetak dibuat berdasarkan<br>
                    status pembayaran yang telah lunas pembayarannya<br>
                    
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <!-- Custom Tabs -->
          <div class="card">
            <div class="card-header ">
              <h3 class="card-title p-3">Laporan Bahan Baku</h3>
              <a href="/bahanbaku/generateExcel" class="btn btn-success float-lg-right">ExportExcel</a>
              
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-pane" id="tab_3">
                    Laporan Bahan Baku yang dicetak dibuat berdasarkan<br>
                    status bahan baku yang telah terpenuhi
                </div>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>

@endsection