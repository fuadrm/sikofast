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
                    <h3 class="card-title"><b>Nota</b></h3>


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
                    <form action="/pembayaran/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">


                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Nota</label>
                                            <input name="no_inv" class="form-control" value="{{ $no_inv }}" readonly>

                                        </div>
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Total Pembayaran</label>
                                            <input name="" class="form-control" value="{{ 'total' }}"
                                                id="total" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nominal Pembayaran (DP)</label>
                                            <input name="down_payment" class="form-control"
                                                value="{{ old('down_payment') }}" id="down_payment" placeholder="" readonly>

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
                                            <label>No PO</label>
                                            <select name="order_no_po" id="order_no_po"
                                                class="form-control select2 select2-danger order_no_po"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                value="{{ old('order_no_po') }}">
                                                @foreach ($order as $order)
                                                    <option value="{{ $order->id }}">{{ $order->no_po }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger">
                                                @error('order_no_po')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Pembuatan</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="date" name="started_at_inv" class="form-control"
                                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                    value="{{ old('started_at_inv') }}">
                                                <div class="text-danger">
                                                    @error('started_at_inv')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>




                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            <a href="/pembayaran" class="btn btn-secondary float-lg-left">Kembali</a>
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
            const getDetailData = (id) => {

                $.ajax({
                    url: '{{ url('/pembayaran/getDetailNoPo') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    error: function() {
                        alert('Terjadi kesalahan');
                    },
                    success: function(data) {
                        if (data) {
                            $('#down_payment').val(data.data.total / 2)
                            $('#total').val(data.data.total)
                        }
                    }
                });
            }

            getDetailData($('.order_no_po').find(':selected').val())

            $('.order_no_po').change(function() {
                const optionSelected = $(this).find("option:selected");
                getDetailData(optionSelected.val())
            });
        </script>
    @endpush

@endsection
