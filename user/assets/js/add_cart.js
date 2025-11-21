$(() =>{
    $(".add_cart").click(function(){
        let id =$(this).parents(".product").attr("id");
        $.ajax({
            url: "../controller/add_to_cart.php",
            method: "post",
            data: {id, action:"add_to_cart"},
            success: function(res){
                if(res){
                    location.href = "./login.php";
                }
            }
        })
    })

    $(".plus").click(function(){
        let prodId = $(this).parents(".cart_item").attr("id");
        let quant = +$(this).siblings(".quant").text();
        let totalPrice = +$(this).parents(".cart_item").find(".price").text();
        
        let price = totalPrice / quant;
        quant++;
        $(this).siblings(".quant").text(quant);
        $(this).parents(".cart_item").find(".price").text(quant * price);

        $.ajax({
            url: "../controller/add_to_cart.php",
            method: "post",
            dataType: "json",
            data: {
                action: "update_quantity",
                quantity : quant,
                product_id: prodId
            },
            success: function(res){
                if(res.status === "success"){
                    $(".success").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000)
                }else if(res.status === "error"){
                    $(".error").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000)
                }
                updateTotal();
            }
        })
    })

    $(".minus").click(function () {
        let prodId = $(this).parents(".cart_item").attr("id");
        let quant = $(this).parents(`div#${prodId}`).find(".quant");
        let totalPrice = $(".minus").parents("div#" + prodId).find(".price");
        let price = +totalPrice.text() / +quant.text();        
        let newQuant = +quant.text() -1;
        $.ajax({
            url: "../controller/add_to_cart.php",
            method: "post",
            dataType: "json",
            data: {
                action: "update_quantity",
                quantity: newQuant,
                product_id: prodId
            },
            success: function (res) {
                if (res.status === "success") {
                    $(".success").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000);
                    if(newQuant < 1){
                        $(`div#${prodId}`).remove();
                    }else {
                        quant.text(newQuant);
                        let newTotalPrice = price * newQuant;
                        totalPrice.text(newTotalPrice);
                    }
                    updateTotal();
                } else if (res.status === "error") {
                    $(".error").text(res.message);
                }
            }
        })
    })

   
    $(".delete_cart").click(function(){
        let prodId = $(this).parents(".cart_item").attr("id");
        $.ajax({
            url: "../controller/add_to_cart.php",
            method: "post",
            dataType: "json",
            data: {product_id: prodId, action:"delete_cart"},
            success: function(res){
                if(res.status === "success"){
                    $(".success").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000);
                    $("div#" + prodId).remove();
                }else if(res.status === "error"){
                    $(".error").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000)
                }
            }
        })
    })

    $(".buy").click(function(){
        let id = $(this).parents(".cart_item").attr("id");
        let quantity = $(this).parents(".cart_item").find(".quant").text();
        
        $.ajax({
            url: "../controller/buy_controller.php",
            method: "post",
            dataType: "json",
            data: {
                id,quantity, action: "buy_item"
            },
            success: function(res){                

                if(res.status === "success"){
                    $(".success").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000);
                    $("div#" + id).remove();
                    updateTotal();
                }else if(res.status === "error"){
                    $(".error").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000)
                }
            }
        })
    })

    $(".clear").click(function(){
        $.ajax({
            url:"../controller/clear_cart.php",
            method: "post",
            dataType: "json",
            data: {action: "clear_cart"},
            success: function(res){
                 if(res.status === "success"){
                    $(".success").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000);
                    $("#cart").empty();
                    updateTotal();
                }else if(res.status === "error"){
                    $(".error").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000)
                }
            }
        })
    })


    $(".buy_all").click(function(){
        $.ajax({
            url: "../controller/buy_controller.php",
            method: "post",
            dataType: "json",
            data: {action: "buy_all"},
            success: function(res){
                if(res.status === "success"){
                    $(".success").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000);
                    updateTotal();
                    $("#cart").empty();
                }else if(res.status === "error"){
                    $(".error").text(res.message);
                    setTimeout(() =>{
                        $(".success").empty();
                    }, 2000)
                }
            }
        })
    })

    function updateTotal(){
        let total = 0;
        $(".price").each(function(_, tag){
            let price = +$(tag).text();       
            total += price;     
        });
        $(".total").text(total);
    }



})