@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

@section('container')

<section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header" >
            
                {{-- @if(in_array(auth()->user()->role,[1,2]))
                <a href="/pemesanan/add" class="btn btn-primary float-lg-right">Add Data</a>
                @endif --}}
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible col-lg-6">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{session('pesan')}}.
                    </div>
                @endif

          </div>
         <br>
        <div class="col-12 table-responsive">
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr >
                    <th>No</th>
                    <th>No Pre-Order</th>
                    <th>Bahan</th>
                    <th>Jenis Order</th>
                    <th>Qty</th>
                    {{-- <th>Status Bahan</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($order as $key => $data)
                    <tr>
                        <td>{{$order->firstItem() + $key}}</td>
                        <td>{{$data->no_po}}</td>
                        <td>{{$data->bahan->material_name}}</td>
                        <td>{{$data->tipe->service_name}}</td>
                        <td>{{$data->qty}}</td>
                        {{-- <td>{{$data->bahanbaku->status == 1? 'Terpenuhi':'Belum Terpenuhi'}}</td> --}}
                        
                        {{-- <td>{{ "Rp " . number_format($data['total'], 0, ",", "."); }}</td>
                        <td>{{$data->bahan->material_name}}</td> --}}
                        <td>
                            <a href="/bahanbaku/add" class="btn btn-sm btn-success float-lg-center">Beli Bahan</a>
                            <a href="/bahanbaku" class="btn btn-sm btn-warning float-lg-center">Cek</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
        
        <div>
            Showing
            {{ $order->firstItem()}}
            to
            {{ $order->lastItem()}}
            of
            {{ $order->total()}}
            entries
        </div>

        <div class="d-flex justify-content-end">
        
            {{ $order->links() }}
        

        </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
    
  </section>


  

@endsection