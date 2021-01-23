<!-- @extends('layouts.app', ['activePage' => 'report', 'titlePage' => __('Report')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table tablesorter " id="">
                    <caption>LAPORAN HARIAN KOKERU</caption>
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Ruang</th>
                        <th scope="col">Nama CS</th>
                        <th scope="col">Status Ruangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($cs as $db)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$db->ruangan}}</td>
                            <td>{{ $db->nama }}</td>
                            <td>{{ $db->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Print</title>
</head>
<body>
    <h1 class="text-center">Laporan Harian</h1>
    <div class="text-center">
      <p id="demo"></p>
      <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d;
      </script>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <tr class="text-center">
                      <th scope="col">No.</th>
                      <th scope="col">Nama Ruang</th>
                      <th scope="col">Nama CS</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach ($cs as $cs)
                  <tr>
                  <td>{{ $loop->iteration }}</td>
                        <td>{{$cs->ruangan}}</td>
                        <td>{{$cs->nama }}</td>
                        <td>{{$cs->status }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        window.print();
      </script>
</body>
</html>