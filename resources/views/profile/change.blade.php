@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-md-6">
                <h4 class="card-title mt-2" >Pengubahan Distribusi Ruangan</h4>
              </div>
              <div class="col-md-6">
               
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="table-responsive">
          
                <form method="POST" action="/change">
                  @csrf
                  <div class="form-group">
                    <label >Cleaning Service</label>
                    <select name="id_cs" id="id_cs" class="form-control ">
                        <option value="">--Pilih Cleaning Service--</option>
                        @foreach ($cs as $cs)
                        <option value="{{$cs->id_cs}}">{{ $cs->nama }}</option>
                        @endforeach
                        

                    </select>
    
                  </div>
                  <div class="form-group">
                  
                    
                    
                      
                      @foreach ($ruang as $ruang)
                      <label ><b>{{$ruang->ruangan}} </b></label>
                      <input type="hidden" name="id_ruangan" value="{{$ruang->id_ruangan}}">
                      @endforeach
                      
                      
              
                  </div>

                  <button type="submit" onclick="return confirm('Apakah anda yakin untuk mengubah data ini?')" class="btn btn-primary">Ubah</button>
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