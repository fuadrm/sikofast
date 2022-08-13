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
                    <h3 class="card-title"><b>Tipe Order</b></h3>

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
                    <form action="/tipe_order/update/{{ $tipe->id }}" method="POST" enctype="multipart/form-data">
                        @method ('put')
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="">Harga</label>
                                            <input name="price_service" class="form-control"
                                                value="{{ old('price_service', $tipe->price_service) }}"id="">
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
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tipe Servis</label>
                                            <input name="service_name" class="form-control"
                                                value="{{ old('service_name', $tipe->service_name) }}" id="">
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
