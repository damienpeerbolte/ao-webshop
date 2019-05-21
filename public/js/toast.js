function showOrderToast() {
    var toast = document.getElementById("orderToast");
    toast.classList.add("show");
    setTimeout(function(){
        toast.classList.remove("show");
    }, 3000);
}

function showCartToast() {
    var toast = document.getElementById('cartToast');
    toast.classList.add("show");
    setTimeout(function(){
        toast.classList.remove("show");
    }, 3000);
}

if(window.location.href.indexOf("?success") > 0) {
    showOrderToast();
    console.log("success");
} else if(window.location.href.indexOf("?added") > 0) {
    showCartToast();
    console.log("added");
}
