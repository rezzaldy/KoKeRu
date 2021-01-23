@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Distribusi')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-md-6">
                <h4 class="card-title mt-2" >Distribusi Kebersihan Ruangan</h4>
              </div>
              <div class="col-md-6">
                <a href="addDistribusi" class="btn btn-sm btn-add float-right" >+ Add</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CS</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cs as $cs)
                  <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$cs->nama}}</td>
                    <td>{{$cs->ruangan}}</td>
                    <td>
                      <a href="editDistribusi/{{$cs->id_ruang}}" class="btn btn-sm btn-warning">Edit</a>
                      <a href="deleteDistribusi/{{$cs->id}}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection