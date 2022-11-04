<!-- Modal Successful -->
<div class="modal fade" id="cartadd" data-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-success bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Successful</h5>
                            <i class="fas fa-times-circle align-content-center" data-dismiss="modal"
                                aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="modal-body py-5 fs-3">
                            <center style="font-size:30px;">Product added to your cart!</center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="primary-btn hvr-glow border-0" data-dismiss="modal">Shop More</button>
                        <a href="<?=site_url('Customer/Cart');?>"><button type="" class="primary-btn hvr-glow border-0 bg-primary" >&nbspMy Cart&nbsp</button></a>
                    </div>
            </div>
        </div>
    </div>

<!-- Modal Error -->
    <div class="modal fade" id="loginerr" data-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="text-white d-flex justify-content-between m-0 p-3 mb-4 bg-danger bg-gradient">
                            <div></div>
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Login</h5>
                            <i class="fas fa-times-circle align-content-center" data-dismiss="modal"
                                aria-label="Close" style="font-size: 1.5rem; cursor:pointer"></i>
                        </div>
                        <div class="container-fluid p-4">
                        <center style="font-size:30px;" class="text-danger">You are not login to an account!</center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="<?=site_url('Account/Login');?>"><button type="" class=" btn btn-warning">&nbspLogin&nbsp</button></a>
                    </div>
            </div>
        </div>
    </div>