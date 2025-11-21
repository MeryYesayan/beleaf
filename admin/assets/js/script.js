$(() => {
   $(".upd_category").click(function(){
       let id = $(this).parents(".row").attr("id");
       let name = $(this).parents(".row").find(".name").text();                     
       $.ajax({
            url:"../controler/update_category.php",
            method: "post",
            dataType: "json",
            data: {id, name, action: "update"},
            success: function(res){
                $(".message").text(res.message);
                if(res.status === "success"){
                    $(".message").css({color: "green"});
                }else{
                    $(".message").css({color: "red"});
                }
            }
       })
    })
    $(".del_category").click(function(){
        let id = $(this).parents(".row").attr("id");
        $.ajax({
            url:"../controler/update_category.php",
            method: "post",
            data: {id,  action: "delete"},
            success: function(res){
                location.reload();
            }
        })
    })
    $(".del_product").click(function(){
        let id = $(this).parents("tr").attr("id");
        $.ajax({
            url:"../controler/add_product.php",
            method: "post",
            dataType: "json",
            data: {id, action: "delete_product"},
            success: function(res){
                if(res.status === "success"){
                    $("tr#" + id).remove();
                }
            }
        })
    })
    $(".upd_product").click(function(){
        let id = $(this).parents(".row").attr("id");
        let name = $(this).parents(".row").find(".name").text();                     
        let price = $(this).parents(".row").find(".price").text();                     
        let desc = $(this).parents(".row").find(".desc").text();                     
        $.ajax({
            url:"../controler/update_product.php",
            method: "post",
            dataType: "json",
            data: {id, name, desc, price, action: "update"},
            success: function(res){
                $(".message").text(res.message);
                if(res.status === "success"){
                    $(".message").css({color: "green"});
                }else{
                    $(".message").css({color: "red"});
                }
            }
       })

    })
})