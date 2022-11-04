
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
   <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/dashboard.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
   <title>Admin Dashboard</title>
</head>

<body>
   <?php include 'nav-bar.php' ?>

   <!-- Begin Page Content -->
   <div class="container-fluid p-3 px-5">


      <div class="row">
      <div class="col-12 mb-3">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="mb-0 text-dark font-weight-bold py-2">Dashboard</h1>
          <a href="#" onclick="printContent('print');" class="d-none d-sm-inline-block btn filter-btn inflation-btn shadow-sm p-2 border-0"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
      </div>
      <div class="col-lg col-sm-12">
        <div class="row m-0 p-0">
          
          <!-- REGISTERED USERS -->
          <div class="col-xl-6 col-md-6 shadow-0 mb-3">
            <div class="card border-0 shadow-none h-100 p-1 bg-white text-white">
              <div class="card-body rounded p-3 pb-5" style="background:#008080d6;">
                <div class="d-flex justify-content-between m-0 p-0">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">
                    Registered User
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $reg_user['total'];?></div>
                  </div>
                  <i class="fad fa-users fa-lg m-1"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-6 col-md-6 shadow-0 mb-3">
            <div class="card border-0 shadow-none h-100 p-1 bg-white text-white">
              <div class="card-body rounded p-0" style="background:#008080d6;">
                <div class="d-flex">
                  <div class="text-xs font-weight-bold text-uppercase mb-1 m-3">
                    Monthly Earnings
                    <div class="h5 mb-0 font-weight-bold text-gray-800">₱ <span id="_earnings"><?= $earnings[0]['total'];?></div>
                  </div>
                  <ul class="navbar-nav ms-auto ms-md-0 me-1 mt-2 ps-4 pt-0 me-lg-1">
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span id = "_year"><?=strtoupper(date('Y'));?></span>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="_year">
                                <?php for($i=2022;$i<=(int)date('Y');$i++){ ?>
                                  <li><a class="dropdown-item" href="" id = "Y_<?=$i;?>"><?=$i;?></a></li>
                                  <?php } ?>
                              </ul>
                          </li>
                      </ul>
                      <ul class="navbar-nav ms-auto ms-md-0 me-3 mt-2 me-lg-4">
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span id = "_month"><?=strtoupper(date('F'));?></span>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="opt">
                                  <li><a class="dropdown-item" href="" id = "_1">JANUARY</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_2">FEBRUARY</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_3">MARCH</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_4">APRIL</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_5">MAY</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_6">JUNE</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_7">JULY</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_8">AUGUST</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_9">SEPTEMBER</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_10">OCTOBER</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_11">NOVEMBER</a></li>
                                  <li><a class="dropdown-item" href="#!" id = "_12">DECEMBER</a></li>
                              </ul>
                          </li>
                      </ul>
                  <i class="pt-4 align-end fas fa-coins fa-2x text-gray-300"></i>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- REGISTERED USERS -->
          <div class="col-xl-6 col-md-6 shadow-0 mb-3">
            <div class="card border-0 shadow-none h-100 p-1 bg-white text-white">
              <div class="card-body rounded p-3 pb-5" style="background:#008080d6;">
                <div class="d-flex justify-content-between m-0 p-0">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">
                    Successful Transaction
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$transaction['successful']['total'];?></div>
                  </div>
                  <i class="fad fa-box-check fa-lg m-1"></i>
                </div>
              </div>
            </div>
          </div>


          <!-- REGISTERED USERS -->
          <div class="col-xl-6 col-md-6 shadow-0 mb-3">
            <div class="card border-0 shadow-none h-100 p-1 bg-white text-white">
              <div class="card-body rounded p-3 pb-5" style="background:#008080d6;">
                <div class="d-flex justify-content-between m-0 p-0">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">
                    Unfinished transaction
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$transaction['pending']['total'] + $transaction['delivery']['total'] + $transaction['process']['total'];?></div>
                  </div>
                  <i class="fad fa-spinner fa-lg m-1"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-1"></div>
      <div class="col-lg-4 col-sm-12">
        <div class="card border-0 p-0 m-0">
          <!-- Card Header - Dropdown -->
          <div class="card-header border-0 d-flex flex-row align-items-center justify-content-between text-white mt-1" style="background:#008080d6;">
            <h6 class="m-0 font-weight-bold">Ratings Overview</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body p-0 m-0">
                                  <?php if($average['rating']){?>
                                    <div class="inner p-3" style="background-color: #0048ff12;">
                                    <div class="rating">
                                      <span class="rating-num"><?=number_format($average['rating'],1)?></span>
                                      <div class="">
                                      <fieldset class="rate">
                                    <input type="radio" id="rating10" name="rating" value="10" <?php if($average['rating']==5.0) echo 'checked' ?> disabled/><label for="rating10" title="5 stars"></label>
                                    <input type="radio" id="rating9" name="rating" value="9" <?php if($average['rating']>=4.5&&$average['rating']<5.0) echo 'checked' ?> disabled/><label class="half" for="rating9" title="4 1/2 stars"></label>
                                    <input type="radio" id="rating8" name="rating" value="8" <?php if($average['rating']>=4.0&&$average['rating']<4.5) echo 'checked' ?> disabled/><label for="rating8" title="4 stars"></label>
                                    <input type="radio" id="rating7" name="rating" value="7" <?php if($average['rating']>=3.5&&$average['rating']<4.0) echo 'checked' ?> disabled/><label class="half" for="rating7" title="3 1/2 stars"></label>
                                    <input type="radio" id="rating6" name="rating" value="6" <?php if($average['rating']>=3.0&&$average['rating']<3.5) echo 'checked' ?> disabled/><label for="rating6" title="3 stars"></label>
                                    <input type="radio" id="rating5" name="rating" value="5" <?php if($average['rating']>=2.5&&$average['rating']<3.0) echo 'checked' ?> disabled/><label class="half" for="rating5" title="2 1/2 stars"></label>
                                    <input type="radio" id="rating4" name="rating" value="4" <?php if($average['rating']>=2.0&&$average['rating']<2.5) echo 'checked' ?> disabled/><label for="rating4" title="2 stars"></label>
                                    <input type="radio" id="rating3" name="rating" value="3" <?php if($average['rating']>=1.5&&$average['rating']<2.0) echo 'checked' ?> disabled/><label class="half" for="rating3" title="1 1/2 stars"></label>
                                    <input type="radio" id="rating2" name="rating" value="2" <?php if($average['rating']>=1.0&&$average['rating']<1.5) echo 'checked' ?> disabled/><label for="rating2" title="1 star"></label>
                                    <input type="radio" id="rating1" name="rating" value="1" <?php if($average['rating']>=.5&&$average['rating']<1.0) echo 'checked' ?> disabled/><label class="half" for="rating1" title="1/2 star"></label>

                                </fieldset>
                                      </div>
                                      <div class="rating-users">
                                        <i class="icon-user"></i> <?=($stars['one']['rating']+$stars['two']['rating']+$stars['three']['rating']+$stars['four']['rating']+$stars['five']['rating'])?> total
                                      </div>
                                    </div>
                                    
                                    <div class="histo">
                                      <div class="five histo-rate">
                                        <span class="histo-star">
                                          <i class="active fa fa-star"></i> 5</span>
                                        <span class="bar-block">
                                          <span id="bar-five" class="bar">
                                            <span><span id="five"><?=$stars['five']['rating']?></span></span>&nbsp;
                                          </span> 
                                        </span>
                                      </div>
                                      
                                      <div class="four histo-rate">
                                        <span class="histo-star">
                                          <i class="active fa fa-star"></i> 4</span>
                                        <span class="bar-block">
                                          <span id="bar-four" class="bar">
                                            <span><span id="four"><?=$stars['four']['rating']?></span></span>&nbsp;
                                          </span> 
                                        </span>
                                      </div> 
                                      
                                      <div class="three histo-rate">
                                        <span class="histo-star">
                                          <i class="active fa fa-star"></i> 3</span>
                                        <span class="bar-block">
                                          <span id="bar-three" class="bar">
                                            <span><span id="three"><?=$stars['three']['rating']?></span></span>&nbsp;
                                          </span> 
                                        </span>
                                      </div>
                                      
                                      <div class="two histo-rate">
                                        <span class="histo-star">
                                          <i class="active fa fa-star"></i> 2</span>
                                        <span class="bar-block">
                                          <span id="bar-two" class="bar">
                                            <span><span id="two"> <?=$stars['two']['rating']?></span></span>&nbsp;
                                          </span> 
                                        </span>
                                      </div>
                                      
                                      <div class="one histo-rate">
                                        <span class="histo-star">
                                          <i class="active fa fa-star"></i> 1</span>
                                        <span class="bar-block">
                                          <span id="bar-one" class="bar">
                                          <span id="one"><?=$stars['one']['rating']?></span>&nbsp;
                                          </span> 
                                        </span>
                                      </div>
                                    </div>
                                  </div>
                                  <?php } else {?>
                                  <div class="inner">
                                    <center>NO DATA TO DISPLAY</center>
                                  </div>
                                  <?php } ?>
                                  </div>
        </div>
      </div>
    </div>













      <div class="row p-0 m-0">





         <div class="col-lg-6 col-sm-12 p-0 m-0 print" >
            <div class="row mx-3 pt-5 mt-5 shadow p-5 inflation-container">
               <div style="min-height: 1000px;">
                  <div class="col-12">
                     <div class="row p-0 m-0">
                        <div class="dropdown col-12 d-flex justify-content-end">
                           <div>

                           </div>
                           <div>
                              <input type="text" class="dropdown-input">
                              <div class="dropdown-content">
                              </div>
                              <button class="filter-btn inflation-btn">Filter</button>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="h1">
                              <center>Products Inflation</center>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="pt-5" style="min-height: 300px">
                     <canvas height="80px" id="inflation"></canvas>
                  </div>
                  <div class="col-12 pt-3 mt-5  " id = "example1_wrapper">
                     <table class="table table-bordered example1" id="print" style="border-top: solid .4rem teal;">
                        <thead style="border-bottom: solid 2px teal;">
                           <tr>
                              <th scope="col" class="text-center">Date</th>
                              <th scope="col">Price</th>
                              <th scope="col" class="text-center">CPI</th>
                              <th scope="col" class="text-center">Inflation Rate</th>
                           </tr>
                        </thead>
                        <tbody class="inflation-body">
                           <?php

                           if (count($inflation['inflation']) != 0) {
                              for ($i = 0; $i < count($inflation['inflation']); $i++) {
                                 $inflationPercentage;
                                 if ($i == 0)
                                    $inflationPercentage = 0;
                                 else
                                    $inflationPercentage = (number_format((($inflation['inflation'][$i]['price'] - $inflation['inflation'][$i - 1]['price']) / $inflation['inflation'][$i - 1]['price'] * 100), 2, '.', ''))
                           ?>
                                 <tr <?php if ($i > 9) echo 'style="display: none;"' ?>>
                                    <th scope="row" class="text-center"><?= date("F-d", strtotime($inflation['inflation'][$i]['date_modified'])) ?></th>
                                    <td>&#8369; <?= number_format((float)$inflation['inflation'][$i]['price'], 2, '.', ''); ?></td>
                                    <td class="text-center"><?= htmlspecialchars($inflation['inflation'][$i]['price'] / $inflation['inflation'][0]['price'] * 100) ?></td>
                                    <td class="text-center"><?= $inflationPercentage ?> %</td>
                                 </tr>
                              <?php }
                           } else { ?>
                              <tr>
                                 <td colspan="100%">
                                    <center>No records available.</center>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="col-12 inflation-pagination d-flex justify-content-end">
                     <div class="btn p-1"><i class="fas fa-angle-left"></i></div>
                     <div>1</div>
                     <div class="btn p-1"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
         </div>
















         <div class="col-lg-6 col-sm-12 p-0 m-0">
            <div class="row mx-2 pt-5 mt-5 shadow p-5 inflation-container">
               <div class="col-12">
                  <div style="min-height: 1000px;">
                     <div class="row p-0 m-0">
                        <div class="dropdown col-12 d-flex justify-content-end">
                           <input type="text">
                           <div>
                              <input type="text" class="dropdown-input">
                              <div class="dropdown-content">
                              </div>
                              <button class="filter-btn">Filter</button>
                           </div>
                        </div>
                        <div class="h1">
                           <center>Transactions</center>
                        </div>
                     </div>
                     <div class="pt-5" style="min-height: 300px">
                        <canvas height="80px" id="monthlySales"></canvas>
                     </div>
                     <div class="pt-3 mt-5">
                        <table class="table table-bordered" style="border-top: solid .4rem teal;">
                           <thead style="border-bottom: solid 2px teal;">
                              <tr>
                                 <th scope="col" class="text-center">Month</th>
                                 <th scope="col">Successful</th>
                                 <th scope="col" class="text-center">Unsuccessful</th>
                                 <th scope="col" class="text-center">Inflation Rate</th>
                              </tr>
                           </thead>
                           <tbody class="transaction-body">
                              <?php for ($i = 0; $i < 14 - 2; $i++) { ?>
                                 <tr>
                                    <th scope="row" class="text-center">January</th>
                                    <td>&#8369; 12</td>
                                    <td class="text-center">123</td>
                                    <td class="text-center">AS</td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


















   </div>


   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#data-fetch-error">
      Launch static backdrop modal
   </button>

   <!-- Modal -->
   <div class="modal fade" id="data-fetch-error" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header bg-danger  text-white">
            <h5 class="modal-title" id="staticBackdropLabel">An error has occured!</h5>
               <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5 fs-3">
               <center>Getting information failed.</center>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn text-danger border-danger" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>




   <?php include 'footer.php' ?>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js">
      var newNotification = "<?= site_url('api/newNotif'); ?>";
   </script>
   <script>
      var newNotification = "<?= site_url('api/newNotif'); ?>";
   </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="http://thegatepost.com.au/dbmodel/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
   <script src="http://thegatepost.com.au/dbmodel/assets/plugins/datatables/extensions/Buttons/js/dataTables.buttons.js"></script>
   <script src="http://thegatepost.com.au/dbmodel/assets/plugins/datatables/extensions/Buttons/js/buttons.print.js"></script>
   <script src="http://thegatepost.com.au/dbmodel/assets/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
   <script>

$(function () {
   //  $('.select2').select2()
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper');
   //  $("#example3").DataTable({
   //    "responsive": true, "lengthChange": false, "autoWidth": false,
   //    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
   //  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   //  $('#example2').DataTable({
   //    "paging": true,
   //    "lengthChange": false,
   //    "searching": false,
   //    "ordering": true,
   //    "info": true,
   //    "autoWidth": false,
   //    "responsive": true,
   //  });
  });

  
$(document).ready(function(){
$("#opt").on("click", "a", function(e){
  e.preventDefault();
m = $(this).attr('id');
document.getElementById("_month").innerHTML = $(this).text();;
$.post(
  "<?php echo site_url('api/earnings'); ?>",
        // DATA TO PASS
        {
          month: m.replace('_','')
        },
        function (data, status, xhr) {
          if(data[0]['total'])
            document.getElementById("_earnings").innerHTML = data[0]['total'];
          else
          document.getElementById("_earnings").innerHTML = "00.00";
        }
      )
        .done(function () { })

        // TO DO ON FAIL
        .fail(function (jqxhr, settings, ex) {
          alert("failed, " + ex);
        });

})
});

      $(document).ready(function() {
         $('.bar span').hide();
         var one = parseInt($('#one').text());
         var two = parseInt($('#two').text());
         var three = parseInt($('#three').text());
         var four = parseInt($('#four').text());
         var five = parseInt($('#five').text());
         var total = one + two + three + four + five;
         $('#bar-five').animate({
            width: (five / total) * 100 + '%'
         }, 1000);
         $('#bar-four').animate({
            width: (four / total) * 100 + '%'
         }, 1000);
         $('#bar-three').animate({
            width: (three / total) * 100 + '%'
         }, 1000);
         $('#bar-two').animate({
            width: (two / total) * 100 + '%'
         }, 1000);
         $('#bar-one').animate({
            width: (one / total) * 100 + '%'
         }, 1000);

         setTimeout(function() {
            $('.bar span').fadeIn('slow');
         }, 1000);
         ini_pagination(),
            paginate()
      });
   </script>


   <script>
      const data = [];
      const data2 = [];
      let prev = 100;
      let prev2 = 80;
      for (let i = 0; i < 1000; i += 100) {
         prev += 5 - Math.random() * 10;
         data.push({
            x: i,
            y: prev
         });
         prev2 += 5 - Math.random() * 10;
         data2.push({
            x: i,
            y: prev2
         });
      };

      const totalDuration = 100;
      const delayBetweenPoints = totalDuration / data.length;
      const previousY = (ctx) => ctx.index === 0 ? ctx.chart.scales.y.getPixelForValue(200) : ctx.chart.getDatasetMeta(ctx.datasetIndex).data[ctx.index - 1].getProps(['y'], true).y;
      const animation = {
         x: {
            type: 'number',
            easing: 'linear',
            duration: delayBetweenPoints,
            from: NaN, // the point is initially skipped
            delay(ctx) {
               if (ctx.type !== 'data' || ctx.xStarted) {
                  return 0;
               }
               ctx.xStarted = true;
               return ctx.index * delayBetweenPoints;
            }
         },
         y: {
            type: 'number',
            easing: 'linear',
            duration: delayBetweenPoints,
            from: previousY,
            delay(ctx) {
               if (ctx.type !== 'data' || ctx.yStarted) {
                  return 0;
               }
               ctx.yStarted = true;
               return ctx.index * delayBetweenPoints;
            }
         }
      };




      // CHARTS
      // 
      // 
      // 

      // inflation chart
      var inflationCanvas = document.getElementById('inflation').getContext('2d');
      var Inflation = new Chart(inflationCanvas, {
         type: 'line',
         data: {
            labels: [<?= ($data['inflation']['date']) ?>],
            datasets: [{
               data: [<?= ($data['inflation']['percentage']) ?>],
               label: "<?= $data['inflation']['product'] ?>",
               font: {
                  size: 20
               },
               borderColor: "teal",
               backgroundColor: "#00787870",
               fill: true,
               tension: .3
            }]
         },
         options: {
            plugins: {
               subtitle: {
                  text: '<?= date('F Y') ?>',
                  display: true,
                  font: {
                     size: 20
                  }
               },
               legend: {
                  labels: {
                     font: {
                        size: 16
                     }
                  }
               }
            }
         }
      });

      // REDRAW INFLATION CHART
      $('.inflation-btn').click(function() {












         $.post("<?php echo site_url('api/inflation_data'); ?>",
            // DATA TO PASS
            {
               prod_id: productID,
            },
            function(data, status, xhr) {
               console.log(data)
               $('.inflation-body').html('');
               const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
               if (Object.keys(data['inflation']['inflation']).length > 0)
                  for (let i = 0; i < Object.keys(data['inflation']['inflation']).length; i++) {
                     date = new Date(data['inflation']['inflation'][i]['date_modified'])
                     price = data['inflation']['inflation'][i]['price']
                     cpi = parseFloat((data['inflation']['inflation'][i]['price'] / parseFloat(data['inflation']['inflation'][0]['price'])) * 100).toFixed(2)
                     inflation = (parseFloat((data['inflation']['inflation'][i]['price'] - parseFloat(data['inflation']['inflation'][0]['price']))) / parseFloat(data['inflation']['inflation'][0]['price']) * 100)
                     $('.inflation-body').append('<tr style=""> <th scope="row" class="text-center">' + months[date.getMonth()] + "-" + date.getDate() + '</th><td>₱ ' + Number(price).toFixed(2) + '</td><td class="text-center">' + cpi + '</td><td class="text-center">' + Number(inflation).toFixed(2) + '%</td></tr>')
                  }
               else
                  $('.inflation-body').append('<tr> <th colspan="100%" scope="row" class="text-center">' + 'No records available' + '</th></tr>')
               ini_pagination(Object.keys(data['inflation']['inflation']).length)
               paginate()

            }
         ).fail(function() {
            console.log('asd')
         })











      })


      // monthly sales chart
      var monthlySalesCanvas = document.getElementById('monthlySales').getContext('2d');
      var monthlySales = new Chart(monthlySalesCanvas, {
         type: 'bar',
         data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
               data: [1, 2, 3, 4, 5, 26, 7, 8, 9, 10, 15, 23],
               label: "Successful",
               borderColor: "blue",
               backgroundColor: "#113dc7d1",
               fill: true,
               tension: .3
            }, {
               data: [1, 2, 3, 4, 5, 6, 7, 98, 9, 10, 15, 23],
               label: "Cancelled",
               borderColor: "red",
               backgroundColor: "#e21502c9",
               fill: true,
               tension: .3
            }]
         },
         options: {
            plugins: {},
            legend: {
               labels: {
                  font: 30
               }
            },
            scales: {
               y: {
                  ticks: {
                     format: {}
                  }
               }
            }
         }
      });

      // 
      // 
      // 
      // CHARTS END

      function printContent(el) {
         var restorepage = $('body').html();
         var printcontent = $('#' + el).clone();
         $('body').empty().html(printcontent);
         window.print();
         $('body').html(restorepage);
      }
      products = JSON.parse('<?= json_encode($data['products']) ?>')

      $('.dropdown-input').on('input', function() {
         $('.dropdown-content').html('');
         limit = 10;
         for (let i = 0; i < Object.keys(products).length; i++) {
            product = String(products[i]['prod_name']).toLowerCase();
            if (limit == 0) break;
            if (product.includes(String($('.dropdown-input').val()).toLowerCase())) {
               $('.dropdown-content').append('<p id="' + products[i]['prod_id'] + '">' + products[i]['prod_name'] + '</p>');
               limit--;
            }
         }
      })

      $('.dropdown-input').on('focus', function() {
         $('.dropdown-content').css('display', 'block')
      })

      productID = 0;
      $('.dropdown').on('click', '.dropdown-content p', function() {
         $('.dropdown-input').val($(this).html())
         productID = $(this).attr("id")
         $('.dropdown-content').css('display', 'none')
      })

      $('.dropdown-content').on('click', 'p', function() {
         $('.dropdown-input').val($(this).attr('id'))
         console.log($('.dropdown-input').val())
      })

      inflation_start = 0
      inflation_limit = 0;
      inflation_page = 0;
      inflation_max_page = 0;

      function ini_pagination(product_count = <?= count($data['inflation']['inflation']) ?>) {
         $('.inflation-pagination div:nth-child(2)').html('1')
         inflation_start = 1
         inflation_limit = 10
         inflation_page = 1;
         inflation_max_page = 0;
         if ((product_count / 10) - parseInt(inflation_max_page) > 0)
            inflation_max_page = (parseInt(product_count / 10) + 1)
         else
            inflation_max_page = (parseInt(product_count / 10))
         console.log(inflation_max_page)

      }

      function paginate() {
         for (i = 1; i <= $('.inflation-body').children().length; i++) {
            if (i >= inflation_start && i <= inflation_limit)
               $('.inflation-body tr:nth-child(' + i + ')').show()
            else
               $('.inflation-body tr:nth-child(' + i + ')').hide()
         }
         if (inflation_page == 1)
            $('.inflation-pagination div:nth-child(1)').addClass('pagination-btn-disabled')
         if (inflation_max_page == inflation_page || inflation_max_page == 0)
            $('.inflation-pagination div:nth-child(3)').addClass('pagination-btn-disabled')
         if (inflation_page > 1)
            $('.inflation-pagination div:nth-child(1)').removeClass('pagination-btn-disabled')
         if (inflation_page < inflation_max_page)
            $('.inflation-pagination div:nth-child(3)').removeClass('pagination-btn-disabled')

      }

      $('.inflation-pagination div:nth-child(3)').click(function() {
         if (inflation_limit < $('.inflation-body').children().length) {
            inflation_limit += 10
            inflation_start += 10
            $('.inflation-pagination div:nth-child(2)').html(inflation_page += 1)
            paginate()
         }
      })

      $('.inflation-pagination div:nth-child(1)').click(function() {
         if (inflation_start != 1) {
            inflation_limit -= 10
            inflation_start -= 10
            $('.inflation-pagination div:nth-child(2)').html(inflation_page -= 1)
            paginate()
         }
      })
   </script>
</body>

</html>