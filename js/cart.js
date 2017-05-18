<!--java script total formula-->

    function findTotal(){
        <!--items multiplication-->

        var qty1 = Number(document.getElementById('qty1').value);
        var price1 = Number(document.getElementById('price1').value);
        var shipping = Number(document.getElementById('cshipping').value);

        var ptotal=qty1*price1;
        var ptotalFix = ptotal.toFixed(2);
        var totalTax = ptotal*0.06.toFixed(2);

        document.getElementById("itemTotal").innerHTML = '$' + ptotalFix;
        document.getElementById("displaySubtotal").innerHTML = '$' + ptotalFix;
        document.getElementById("displaySalesTax").innerHTML = '$' + totalTax.toFixed(2);
        document.getElementById("displayTotal").innerHTML = shipping + ptotal + totalTax;

    }
<!--End java script sum-->