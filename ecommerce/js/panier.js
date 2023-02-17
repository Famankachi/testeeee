$(document).ready(function(){
    var totalPrice = $("span[data-total-price='totalPrice']");
    var prixEles = $("p[data-prod-total='prodTotal']");
    var qty = -1, idProd = -1;
    var prix = -1, total = -1, prxT = -1;
    var elemQty = $(".qty");
    var panier = $("#panier");
    /* functions */
    function refreshTotalPrice(){
        let prixEles = $("p[data-prod-total='prodTotal']");
        let s = 0;
        for(let i=0; i<prixEles.length; i++){
            s += parseFloat(prixEles[i].innerText);
        }
        totalPrice.text(s.toFixed(2).toString());
    }

    function updateQty(prod){
        idProd = prod.data('id-prod');
        qty = $("input[data-qty = 'qty"+idProd+"']");
        $.ajax({
            url: "http://localhost/ecommerce/panier/updateQty",
                method: "POST",
                data: {
                    idProd: idProd,
                    idPan: panier.val(),
                    qty: qty.val()
                },
                success: function(data){
                    console.log(data);
                }
        });
    }

    function deleteProd(prod){
        $.ajax({
            url: "http://localhost/ecommerce/panier/deleteProd",
            method: "POST",
            data: {
                idProd: idProd,
                idPan: panier.val()
            },
            success: function(data){
                console.log(data);
            }
        });
    }
    /* ----------- */

    refreshTotalPrice();

    $(document).on("click", "button[data-incr = 'incr']", function(){
        idProd = $(this).data('id-prod');
        prix = $("#prix"+idProd);
        qty = $("input[data-qty = 'qty"+idProd+"']");
        total = $("p[data-total = 'total"+idProd+"']");
        if(qty.val() < 99){
            qty.val(parseInt(qty.val())+1);
            prxT = parseFloat(prix.text())*parseInt(qty.val());
            total.text(prxT.toFixed(2).toString());
        }
        refreshTotalPrice();
        updateQty($(this));
    });

    $(document).on("click", "button[data-decr = 'decr']", function(){
        idProd = $(this).data('id-prod');
        prix = $("#prix"+idProd);
        qty = $("input[data-qty = 'qty"+idProd+"']");
        total = $("p[data-total = 'total"+idProd+"']");
        if(qty.val() > 1){
            qty.val(parseInt(qty.val())-1);
            prxT = parseFloat(prix.text())*parseInt(qty.val());
            total.text(prxT.toFixed(2).toString());
        }
        refreshTotalPrice();
        updateQty($(this));
    });

    elemQty.on("input", function(){
        idProd = $(this).data('id-prod');
        qty = $("input[data-qty = 'qty"+idProd+"']");
        prix = $("#prix"+idProd);
        if(qty.val() < 1 || qty.val() > 99)
            qty.val(1);
        total = $("p[data-total = 'total"+idProd+"']");
        prxT = parseFloat(prix.text())*parseInt(qty.val());
        total.text(prxT.toFixed(2).toString());
        refreshTotalPrice();
        updateQty($(this));
    });

    elemQty.on('focus', function(){
        $(this).select();
    });

    $(document).on("click", "button[data-del='del']", function(){
        if (confirm('Delete This Product From Cart ?')) {
            idProd = $(this).data('id-prod');
            total = $("p[data-total = 'total"+idProd+"']");
            totalVal = parseFloat(total.text());
            totalPriceVal = parseFloat(totalPrice.text());
            totalPrice.text((totalPriceVal-totalVal).toFixed(2).toString());
            $("#prod"+idProd).remove();
            deleteProd($(this));
            console.log('product successfuly deleted');
        } else {
            console.log('product was not deleted');
        }
    });

    $(document).on("click", "button[data-cart ='addToCart']", function(){
        idProd = $(this).data('id-prod');
        $.ajax({
            url: "http://localhost/ecommerce/panier/addToCart",
            method: "POST",
            data: {
                idProd: idProd,
                idPan: panier.val()
            },
            success: function(data){
                if(data === "notLoged")
                    alert("You're not logged in !")
                else if(data === "exist")
                    alert("Product Already Exist !")
                else{
                    alert("Product Added Successfuly");
                    console.log(data);
                }
            }
        });
    });
});