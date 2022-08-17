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
            <div class="" style="text-align: center; font-size:22px">
                <b>Bahan Baku {{$bahanbaku->status_bb == 1 ? 'Terpenuhi':'Belum Terpenuhi'}}</b>
            </div>
            <table class="table" width="25%">
            
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
           
        </table>
        {{-- <script type="text/javascript">
            window.print();
        </script> --}}
       

        <!-- /.card-body -->
        <div class="card-footer">
            <a href="/bahanbaku/pemenuhan" class="btn btn-secondary float-lg-left">Kembali</a>
        </div>
      </div>
      <!-- /.card -->
      
    </div><!-- /.container-fluid -->
  </section>

@endsection