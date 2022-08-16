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
                    <h3 class="card-title"><b>Tipe Jasa Servis</b></h3>

                    {{-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/tipe_order/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="">Tipe Jasa Servis</label>
                                            <input name="service_name" class="form-control"
                                                value="{{ old('service_name') }}"id="">
                                            <div class="text-danger">
                                                @error('service_name')
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
                                            <input name="price_service" class="form-control"
                                                value="{{ old('price_service') }}"id="">
                                            <div class="text-danger">
                                                @error('price_service')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <!-- /.form-group -->
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            <a href="/tipe_order" class="btn btn-secondary float-lg-left">Kembali</a>
                        </div>
                    </form>
                    <!-- /.row -->
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
