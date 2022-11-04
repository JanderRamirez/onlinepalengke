/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 
var link;
window.addEventListener('DOMContentLoaded', event => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // } 
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
    
    
    setInterval(function() {
        link = newNotification
        newNotif()
        }, 5000);
});

/*

GET NEW TRANSACTION NOTIFICATION

*/

async function newNotif() {
        $.post(link,
            // DATA TO PASS
            {
                
            },
            function(data, status, xhr) {
                document.getElementById("bTotal").innerHTML = (data['pending']["total"] + data['process']["total"] + data['delivery']["total"]);
                document.getElementById("bPending").innerHTML = (data['pending']["total"]);
                document.getElementById("bProcess").innerHTML = (data['process']["total"]);
                document.getElementById("bDelivery").innerHTML = (data['delivery']["total"]);
                console.log(data);
            }
            
  
        )
};