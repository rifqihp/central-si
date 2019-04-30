@extends('backend.layouts.app')

@section('breadcrumb')
    {!! cui_breadcrumb([
        'Home' => route('admin.home'),
        'Pendidikan' => route('admin.pendidikan.index'),
        'Index' => '#'
    ]) !!}
@endsection 

@section('toolbar')
    {!! cui_toolbar_btn(route('admin.pendidikan.create'), 'icon-plus', 'Tambah Riwayat Pendidikan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong>List Riwayat Pendidikan</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">
                           
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $pendidikans->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">User Id</th>
                            <th class="text-center">Jenjang Id</th>
                            <th class="text-center">Nama Sekolah</th>
                            <th class="text-center">Jurusan</th>
                            <th class="text-center">Tahun Masuk</th>
                            <th class="text-center">Tahun Lulus</th>
                            <th class="text-center">Lokasi Sekolah</th>
                            <th class="text-center">Nomor Ijazah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pendidikans as $pendidikan)
                            <tr>
                                <td class="text-center">{{ $pendidikan->user_id }}</td>
                                <td class="text-center">{{ $pendidikan->jenjang_id }}</td>
                                <td class="text-center">{{ $pendidikan->nama_sekolah }}</td>
                                <td class="text-center">{{ $pendidikan->jurusan }}</td>
                                <td class="text-center">{{ $pendidikan->tahun_masuk }}</td>
                                <td class="text-center">{{ $pendidikan->tahun_lulus }}</td>
                                <td class="text-center">{{ $pendidikan->lokasi_sekolah }}</td>
                                <td class="text-center">{{ $pendidikan->nomor_ijazah }}</td>
                                <td class="text-center">
                                    {!! cui_btn_view(route('admin.pendidikan.show', [$pendidikan->id])) !!}
                                    {!! cui_btn_edit(route('admin.pendidikan.edit', [$pendidikan->id])) !!}
                                    {!! cui_btn_delete(route('admin.pendidikan.destroy', [$pendidikan->id]), "Anda yakin akan menghapus data riwayat pendidikan ini?") !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $pendidikans->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->

                {{-- CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
