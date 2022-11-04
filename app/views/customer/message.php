<?php

use GuzzleHttp\Psr7\Message;

if ($data['owner'] == 'c') {
    // sent is for the client
    $sent = $data['display_photo']['mark'];
    // replies is not for the current client
    $replies = $data['display_photo']['cust'];
} else {

    // sent is for the client
    $sent = $data['display_photo']['cust'];
    // replies is not for the current client
    $replies = $data['display_photo']['mark'];
}
if (isset($_SESSION['user_id'])) {
    $first_name = ucfirst($data['marketer_info']['fname']);
    $middle_name = ucfirst($data['marketer_info']['mname']);
    $last_name = ucfirst($data['marketer_info']['lname']);
} else {
    $first_name = ucfirst($data['kachat_info']['fname']);
    $middle_name = ucfirst($data['kachat_info']['mname']);
    $last_name = ucfirst($data['kachat_info']['lname']);
}
?>

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <script>
        try {
            Typekit.load({
                async: true
            });
        } catch (e) {}
    </script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <style class="cp-pen-styles">
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #32465a;
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
            font-size: 1em;
            letter-spacing: 0.1px;
            color: #32465a;
            text-rendering: optimizeLegibility;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
            -webkit-font-smoothing: antialiased;
        }

        #frame {
            width: 100%;
            min-width: 360px;
            max-width: 1250px;
            height: 100vh;
            min-height: 300px;
            max-height: 100vh;
            background: #E6EAEA;
        }

        @media screen and (max-width: 360px) {
            #frame {
                width: 100%;
                height: 100vh;
            }
        }

        #frame .content {
            float: right;
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        #frame .content .contact-profile {
            width: 100%;
            height: 60px;
            line-height: 60px;
            background: #f5f5f5;
        }

        #frame .content .contact-profile img {
            width: 40px;
            border-radius: 50%;
            float: left;
            margin: 9px 12px 0 9px;
        }

        #frame .content .contact-profile a i {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            float: left;
            text-align: center;
            margin: 9px 0px 0 9px;
            color: chocolate;
            line-height: 40px;
        }

        #frame .content .contact-profile p {
            float: left;
        }

        #frame .content .messages {
            height: auto;
            min-height: calc(100% - 93px);
            max-height: calc(100% - 93px);
            overflow-y: scroll;
            overflow-x: hidden;
            padding-bottom: 1rem;
        }

        @media screen and (max-width: 735px) {
            #frame .content .messages {
                max-height: calc(100% - 105px);
            }
        }

        #frame .content .messages::-webkit-scrollbar {
            width: 8px;
            background: transparent;
        }

        #frame .content .messages::-webkit-scrollbar-thumb {
            background-color: #d2691eb8;
        }

        #frame .content .messages ul li {
            display: inline-block;
            clear: both;
            float: left;
            padding: 15px 15px 5px 15px;
            width: calc(100%);
            font-size: 0.9em;
        }

        #frame .content .messages ul li:nth-last-child(1) {
            margin-bottom: 25px;
        }

        #frame .content .messages ul li:nth-last-child(1) p {
            margin-bottom: 2.3rem;
        }

        #frame .content .messages ul li.sent img {
            margin: 6px 8px 0 0;
        }

        #frame .content .messages ul li.sent p {
            background: #f5f5f5;

        }

        #frame .content .messages ul li.replies img {
            float: right;
            margin: 6px 0 0 8px;
        }

        #frame .content .messages ul li.replies p:first-of-type {
            background: chocolate;
            color: #f5f5f5;
            float: right;
        }

        #frame .content .messages ul li img {
            width: 22px;
            border-radius: 50%;
            float: left;
        }



        #frame .content .messages ul li p {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 20px;
            max-width: 205px;
            line-height: 130%;
        }

        @media screen and (min-width: 735px) {
            #frame .content .messages ul li p {
                max-width: 300px;
            }

            .modal-dialog {
                right: auto;
                left: 0%;
                padding-top: 30px;
                padding-bottom: 30px;
            }
        }

        #frame .content .message-input {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 99;
            background-color: chocolate;
        }

        #frame .content .message-input .wrap {
            position: relative;
        }

        #frame .content .message-input .wrap input {
            font-family: "proxima-nova", "Source Sans Pro", sans-serif;
            float: left;
            border: none;
            margin: 1pt;
            width: calc(100% - 53px);
            padding: 11px 32px 10px 8px;
            font-size: 0.8em;
            color: #32465a;
        }

        @media screen and (max-width: 735px) {
            #frame .content .message-input .wrap input {
                padding: 15px 32px 16px 8px;
            }
        }

        #frame .content .message-input .wrap input:focus {
            outline: none;
        }

        #frame .content .message-input .wrap button {
            float: right;
            border: none;
            width: 50px;
            padding: 12px 0;
            cursor: pointer;
            background: chocolate;
            color: #f5f5f5;
        }

        @media screen and (max-width: 735px) {
            #frame .content .message-input .wrap button {
                padding: 16px 0;
            }
        }

        #frame .content .message-input .wrap button:hover {
            background: #fe8228;
            color: white;
        }

        #frame .content .message-input .wrap button:focus {
            outline: none;
        }



        /* LOADER */
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 40px;
            height: 40px;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 32px;
            height: 32px;
            margin: 4px;
            border: 4px solid #fff;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: chocolate transparent transparent transparent;
        }

        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }

        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }

        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }

        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #open_cart::-webkit-scrollbar {
            width: 0;
        }



        .modal-open,
        body {
            margin-right: 0% !important;
        }

        #open_cart {
            padding-left: 0px !important;
        }

        #frame .content .contact-profile .social-media i {
            margin: 1.2rem;
            margin-top: 1.35rem;
            cursor: pointer;
            float: right;
        }

        .modal-body button:nth-child(2),
        .modal-footer button:nth-child(2) {
            background-color: chocolate;
            border: .1rem chocolate solid;
        }

        .modal-body button:nth-child(2):hover,
        .modal-footer button:nth-child(2):hover {
            background-color: white;
            border: .1rem chocolate solid;
            color: chocolate;
        }

        .modal-footer button:nth-child(1) {
            background-color: #6c757d;
            border: .1rem #6c757d solid;
        }

        .modal-footer button:nth-child(1):hover {
            background-color: white;
            border: .1rem #6c757d solid;
            color: #6c757d;
        }

        .modal-body button:nth-child(2):focus,
        .modal-footer button:nth-child(2):focus {
            background-color: white;
            border: .1rem chocolate solid;
            color: chocolate;
            box-shadow: chocolate 0px 2px 8px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
        }

        .modal-body button:nth-child(2):active,
        .modal-footer button:nth-child(2):active {
            background-color: chocolate !important;
            border: .1rem chocolate solid !important;
            color: white !important;
            box-shadow: chocolate 0px 2px 8px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px !important;
        }

        .social-media i:nth-child(1) {
            color: chocolate;
        }

        .modal-content .d-flex div {
            color: chocolate;
        }

        .modal-content {
            border-top: solid .5rem chocolate;
        }

        table tbody tr {
            border: 0px !important;
        }

        .fa-minus-square {
            color: #828282;
            cursor: pointer;
        }

        .fa-plus-square {
            color: chocolate;
            cursor: pointer;
        }

        .color-chocolate {
            color: chocolate;
        }

        #open_cart div .modal-content .refresh {
            background-color: white;
            width: max-content;
            color: chocolate;
            border: solid 1px chocolate;
            border-radius: 5px;
            cursor: pointer;
        }

        #open_cart div .modal-content .refresh:hover {
            background-color: chocolate;
            width: max-content;
            color: white;
            border: solid 1px chocolate;
            border-radius: 5px;
            cursor: pointer;
        }

        #open_cart div .modal-content .refresh:active {
            background-color: white;
            width: max-content;
            color: chocolate;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- 

