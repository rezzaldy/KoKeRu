@extends('layouts.app', ['activePage' => 'report', 'titlePage' => __('Report')])

@section('content')
<div class="card-body mt-5">
        <div class="form-group">
            <label for="label">Tanggal Awal</label>
            <input type="date" name="date_awal" id="date_awal" class="form-control">
        </div>
        <div class="form-group">
            <label for="label">Tanggal Akhir</label>
            <input type="date" name="date_akhir" id="date_akhir" class="form-control">
        </div>
        <div class="form-group">
            <label for="label">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="u">Semua</option>
                <option value="sudah">Sudah</option>
                <option value="belum">Belum</option>
            </select>
        </div>
            <a href="" onclick="this.href='/cetak_pdf_tgl/'+document.getElementById('date_awal').value + '/' + document.getElementById('date_akhir').value + '/' + document.getElementById('status').value" target="_blank" class="btn btn-success animation-on-hover">Cetak</a>
</div>
@endsection