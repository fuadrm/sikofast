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
          <h3 class="card-title"><b>Invoice</b></h3>

          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{route('pembayaran.update',$invoice->id)  }}" method="POST" enctype="multipart/form-data">
            @method ('put')
            @csrf
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">

                
                  <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Invoice</label>
                        <input name="" class="form-control" value="{{old('no_inv', $invoice->no_inv)}}" readonly>
                        
                      </div>
                    <div class="form-group">

                      <label for="exampleInputEmail1">Nominal Pembayaran (DP)</label>
                      <input name="down_payment" class="form-control" value="{{old('down_payment', $invoice->down_payment)}}" readonly>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nominal Pembayaran (Lunas)</label>
                      <input name="price_invoice" class="form-control" id="price_invoice" value="{{old('price_invoice', $invoice->price_invoice)}}">
                      
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
                        
                            <label for="exampleInputEmail1">No PO</label>
                            <input name="" class="form-control" value="{{$invoice->pemesanan->no_po}}" readonly>
                          
                      </div>
                      <div class="form-group">

                        <label for="exampleInputEmail1">Total Pembayaran</label>
                        <input name="down_payment" class="form-control" value="{{$invoice->pemesanan->total}}" readonly>
                        
                      </div>
                    <div class="form-group">
                        <label>Tanggal Pembuatan</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="" name="" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{old('created_at', $invoice->created_at)}}" readonly>
                          
                      </div>
                    
                  </div>
                  <!-- /.card-body -->
              </div>
            </div>
            
          </div>
          <div class="card-footer col-12" >
            <a href="/pembayaran" class="btn btn-secondary float-left">Kembali</a>
            <button type="submit" class="btn btn-primary float-right" >Submit</button>
            {{-- <button type="submit" class="btn btn-primary float-left">Kembali</button> --}}
          </div>
          </form>
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>

  @push('script')
    <script>
      // Global variable
      let total = {{$invoice->pemesanan->total}}
      let dp = {{$invoice->down_payment}}

      $('#price_invoice').on('change',()=>{
        let price_invoice = $('#price_invoice').val()

        let validate = Number(total)-Number(dp)-Number(price_invoice)

        if(validate < 0) {
          $('#price_invoice').val(Number(total)-Number(dp))
          alert('Sisa Pelunasan melebihi total pembayaran')
        }
          
      })


      
    </script>
  @endpush

@endsection