A concept for a chat interface. 

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

    <div id="frame">
        <div class="content">
            <div class="contact-profile">
                <a href="javascript:history.back()"><i class="fas fa-chevron-left fa-lg"></i></a>
                <img src="data:image/png;base64,<?= $sent ?>" alt="" />
                <p><?= $first_name . '&nbsp' . $middle_name . '&nbsp' . $last_name ?></p>
                <div class="social-media">
                    <i data-toggle="modal" data-target="#open_cart" class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <div class="messages" id="msgContainer">
                <ul>
                    <?php
                    if ($data['allMsgsFetched'] == 'true') { ?>
                        <li>
                            <center>
                                <p>no messages left to fetch</p>
                            </center>
                        </li>
                    <?php
                    } ?>
                    <?php
                    if (count($data['messages']) != 0) { ?>
                        <?php
                        foreach ($data['messages'] as $message) {
                            if ($data['owner'] == substr($message['msg_owner'], 0, 1)) { ?>
                                <li class="replies">
                                    <img src="data:image/png;base64,<?= $replies ?>" alt="" />
                                    <p><?= htmlspecialchars($message['message']) ?></p>
                                </li>
                            <?php
                            } else { ?>
                                <li class="sent">
                                    <img src="data:image/png;base64,<?= $sent ?>" alt="" />
                                    <p><?= htmlspecialchars($message['message']) ?></p>
                                </li>
                            <?php
                            } ?>
                    <?php
                        }
                    } ?>
                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <input id="message" type="text" placeholder="Write your message..." />
                    <button id="btn-send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>

















    <?php if (isset($_SESSION['admin_type'])) { ?>
        <!-- PRODUCT MODAL -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="open_cart" aria-labelledby="open_cart" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <p class="m-3 mb-0 p-2 refresh font-weight-bold"><i class="far fa-redo-alt"></i>&nbsp; refresh</p>
                    <div class="d-flex justify-content-around text-dark pb-3">
                        <div class="h2 font-weight-bold pt-3 text-center">ORDER DETAILS <p class="h6 text-dark">Transaction ID: &nbsp; <?= str_pad($data['transaction_info']['trans_id'], 8, "0", STR_PAD_LEFT); ?></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 p-2 text-dark">
                            <div class="h3"><?= $first_name . '&nbsp' . $middle_name . '&nbsp' . $last_name ?></div>
                            <div class="h6 color-chocolate"><?= $data['kachat_info']['address'] ?></div>
                            <div class="h4 color-chocolate"><?= substr_replace(substr_replace($data['kachat_info']['num'], '-', 7, 0), '-', 4, 0);  ?></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table h5">
                                <thead class="font-weight-bold">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Qty.</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['order_list'] as $list) { ?>
                                        <tr>
                                            <td scope="row"><?= $list['prod_name'] ?></td>
                                            <td><?= '&#8369; ' . $list['price'] ?></td>
                                            <td><?= $list['unit'] ?></td>
                                            <td class="">
                                                <i class="fad fa-minus-square"></i>
                                                <span class="px-1"><?= $list['quantity'] ?></span>
                                                <i class="fas fa-plus-square"></i>
                                            </td>
                                            <td> <?= '&#8369; ' . number_format((float)($list['price'] * $list['quantity']), 2, '.', '');  ?> </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="font-weight-bold" colspan="4">Delivery Fee:</td>
                                        <td>&#8369; <?= $data['transaction_info']['delivery_fee'] ?></td>
                                    </tr>
                                    <tr class="color-chocolate">
                                        <td class="font-weight-bold" colspan="4">Total Payment:</td>
                                        <td>&#8369; 00.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btnUpdate">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- PRODUCT MODAL -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="open_cart" aria-labelledby="open_cart" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="d-flex justify-content-around text-dark pb-3">
                        <div class="h2 font-weight-bold pt-3 text-center">ORDER DETAILS <p class="h6 text-dark">Transaction ID: &nbsp; <?= str_pad($data['transaction_info']['trans_id'], 8, "0", STR_PAD_LEFT); ?></p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 p-2 text-dark">
                            <div class="h3"><?= ucfirst($data['kachat_info']['fname']) . '&nbsp' . ucfirst($data['kachat_info']['mname']) . '&nbsp' . ucfirst($data['kachat_info']['lname']) ?></div>
                            <div class="h6 color-chocolate"><?= $data['kachat_info']['address'] ?></div>
                            <div class="h4 color-chocolate"><?= substr_replace(substr_replace($data['kachat_info']['num'], '-', 7, 0), '-', 4, 0);  ?></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table h6">
                                <thead class="font-weight-bold">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Qty.</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['order_list'] as $list) { ?>
                                        <tr>
                                            <td scope="row"><?= $list['prod_name'] ?></td>
                                            <td><?= '&#8369; ' . $list['price'] ?></td>
                                            <td><?= $list['unit'] ?></td>
                                            <td class="">
                                                <span class="px-1"><?= $list['quantity'] ?></span>
                                            </td>
                                            <td> <?= '&#8369; ' . number_format((float)($list['price'] * $list['quantity']), 2, '.', '');  ?> </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="font-weight-bold" colspan="4">Delivery Fee:</td>
                                        <td>&#8369; <?= $data['transaction_info']['delivery_fee'] ?></td>
                                    </tr>
                                    <tr class="color-chocolate">
                                        <td class="font-weight-bold" colspan="4">Total Payment:</td>
                                        <td>&#8369; 00.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">CLose</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- API MODAL -->
    <!-- FAIL -->
    <div class="modal fade" id="apiFail" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center h3 py-3 pt-4 font-weight-bold text-danger">Updating failed.</div>
                    <button type="button" class="btn btn-primary float-right btnFailClose">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SUCCESS -->
    <div class="modal fade" id="apiSuccess" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center h3 py-3 pt-4 font-weight-bold color-chocolate">Updating Success.</div>
                    <button type="button" class="btn btn-primary float-right btnSuccessClose">Okay</button>
                </div>
            </div>
        </div>
    </div>
















    <script>
        // VARIABLES
        var transactionID = '<?= $_SESSION['transaction_id'] ?>';

        $("body").on("click", '.retry', function() {
            $(".messages ul li")[0].remove()
            is_retry_displayed = 0
            allMsgsFetched = 'false'
            if (allMsgsFetched == 'false') {
                if (getOldMsgsFin == true) {
                    getOldMsgsFin = false;
                    prependLoader();

                    $.post("<?php echo site_url('api/getOldMsgs'); ?>",
                        // DATA TO PASS
                        {
                            trans_id: transactionID,
                            oldestMsgID: oldestMsgID
                        },
                        function(data, status, xhr) {
                            $(".messages ul li")[0].remove()
                            if (Object.keys(data['messages']).length > 0) {
                                oldestMsgID = data['messages'][Object.keys(data['messages']).length - 1]['mess_id']
                                for (let i = 0; i < Object.keys(data['messages']).length; i++) {
                                    msgOwner = data['messages'][i]['msg_owner'].substr(0, 1)
                                    prependMsg(data['messages'][i]['message'], owner, msgOwner)
                                }
                                if (Object.keys(data['messages']).length < 20) {
                                    $('<li class=""><center><p>no messages left to fetch</p></center></li>').prependTo($('.messages ul'))
                                    allMsgsFetched = true
                                }
                            }
                        }
                    ).fail(function() {
                        $(".messages ul li")[0].remove()
                        setTimeout(function() {
                            if (is_retry_displayed == 0) {
                                $('<li><center><p class="p-1">Fetching messages failed.</p><a style="cursor:pointer" class="text-danger retry" id="">retry.</a></center></li>').prependTo($('.messages ul'))
                                is_retry_displayed = 1
                                allMsgsFetched = 'true';
                            }
                        }, 500)
                    })
                    getOldMsgsFin = true;
                }
            }
        });




        $('#btn-send').click(function() {
            newMessage();
        });

        $(window).on('keydown', function(e) {
            if (e.which == 13) {
                newMessage();
                return false;
            }
        });

        $(document).ready(
            scrollToBot(250),
            getOldMsgs(),
            setInterval(function() {
                getNewMsgs()
            }, 3000),
            calc_total()
        );

        function scrollToBot(duration) {
            $("#msgContainer").animate({
                scrollTop: $("#msgContainer")[0].scrollHeight
            }, duration);
        }

        function scrollToChild(duration, position) {
            $("#msgContainer").animate({
                scrollTop: $('#msgContainer ul li:nth-child(' + position + ')').position().top
            }, duration);
        }

        $('.btnFailClose').click(function() {
            $('#apiFail').modal('hide')
            $('#open_cart').modal('show')
        })

        $('.btnSuccessClose').click(function() {
            $('#apiSuccess').modal('hide')
            $('#open_cart').modal('show')
        })

        // GET NEW MESSAGES
        //
        //
        owner = '<?= $data['owner'] ?>';
        getNewMsgsFin = true;
        latestMsgID = '<?= $data['messages'][count($data['messages']) - 1]['mess_id'] ?>';

        function getNewMsgs() {
            if (getNewMsgsFin == true) {
                getNewMsgsFin = false;
                $.post("<?php echo site_url('api/getNewMsgs'); ?>",
                    // DATA TO PASS
                    {
                        trans_id: transactionID,
                        msg_id: latestMsgID
                    },
                    function(data, status, xhr) {
                        if (Object.keys(data).length > 0) {
                            message = $(".message-input input").val();
                            for (let index = 0; index < Object.keys(data).length; index++) {
                                if (data[index]['msg_owner'].substr(0, 1) != owner)
                                    $('<li class="sent"><img src="data:image/png;base64,<?= $sent ?>" alt="" /><p>' + data[index]['message'] + '</p></li>').appendTo($('.messages ul'))
                                getNewMsgsFin = true;
                                if (Object.keys(data).length - 1 == index) {
                                    latestMsgID = data[index]['mess_id']
                                }
                            }
                            if ($.trim(message) == '') {
                                return false;
                            }
                            getNewMsgsFin = true;
                        } else {
                            getNewMsgsFin = true;
                        }
                    }
                )
            }
        }

        // FUNCTION USED BY getOldMsgs TO PREPEND MESSAGES FROM THE CONTAINER
        //
        //
        function prependMsg(msg, owner, msgOwner) {
            if (owner == msgOwner)
                $('<li class="replies"><img src="data:image/png;base64,<?= $replies ?>" alt="" /><p>' + msg + '</p></li>').prependTo($('.messages ul'))
            else
                $('<li class="sent"><img src="data:image/png;base64,<?= $sent ?>" alt="" /><p>' + msg + '</p></li>').prependTo($('.messages ul'))

            scrollToChild(10, 10);
        }

        // FUNCTION USED BY getOldMsgs TO ADD LOADER TO THE CONTAINER
        //
        //
        function prependLoader() {
            $('<li class="d-flex justify-content-center" style="background-image: linear-gradient(#0000000f, #e6eaea);"> <div class="lds-ring"> <div></div> <div></div><div></div><div></div></div></li>').prependTo($('.messages ul'))
        }

        oldestMsgID = '<?php echo $data['messages'][0]['mess_id']; ?>';
        allMsgsFetched = '<?php echo $data['allMsgsFetched'] ?>';
        getOldMsgsFin = true;
        is_retry_displayed = 0

        function getOldMsgs() {
            $(".messages").scroll(function() {
                if ($(".messages").scrollTop() == 0) {

                    if (allMsgsFetched == 'false') {
                        if (getOldMsgsFin == true) {
                            getOldMsgsFin = false;
                            prependLoader();

                            $.post("<?php echo site_url('api/getOldMsgs'); ?>",
                                // DATA TO PASS
                                {
                                    trans_id: transactionID,
                                    oldestMsgID: oldestMsgID
                                },
                                function(data, status, xhr) {
                                    $(".messages ul li")[0].remove()
                                    if (Object.keys(data['messages']).length > 0) {
                                        oldestMsgID = data['messages'][Object.keys(data['messages']).length - 1]['mess_id']
                                        for (let i = 0; i < Object.keys(data['messages']).length; i++) {
                                            msgOwner = data['messages'][i]['msg_owner'].substr(0, 1)
                                            prependMsg(data['messages'][i]['message'], owner, msgOwner)
                                        }
                                        if (Object.keys(data['messages']).length < 20) {
                                            $('<li class=""><center><p>no messages left to fetch</p></center></li>').prependTo($('.messages ul'))
                                            allMsgsFetched = true
                                        }
                                    }
                                }
                            ).fail(function() {
                                $(".messages ul li")[0].remove()
                                setTimeout(function() {
                                    if (is_retry_displayed == 0) {
                                        $('<li><center><p class="p-1">Fetching messages failed.</p><a style="cursor:pointer" class="text-danger retry" id="">retry.</a></center></li>').prependTo($('.messages ul'))
                                        is_retry_displayed = 1
                                        allMsgsFetched = 'true';
                                    }
                                }, 500)
                            })
                            getOldMsgsFin = true;
                        }
                    }
                }
            });
        }

        // FUNCTION TO DO WHEN GETTING OLD MESSAGES FAILED
        //
        // 
        async function newMessage() {
            message = $(".message-input input").val();
            if (message.length > 0) {
                $.post("<?php echo site_url('api/sendMessage'); ?>",
                    // DATA TO PASS
                    {
                        message: $('#message').val(),
                        transactionID: transactionID
                    },
                    function(data, status, xhr) {
                        var result = '' + data + '';
                        if (result.length > 0) {
                            latestMsgID = result;
                            if ($.trim(message) == '') {
                                return false;
                            }
                            $('<li class="replies"><img src="data:image/png;base64,<?= $replies ?>" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
                            $('.message-input input').val(null);
                            $('.contact.active .preview').html('<span>You: </span>' + message);
                            scrollToBot(100);
                        }
                    }
                )
            }
        };


        $('.fa-plus-square').click(function() {
            element = $(this).prev()
            valUpdate = 0
            if ($(this).closest('td').prev().html() == 'tali')
                valUpdate = 1
            else
                valUpdate = .05

            $(this).prev().html(Number(parseFloat(element.html()) + valUpdate).toFixed(2))
            $(this).closest('td').next().html('&#8369; ' + Number(parseFloat(element.html()) * parseFloat($(this).closest('td').prev().prev().html().substring(1))).toFixed(2))
            calc_total()
        })

        $('.fa-minus-square').click(function() {
            element = $(this).next()
            valUpdate = 0
            if ($(this).closest('td').prev().html() == 'tali')
                valUpdate = 1
            else
                valUpdate = .05

            if (Number(parseFloat(element.html()) - valUpdate).toFixed(2) > 0) {
                $(this).next().html(Number(parseFloat(element.html()) - valUpdate).toFixed(2))
                $(this).closest('td').next().html('&#8369; ' + Number(parseFloat(element.html()) * parseFloat($(this).closest('td').prev().prev().html().substring(1))).toFixed(2))
                calc_total()
            }
        })

        function calc_total() {
            let payment = 0;
            for (let i = 1; i <= $('tbody tr').length - 1; i++) {
                add = Number(parseFloat($('tbody tr:nth-child(' + i + ') td:last-child').html().substring(2)).toFixed(2))
                payment += add;
            }
            $('tbody tr:nth-child(' + $('tbody tr').length + ') td:last-child').html("&#8369; " + payment.toFixed(2))
        }


        order_id = <?= $data['order_list_id'] ?>;
        product_count = $('tbody tr').length - 2

        $(".btnUpdate").click(function() {
            if ($('tbody tr').length - 2 == product_count) {
                quantities = get_quantites(this)
                // 
                // 
                // 
                // 
                $.post("<?php echo site_url('api/update_orders'); ?>",
                    // DATA TO PASS
                    {
                        order_id: JSON.stringify(order_id),
                        quantities: JSON.stringify(quantities)
                    },
                    function(data, status, xhr) {
                        $('#apiSuccess').modal('show')
                        $('#open_cart').modal('hide')
                    }
                ).fail(function() {
                    $('#apiFail').modal('show')
                    $('#open_cart').modal('hide')
                })
                // 
                //
                // 
                // 


            } else {
                $('#apiFail').modal('show')
                $('#open_cart').modal('hide')
            }
        })

        order_quan = []

        function get_quantites(element) {
            order_quan = [];
            prodlength = $(element).closest('div').prev().children('div:nth-child(2)').children('table').children('tbody').children('tr').length - 2
            for (let i = 1; i <= prodlength; i++) {
                order_quan.push(parseFloat($(element).closest('div').prev().children('div:nth-child(2)').children('table').children('tbody').children('tr:nth-child(' + i + ')').children('td:nth-child(4)').children('span:nth-child(2)').html()))
            }
            return order_quan
        }

        $(".refresh").click(function() {
            $(this).children('i:first-child').addClass('fa-spin')
            get_order(this);
        })

        function get_order(element) {
            $.post("<?php echo site_url('api/refresh_info'); ?>",
                // DATA TO PASS
                {
                    trans_id: transactionID
                },
                function(data, status, xhr) {
                    for (let i = 0; i < Object.keys(data['order_list']).length; i++) {
                        $('tbody tr:nth-child(' + (i + 1) + ') td:nth-child(4) span:nth-child(2)').html(data['order_list'][i]['quantity'])
                        quan = $('tbody tr:nth-child(' + (i + 1) + ') td:nth-child(4) span:nth-child(2)').html()
                        price = parseFloat($('tbody tr:nth-child(' + (i + 1) + ') td:nth-child(2)').html().substr(2))
                        console.log()
                        $('tbody tr:nth-child(' + (i + 1) + ') td:nth-child(5)').html('&#8369; ' + Number(quan * price).toFixed(2))
                    }
                    calc_total()
                    $('#apiSuccess').modal('show')
                    $('#open_cart').modal('hide')
                }
            ).fail(function() {
                $('#apiFail').modal('show')
                $('#open_cart').modal('hide')
            })









            $(element).children('i:first-child').removeClass('fa-spin')
        }
    </script>
</body>

</html>