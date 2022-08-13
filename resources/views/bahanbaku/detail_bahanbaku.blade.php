@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

@section('container')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        
         <br>
        <table class="table" width="22%">
            {{-- <tr>
                <th width="4%">Bahan Baku Kertas</th>
                <th width="1%">:</th>
                <th width="20%">{{$bahanbaku->bb_name1}}</th>
            </tr>
            <tr>
                <th width="2%">Jumlah (rim,roll,m)</th>
                <th width="1%">:</th>
                <th width="22%">{{$bahanbaku->jmlh1}}</th>
            </tr> --}}
            <tr>
                <th width="4%">Bahan Baku Kain</th>
                <th width="1%">:</th>
                <th width="20%">{{$bahanbaku->bb_name1}}</th>
            </tr>
            <tr>
                <th width="2%">Jumlah (roll,m)</th>
                <th width="1%">:</th>
                <th width="22%">{{$bahanbaku->jmlh1}}</th>
            </tr>
            <tr>
                <th width="2%">Tanggal Pembelanjaan</th>
                <th width="1%">:</th>
                <th width="22%">{{$bahanbaku->tgl_belanja}}</th>
            </tr>
            <tr>
                <th width="2%">Bukti Nota</th>
                <th width="1%">:</th>
                <th width="22%"><img src="{{ url('notabb/'.$bahanbaku->nota)}}" width="500px"></th>
            </tr>
        </table>
        {{-- <script type="text/javascript">
            window.print();
        </script> --}}
       

        <!-- /.card-body -->
        <div class="card-footer">
        <a href="/bahanbaku" class="btn btn-secondary float-lg-left">Kembali</a>
        </div>
      </div>
      <!-- /.card -->
      
    </div><!-- /.container-fluid -->
  </section>

@endsection