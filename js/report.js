$(document).ready(function()
{
    console.log('in script')
    $(document).on('click','.btn-search',function(event)
    {
        let year=$('#year').val();
        let month=$('#month').val();
        console.log(month);
        $.ajax({
            url:'report.php',
            method:'post',
            data:{year:year,month:month},
            success:function(response)
            {
                $('.reportor').html(response);

            }
        })
    })


    $(document).on('click','.search',function(event)
    {
        var start = $('#start_date').val();
        var end = $('#end_date').val();
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


});



