<?php
require_once "db/db.php";
?>


<div class="container justify-content-center" style="max-width: 1080px;">
  <h4>Report Absen Online</h4>
  <br>

  <form method="get">
    <label>PILIH TANGGAL</label>

    <div class="input-group col-md-4">
      <input type="text" class="form-control input-md tanggal" name="waktu">
      <div class="input-group-append">
        <input type="submit" class="btn btn-primary" value="FILTER">
        <a href="am_reportabsenonline.php" class="btn btn-warning">RESET</a>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $(".tanggal").datepicker({
          format: "yyyy-mm-dd"
        });
      });
    </script>

  </form>
  <hr />
  <?php
  $filter_waktu = isset($_GET['waktu']) ? "waktu LIKE '" . $_GET['waktu'] . "%'" : "1=1";
  $query_chart = "SELECT nama, COUNT(*) AS total_absen FROM peta WHERE $filter_waktu GROUP BY nama ";
  $get_chart = $db->query($query_chart);
  $chart_data = json_encode($get_chart->fetchAll());
  ?>
  <div id="graph_data" class="col-md-8 shadow">
    <canvas id="graph_box"></canvas>
  </div>
  <script>
    function loadChart() {
      var data_chart = <?= $chart_data; ?>;
      var ctx = document.getElementById('graph_box').getContext('2d');
      var arr_nama = [];
      var arr_data = [];
      
      $(data_chart).each(function(i, val){
        arr_nama.push(val.nama);
        arr_data.push(val.total_absen);
      });

      var chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: arr_nama,
          datasets: [{
            label: 'Graph Absensi',
            backgroundColor: "#ff3300",
            borderColor: '#2980b9',
            data: arr_data
          }]
        }
      });
    }

    document.addEventListener("DOMContentLoaded", function(){
      loadChart();
    });
  </script>
  <hr />
  <div class="container">
    <div class="table-responsive">
      <table class="table">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nik</th>
              <th scope="col">Nama</th>
              <th scope="col">Nama Toko</th>
              <th scope="col">Waktu</th>
              <th scope="col">CekPoint</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_GET['waktu'])) {
              $query = $db->query("SELECT * FROM peta WHERE waktu LIKE '" . $_GET['waktu'] . "%'");
            } else {
              $query = $db->query("SELECT * FROM peta ");
            }
            foreach ($query->fetchAll() as $pencarian => $val) {
              echo "<tr>";
              echo "<td>" . $val['id'] . "</td>";
              echo "<td>" . $val['nik'] . "</td>";
              echo "<td>" . $val['nama'] . "</td>";
              echo "<td>" . $val['nm_toko'] . "</td>";
              echo "<td>" . $val['waktu'] . "</td>";
              echo "<td>" . $val['cekpoin'] . "</td>";
              echo "</tr>";
            }

            ?>
          </tbody>
        </table>
      </table>
    </div>
  </div>
</div>