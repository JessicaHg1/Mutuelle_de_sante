<div>
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Mutuelles</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-building"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $mutuelles }}</h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Utilisateurs</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $users }}</h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Adhérents</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-user-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $adherents }}</h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Personnes à charge</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $benef }}</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Prestataires</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-hospital-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $prestataires }}</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Prestations</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-umbrella"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $prestations }}</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div>

          </div>
            

        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Nombre d'utilisateurs ajouté dans le mois</h5>

                <!-- Line Chart -->
                <canvas id="lineChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 333px; width: 666px;" width="666" height="333"></canvas>
                <script>
                    var mois = <?php echo json_encode($mois) ?>;
                    var users = <?php echo json_encode($usersNb) ?>;
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#lineChart'), {
                      type: 'line',
                      data: {
                        labels: mois,
                        datasets: [{
                          label: 'Line Chart',
                          data: users,
                          fill: false,
                          borderColor: 'rgb(75, 192, 192)',
                          tension: 0.1
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  });
                </script>
                <!-- End Line CHart -->

              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Nombre de mutuelles enregistré par région</h5>

                <!-- Bar Chart -->
                <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 333px; width: 666px;" width="666" height="333"></canvas>
                <script>

                  var mutuelleData = <?php echo json_encode($mutuelleData); ?>;
                  document.addEventListener("DOMContentLoaded", () => {
                    new Chart(document.querySelector('#barChart'), {
                      type: 'bar',
                      data: {
                        labels: ['Maritime', 'Plateaux', 'Centrale', 'Kara', 'Savanes'],
                        datasets: [{
                          label: 'Bar Chart',
                          data: mutuelleData,
                          backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                          ],
                          borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                          ],
                          borderWidth: 1
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  });
                </script>
                <!-- End Bar CHart -->

              </div>
            </div>
          </div>

        </div>
    </section>    
</div>

<script type="tet/javascript">



</script>
<script src="{{ asset('asset/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('asset/vendor/echarts/echarts.min.js') }}"></script>
