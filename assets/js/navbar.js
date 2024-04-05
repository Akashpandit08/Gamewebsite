$(document).ready(function(){
    $('#toggleMobile').on('click',function(){
        $('#allNavItems').toggleClass('d-block');
        $('#allNavItemsright').toggleClass('d-block');
    });
});