@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => ' Detail Data Kemiskinan'])
<div class="row mt-4 mx-4">
    <div class="position-relative">
        <h5 class="text-white"> Detail Data Kemiskinan</h5>
    </div>
</div>

<div class="container mt-4">
    <div class="card border">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">NIK</strong>
                        <p>{{ $poverty->nik ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">NO KK</strong>
                        <p>{{ $poverty->kk ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">NAMA LENGKAP</strong>
                        <p>{{ $poverty->nama ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">JENIS KELAMIN</strong>
                        <p>{{ $poverty->jk ?: '' }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="form-group">
                            <strong for="alamat">ALAMAT </strong>
                            <p>{{ $poverty->alamat ?: '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <div class="form-group">
                            <strong for="alamat">RT </strong>
                            <p>{{ $poverty->rt ?: '' }}</p>
                        </div>
                        <div class="form-group">
                            <strong for="alamat">RW </strong>
                            <p>{{ $poverty->rw ?: '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">KECAMATAN</strong>
                        <p>{{ $poverty->kecamatan ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">DESA</strong>
                        <p>{{ $poverty->desa ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">TEMPAT LAHIR</strong>
                        <p>{{ $poverty->tempat_lahir ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">TANGGAL LAHIR</strong>
                        <p>{{ $poverty->tgl ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">STATUS KEPALA KELUARGA</strong>
                        <p>{{ $poverty->status ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">SETATUS PENDIDIKAN</strong>
                        <p>{{ $poverty->status_pendidikan ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">PENDIDIKAN TERAKHIR</strong>
                        <p>{{ $poverty->pendidikan_terakhir ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">SETATUS PEKERJAAN</strong>
                        <p>{{ $poverty->pekerjaan ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">JENIS PEKERJAAN</strong>
                        <p>{{ $poverty->jenis_pekerjaan ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">BANGUNAN TEMPAT TINGGAL</strong>
                        <p>{{ $poverty->tempat_tinggal ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">SUMBER AIR MINUM</strong>
                        <p>{{ $poverty->sumber_air_minum ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">SUMBER PENERANGAN UTAMA</strong>
                        <p>{{ $poverty->sumber_penerangan_utama ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">BAHAN BAKAR MEMASAK</strong>
                        <p>{{ $poverty->bahan_bakar_memasak ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="name">FASILITAS BAB</strong>
                        <p>{{ $poverty->bab ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="desil">DESIL</strong>
                        <p>{{ $poverty->desil ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="dtks">TERDAPTAR DTKS ?</strong>
                        <p>{{ $poverty->dtks ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong for="penghasilan_perbulan">PENGHASILAN PERBULAN</strong>
                        <p>{{ $poverty->penghasilan_perbulan ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong for="bantuan_diterima">BANTUAN YANG DITERIMA</strong>
                        <p>{{ $poverty->bantuan_diterima ?: '' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group d-flex flex-column thumbnail">
                        <strong for="name">FOTO DIRI</strong>
                        @if ($poverty->foto_diri)
                        <img src="{{ asset('storage/foto_diri/' . $poverty->foto_diri) }}" alt="Foto Diri"
                            style="max-width: 50%; height: auto;">
                        @else
                        <p>Tidak ada foto diri</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group d-flex flex-column thumbnail">
                        <strong for="name">FOTO RUMAH</strong>
                        @if ($poverty->foto_rumah)
                        <img src="{{ asset('storage/foto_rumah/' . $poverty->foto_rumah) }}" alt="Foto Rumah"
                            style="max-width: 50%; height: auto;">
                        @else
                        <p>Tidak ada foto diri</p>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection