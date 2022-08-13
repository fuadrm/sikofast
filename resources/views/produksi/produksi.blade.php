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

                    
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible col-lg-6">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('pesan') }}.
                        </div>
                    @endif

                    <form class="form-inline ml-3" action="/bahanbaku/pemenuhan">
                        <div class="input-group input-group-sm float-lg-left">
                            <input class="form-control form-control-navbar" type="search" placeholder="cari..no.po.."
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
                                        <th>Status</th>
                                        {{-- <th>Status Bahan</th> --}}
                                        @if (in_array(auth()->user()->role, [1,4]))
                                        <th>Action</th>
                                        @endif
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
                                            
                                            @php
                                                $status_order = '';
                                                switch ((int) $data->pemesanan->status_order) {
                                                    case 0:
                                                        $status_order = 'Print';
                                                        break;
                                                
                                                    case 1:
                                                        $status_order = 'Finishing';
                                                        break;
                                                
                                                    case 2:
                                                        $status_order = 'Selesai';
                                                        break;
                                                
                                                    default:
                                                        $status_order = 'Tidak Diketahui';
                                                        break;
                                                }
                                            @endphp
                                            <td>{{ $status_order }}</td>

                                            {{-- <td>{{ "Rp " . number_format($data['total'], 0, ",", "."); }}</td>
                            <td>{{$data->bahan->material_name}}</td> --}}
                                            @if (in_array(auth()->user()->role, [1,4]))
                                            <td>
                                                @if (in_array(auth()->user()->role, [1,4]))
                                                    {{-- <a href=""
                                                        class="btn btn-sm btn-success float-lg-center">Ubah Status</a> --}}

                                                    <button type="button"
                                                        onclick="document.querySelector('#id').value='{{ $data->pemesanan->id }}';document.querySelector('#status_order').value='{{ $data->pemesanan->status_order }}';"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        Proses
                                                    </button>
                                                @endif

                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status Produksi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('produksi.status') }}" id="form-status" method="post">
                                                @csrf
                                                <div class="form-group">

                                                    <input type="hidden" id="id" name="id">
                                                    <select name="status_order" id="status_order" class="form-control"
                                                        style="width: 100%;">


                                                        <option value="0">Print</option>
                                                        <option value="1">Finishing</option>
                                                        <option value="2">Selesai</option>

                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" form="form-status" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
