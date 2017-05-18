<!--java script total formula-->

    function findTotal(){
        <!--items multiplication-->

        var qty1 = Number(document.getElementById('qty').value);
        var price1 = Number(document.getElementById('price').value);

        var qty2 = Number(document.getElementById('qty1').value);
        var price2 = Number(document.getElementById('price1').value);


        var sampletax = 0.06;
        var ptotal=qty1*price1;
        var ptotal1=qty2*price2;
        var ptotalFix = ptotal.toFixed(2);
        var totalTax = ptotal*0.06.toFixed(2);

        document.getElementById("itemTotal").innerHTML = '$' + ptotalFix;
        document.getElementById("displaySubtotal").innerHTML = '$' + ptotalFix;
        document.getElementById("displaySalesTax").innerHTML = totalTax.toFixed(2);
        document.getElementById("displayTotal").innerHTML = ptotal+totalTax;

    }
<!--End java script sum-->