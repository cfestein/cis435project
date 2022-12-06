<?php
    session_start();
    if(isset($_POST['time']) && isset($_POST['total'])){
        $time = $_POST['time'];
        $total = $_POST['total'];
    }
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript"  language="javascript">
    $(document).ready(function() {
        $("button").click(function(e) {
            e.preventDefault();
            var btnClass = $(this).attr('id');
            //if button is checkout
            var email_temp = $('input[name="email"]').val();
            var total_temp = $('input[name="total"]').val();
            var order_time_temp = $('input[name="time"]').val();
            var name_temp = $('input[name="name"]').val();
            if(btnClass == "order"){
                if($('input[name="name"]').val() == ""){
                    alert('please enter a name');
                }
                else if($('input[name="email"]').val() == ""){
                    alert('please enter an email');
                }
                else if(!email_temp.includes("@")){
                    alert('please enter a valid email');
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "cart.php",
                        data: {
                            total: total_temp,
                            order_time: order_time_temp,
                            name: name_temp,
                            email: email_temp
                        },
                        success: function(result) {
                            alert('order placed');
                        },
                        error: function(result) {
                            alert('error');
                        }
                        
                    })
                } 
            }   
            $(document).ajaxStop(function(){
                window.location="http://mckinleycafeonline.fall2022web.tech/menu.php";
                });           
        });
    });
    
</script>
<form id="form" method="POST">
    <input type="text" name="name" placeholder="enter name">
    <input type="email" name="email" placeholder="enter email">
    <input type="hidden" name="total" value="<?= $_POST['total'] ?>">
    <input type="hidden" name="time" value="<?= $_POST['time'] ?>">
</form>
<button id= order>
    order
</button>