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
                <h4 class="card-title mt-2" >Penambahan Distribusi Ruangan</h4>
              </div>
              <div class="col-md-6">
               
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="table-responsive">
          
                <form method="POST" action="add">
                  @csrf
                  <div class="form-group">
                    <label >Nama Cleaning Service</label>
                    <select name="id_cs" id="id_cs" class="form-control ">
                        <option value="">--Pilih Cleaning Service--</option>
                        @foreach ($cs as $cs)
                        <option value="{{$cs->id_cs}}">{{ $cs->nama }}</option>
                        @endforeach
                        

                    </select>
    
                  </div>
                  <div class="form-group">
                  
                    <label >Nama Ruangan</label>
                    <select name="id_ruangan" id="id_ruangan" class="form-control ">
                      <option value="">--Pilih Ruangan--</option>
                      @foreach ($ruang as $ruang)
                      <option value="{{$ruang->id_ruangan}}">{{ $ruang->ruangan }}</option>
                      @endforeach
                      
                      </select>
              
                  </div>

                  <button type="submit" onclick="return confirm('Apakah yakin ingin menambahkan data?')" class="btn btn-primary">Tambah</button>
                  <a href="/distribusi" class="btn btn-primary">Kembali</a>

            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection