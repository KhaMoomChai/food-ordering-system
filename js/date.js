$(document).on('click','.search',function(event)
    {
        // event.preventDefault();
        // const reportDataDiv = document.getElementById('reportData');
        var start = $('#start_date').val();
        var end = $('#end_date').val();
        // let orders=[];
        // console.log(start);
        console.log(end)
        $.ajax({
            url:'report_amount.php',
            method:'post',
            data:{start: start,end : end},
            success:function(response)
            {
                $('.reports').html(response);
                // reportDataDiv.innerHTML=response;
    
            }
        })
})