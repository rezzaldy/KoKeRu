@extends('layouts.appcs', ['class' => 'off-canvas-sidebar', 'activePage' => 'cs', 'titlePage' => __('Dashboard CS')])

@section('content')
<div class="">
  <div class="container" style="height: auto;">
    <div class="row justify-content-center">
      <div class="col-lg-9 col-md-10">
        <h2 class="text-center">{{ __('Monitoring Kebersihan dan Kerapihan Ruangan') }}</h2>
        <h3 class="text-center">
          <script>
            var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            document.write(hari[new Date().getDay()])
          </script>, 
          <script>
            document.write(new Date().getDate())
          </script> 
          <script>
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            document.write(months[new Date().getMonth()])
          </script> 
          <script>
            document.write(new Date().getFullYear())
          </script>
        </h3>
      </div>
    </div>
    <div class="row justify-content-center mt-3">
      @foreach($cs as $cs)
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats task">
        <?php $status = $cs->status ?>
        @if($status == "sudah")
          <div class="card-header card-header-success card-header-icon">
        @else
          <div class="card-header card-header-danger card-header-icon">
        @endif
            <div class="card-icon">
              <h3><b>{{$cs->ruangan}}</b></h3>
            </div>
            <p class="card-category">{{$cs->nama}}</p>
            @if($status == "sudah")
              <h3 class="card-title card-title-success">SUDAH</h3>
            @else
              <h3 class="card-title card-title-danger">BELUM</h3>
            @endif
          </div>
          <div class="container mt-1"><hr></div>
          @if($status == "sudah")
          <?php 
            $bukti = array($cs->bukti1, $cs->bukti2, $cs->bukti3, $cs->bukti4, $cs->bukti5);
            $id = $cs->id_ruang;
          ?>
          @for($i = 0; $i < 5; $i++)
            @if($bukti[$i] != NULL)
              <?php 
                $f = finfo_open();
                $data = finfo_buffer($f, $bukti[$i], FILEINFO_MIME_TYPE);
                $split = explode( '/', $data );
                $type = $split[1];
              ?>
              @if($type != 'mp4')
                <div class="card-footer monitor img-ava" style="background-image: url('data:image/jpg;base64, {{base64_encode($bukti[$i])}}');">
                  <div class="stats">
                  <button type="button" class="btn btn-primary btn-sm btn-modal" data-toggle="modal" data-target="#myModal{{$id}}">UPLOAD</button>
              @else
                <div class="card-footer monitor img-ava">
                  <div class="stats">
                    <video width="300" height="125" muted>
                      <source src="data:video/mp4;base64, {{base64_encode($bukti[$i])}}" type="video/mp4">
                    </video>
                    <button type="button" class="btn btn-primary btn-sm btn-modal" data-toggle="modal" data-target="#myModal{{$id}}" style="z-index: 1000; position: absolute; transform: translate(107px,40px);">Upload</button>
              @endif
              @break
            @endif
          @endfor
            </div>
          </div>
          <div class="modal fade" id="myModal{{$id}}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="/store">
                  @csrf
                    Select image to upload:<br>
                    <input type="file" name="bukti1" id="bukti1"><br>
                    <input type="file" name="bukti2" id="bukti2"><br>
                    <input type="file" name="bukti3" id="bukti3"><br>
                    <input type="file" name="bukti4" id="bukti4"><br>
                    <input type="file" name="bukti5" id="bukti5">
                    <input type="hidden" name="id_ruangan" value="{{$id}}">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-modal btn-sm" value="Submit" name="submit">Upload</button>
                    <button type="button" class="btn btn-danger btn-modal btn-sm" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @else
          <?php 
            $id = $cs->id_ruang;
          ?>
          <div class="card-footer monitor">
            <div class="stats">
              <button type="button" class="btn btn-primary btn-sm btn-modal" data-toggle="modal" data-target="#myModal{{$id}}">Upload</button>
            </div>
          </div>
          <div class="modal fade" id="myModal{{$id}}" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data" action="/store">
                  @csrf
                    Select image to upload:<br>
                    <input type="file" name="bukti1" id="bukti1"><br>
                    <input type="file" name="bukti2" id="bukti2"><br>
                    <input type="file" name="bukti3" id="bukti3"><br>
                    <input type="file" name="bukti4" id="bukti4"><br>
                    <input type="file" name="bukti5" id="bukti5">
                    <input type="hidden" name="id_ruangan" value="{{$id}}">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-modal btn-sm" value="Submit" name="submit">Upload</button>
                    <button type="button" class="btn btn-danger btn-modal btn-sm" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
