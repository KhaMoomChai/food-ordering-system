$(document).ready(function()
{
    console.log('in script')
    $(document).on('click','.btn_delete',function(event){
        event.preventDefault()
        let status=confirm("Are you sure to delete?");
        console.log(status)
           
        if(status)
        {
            let id=$(this).parent().attr('id')
            // console.log("id is "+id)
            $.ajax({
                method:'post',
                url:'delete_product.php',
                data:{id:id},
                success:function(response){
                    // alert(response)
                    if(response='success')
                    {
                        alert("Successfully delete")
                        location.href='product.php'
                    }
                    else
                    {
                        alert(response)
                    }
                },
                error:function(error){

                }
            })
        }
    })

    $('#mytable').DataTable();
    
});