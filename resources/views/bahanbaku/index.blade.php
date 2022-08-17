@extends('layouts.v_main')

{{-- @section('container')
    <h1>Pemesanan</h1>
@endsection --}}

@section('container')

    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">

                    @if (in_array(auth()->user()->role, [1, 3]))
                        <a href="/bahanbaku" class="btn btn-primary float-lg-right">Check All</a>
                    @endif
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible col-lg-6">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('pesan') }}.
                        </div>
                    @endif

                    <form class="form-inline ml-3" action="/bahanbaku/pemenuhan">
                        <div class="input-group input-group-sm float-lg-left">
                            <input class="form-control form-control-navbar" type="search" placeholder="no.nota"
                                name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <br>
                <div class="card-body">
                    @if ($invoice->count())
                        <div class="col-12 table-responsive">
                            <table class="table table-striped" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pre-Order</th>
                                        <th>No Nota</th>
                                        <th>Bahan</th>
                                        <th>Jenis Order</th>
                                        <th>Qty</th>
                                        {{-- <th>Pembayaran</th> --}}
                                        {{-- <th>Status Bahan</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($invoice as $key => $data)
                                        <tr>
                                            <td>{{ $invoice->firstItem() + $key }}</td>
                                            <td>{{ $data->pemesanan->no_po }}</td>
                                            <td>{{ $data->no_inv }}</td>
                                            <td>{{ $data->pemesanan->bahan->material_name }}</td>
                                            <td>{{ $data->pemesanan->tipe->service_name }}</td>
                                            <td>{{ $data->pemesanan->qty }}</td>
                                            {{-- <td>{{ $data->status == 1 ? 'Lunas' : 'Down Payment' }}</td> --}}
                                            
                                            <td>
                                                @if (in_array(auth()->user()->role, [1, 3]))
                                                    <a href="/bahanbaku/add?no_po={{ $data->pemesanan->no_po }}&no_inv={{ $data->no_inv }}"
                                                        class="btn btn-sm btn-success float-lg-center">+ Bahan</a>
                                                @endif
                                                {{-- <a href="/bahanbaku/detail_pemenuhan/{{ $data->id }}"
                                                    class="btn btn-sm btn-secondary"><i class="nav-icon fas fa-eye"></i></a> --}}
                                                {{-- <a href="/bahanbaku" class="btn btn-sm btn-warning float-lg-center">Cek</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div>
                                Showing
                                {{ $invoice->firstItem() }}
                                to
                                {{ $invoice->lastItem() }}
                                of
                                {{ $invoice->total() }}
                                entries
                            </div>

                            <div class="d-flex justify-content-end">

                                {{ $invoice->links() }}


                            </div>

                        </div>
                        <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        @else
            <p class="text-center">Pencarian tidak ditemukan</p>
            @endif

    </section>




@endsection
