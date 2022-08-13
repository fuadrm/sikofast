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

                    {{-- @if (in_array(auth()->user()->role, [1, 3]))
                <a href="/pembayaran/add" class="btn btn-primary float-lg-right">+</a>
                @endif --}}
                    @if (session('pesan'))
                        <div class="alert alert-success alert-dismissible col-lg-6">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('pesan') }}.
                        </div>
                    @endif

                </div><br>
                {{-- <div class="ml-3">
                <h5>Data Pembayaran</h5>
                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 15%;">
                    
                    <option><a href="" class="btn btn-secondary float-lg-left ml-3">Down Payment</a></option>
                    <option><a href="" class="btn btn-success float-lg-left ml-3">Lunas</a></option>
                </select>
            </div> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data Pembayaran
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/pembayaran/lunas">
                            <i class="bi bi-layout-text-sidebar-reverse"></i>&ensp; Lunas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/pembayaran">
                            <i class="bi bi-layout-text-sidebar-reverse"></i>&ensp; Default</a>
                        {{-- <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <i class="bi bi-box-arrow-in-left"></i>&ensp; Logout</button>
                  </form> --}}


                    </div>
                </li>
                <br>
                <div class="col-12 table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Nota</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status Pembayaran</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($invoice as $key => $data)
                                <tr>
                                    <td>{{ $invoice->firstItem() + $key }}</td>
                                    <td>{{ $data->no_inv }}</td>
                                    <td>{{ $data->started_at_inv }}</td>
                                    <td>{{ 'Rp ' . number_format($data->pemesanan['total'], 0, ',', '.') }}</td>
                                    <td>{{ $data->status_inv == 0 ? 'Belum Lunas' : '' }}</td>
                                    <td>
                                        <a href="/pembayaran/detail_dp/{{ $data->id }}"
                                            class="btn btn-sm btn-success"><i class="nav-icon fas fa-eye"></i></a>
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
            <div class="card-footer">
                <a href="/pembayaran" class="btn btn-secondary float-lg-left">Kembali</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
