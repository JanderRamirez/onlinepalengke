<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR; ?>/css/admin/styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Admin Marketer</title>
</head>

<body>
    <?php include 'nav-bar.php' ?>


    <div class="container-fluid mt-4">
        <div class="row p-3 py-3">
            <div class="bg-dark rounded mb-4">
                <h3 class="fw-bolder text-white mb-0 p-3 shadow-lg">On Process Orders</h3>
            </div>








            <table class="table table-borderless m-0 align-middle table-striped">
                <thead>

                    <tr class="bg-dark text-white">
                        <th>Order No.</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th class="text-center">Action</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($order as $ord) {
                        ?>
                            <td><?= str_pad($ord['trans_id'], 8, "0", STR_PAD_LEFT); ?></td>
                            <td><?= $ord['cust_fname']; ?> <?= $ord['cust_mname']; ?> <?= $ord['cust_lname']; ?></td>
                            <td><?= date_format(date_create($ord['trans_date']), 'F d, Y'); ?></td>
                            <td><?= $ord['trans_note']; ?></td>
                            <td class="text-center">
                                <button onclick="viewOrder(<?= $ord['trans_id']; ?>);" class="btn btn-outline-success rounded-pill" id="<?= $ord['trans_id']; ?>"> View </button>
                                <a href="<?= site_url('marketer/message/' . $ord['trans_id']) ?>"><button class="btn btn-outline-success rounded-pill"><i class="fad fa-envelope"></i></button></a>
                            </td>   
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- VIEW ORDER DETAILS-->

    <div class="modal fade" id="orderDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">
                <form action="<?= site_url('Marketer/Update/') ?>" method="POST">
                    <input id="U_id" name="U_id" type="text" value="" hidden>
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-2 bg-dark bg-gradient">

                            <h5 class="modal-title fw-bold">Transaction Details</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-2 pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 mb-3 mt-0">
                                        <div class="d-flex justify-content-center p-2">
                                            <h5 class="modal-title fw-bold" id="trans_id"></h5>
                                        </div>
                                        <div class="card-header bg-dark text-white text-center mb-1">Orders</div>
                                        <div class="card-body text-dark p-0">
                                            <form id="myform" class="myform">
                                                <table id='myTable' class="table m-0 align-middle">
                                                    <thead>
                                                        <tr class="bg-secondary text-white">
                                                            <td width="70%">Item</td>
                                                            <td class="text-center">Quantity</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-dark bordered text-dark">
                                <h5 class="card-title">Order Note</h5>
                                <p class="font-italic" id='orderNote'></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" name="decline" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="deliver(this.id)" class="btn btn-primary btnDeliver" name="accept">&nbspDeliver&nbsp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- SELECT COURIER-->

    <div class="modal fade" id="selectCourier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">
                <form action="<?= site_url('Marketer/Update/') ?>" method="POST">
                    <input id="U_id" name="U_id" type="text" value="" hidden>
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-2 bg-dark bg-gradient">

                            <h5 class="modal-title fw-bold">Courier</h5>
                            <i class="fas fa-times-circle align-content-center" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-2 pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0 mb-3 mt-0">
                                        <div class="d-flex justify-content-center p-2">
                                            <h5 class="modal-title fw-bold" id="trans_id"></h5>
                                        </div>
                                        <div class="card-body text-dark p-0">

                                            <input type="text" id="transId" name="transId" value="ss" hidden>
                                            <label for="courier" class="form-label m-1">Courier &nbsp<b class="text-danger">*</b></label>
                                            <select id="courier" name="courier" class="form-select m-0 rounded-0 border-1 p-2 " required>
                                                <?php foreach ($courier as $cou) {
                                                ?>
                                                    <option value="<?= htmlspecialchars($cou['admin_id']) ?>"><?= htmlspecialchars($cou['admin_fname'] . " " . $cou['admin_mname'] . " " . $cou['admin_lname']) ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="closedeliver()" class="btn btn-secondary" name="decline" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="deliver">&nbspDeliver&nbsp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR; ?>/js/admin/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>



    <script>
        const zeroPad = (num, places) => String(num).padStart(places, '0')

        function viewOrder($id) {
            var table = document.getElementById("myTable");
            var tableHeaderRowCount = 1;
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) {
                table.deleteRow(tableHeaderRowCount);

            }
            $.post(
                    "<?= site_url('api/order_details') ?>",
                    // DATA TO PASS
                    {
                        id: $id,
                    },
                    function(data, status, xhr) {
                        console.log(data);
                        for (let x in data["cart"]) {
                            var status = "";

                            if (data["cart"][x]["status"] == 1) {
                                status = "checked";
                            } else {
                                status = "";
                            }
                            $(table).find('tbody').append("<tr><td><input type='checkbox' class ='cb' name='cb' onclick='mycb(this.id)' id = '" + data["cart"][x]["cart_id"] + "'" + status + "> " + data["cart"][x]["prod_name"] + "</td><td class='text-center'>" + data["cart"][x]["quantity"] + data["cart"][x]["unit"].toLowerCase() + "</td> </tr>");
                        }
                        document.getElementById("orderNote").innerHTML = data['cart'][0]['trans_note'];

                        document.getElementById("trans_id").innerHTML = '#' + zeroPad($id, 8);
                    }
                )
                .done(function() {})

                // TO DO ON FAIL
                .fail(function(jqxhr, settings, ex) {
                    alert("failed, " + ex);
                });
            $(".btnDeliver").attr("id", $id);
            $('#orderDetails').modal('show');
        }



        $(document).ready(function() {
            $('#example').DataTable();
        });

        window.onload = function(e) {
            $("body").show()

            phoneFormatter();
        }

        function phoneFormatter() {
            console.log('hello');
            var prevVal;
            var newVal;
            document.getElementById("contact").addEventListener("keydown", function() {

                var element = $('#contact');
                prevVal = element.val();
            })
            document.getElementById("contact").addEventListener("input", function(e) {
                var element = $('#contact');
                newVal = element.val()
                if ((newVal.length - prevVal.length) == -1) {
                    if (prevVal.length == 10 || prevVal.length == 6) {
                        element.val(newVal.substr(0, newVal.length - 1))
                    }
                } else if ((newVal.length - prevVal.length) != 1) {
                    element.val(prevVal)
                } else if ((newVal.length - prevVal.length) == 1) {
                    if (prevVal.length < 13) {
                        if (isNaN(e.data) == true)
                            element.val(prevVal)
                        else {
                            if (prevVal.length == 4 || prevVal.length == 8)
                                element.val(prevVal + '-' + e.data);
                        }
                    } else {
                        element.val(prevVal)
                    }
                }



            })
        }

        function AddSubmitForm() {
            var pass = document.getElementById('pass').value;
            var rePass = document.getElementById('rePass').value;

            if (pass.length < 8 || pass.length > 20) {
                alert('Password must be between 8 to 20 characters')
            } else if (pass != rePass) {
                alert('Password Did not match!')
            } else {
                document.getElementById("btnSubmit").click();
            }
        }

        function mycb($id) {
            var ischecked = 0;
            if (document.getElementById($id).checked) {
                ischecked = 1
            } else {
                ischecked = 0;
            }
            $.post(
                    "<?= site_url('api/BuyProduct') ?>", {
                        id: $id,
                        status: ischecked
                    },
                    function(data, status, xhr) {

                    }
                )
                .done(function() {})

                // TO DO ON FAIL
                .fail(function(jqxhr, settings, ex) {
                    alert("failed, " + ex);
                });
        };


        function deliver($id) {
            document.getElementById("transId").value = $id;
            $('#orderDetails').modal('hide');
            $('#selectCourier').modal('show');
        }

        function closedeliver() {
            $('#selectCourier').modal('hide');
            $('#orderDetails').modal('show');
        }
    </script>
</body>

</html>