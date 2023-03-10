let quantity = 1

function increment() {
    quantity += 1
    update(quantity)
}

function decrement(){
    quantity -= 1
    if(quantity <= 1) quantity = 1
    update(quantity)
}

function update(q){
    document.getElementById('quantityLabel').innerText = q
    document.getElementById('quantityInput').value = q
    const tot = document.getElementById('total-price')
    const total = tot.getAttribute('data-quantity')
    
    let t = parseFloat(total) * q
    tot.textContent = t + ".00"
    document.getElementById('totalPrice').value = t

}





//--------------quantity-----------------------//
// const plus = document.querySelector(".plus"),
//     minus = document.querySelector(".minus"),
//     num = document.querySelector(".num");

// window.addEventListener("load", ()=> {
//     if (localStorage["num"]) {
//         num.innerText = localStorage.getItem("num");
//     } else {
//         let a = "01";
//         num.innerText = a;
//     }
// });

// plus.addEventListener("click", ()=> {
//     a = num.innerText;
//     a++;
//     a = (a < 10) ? "0" + a : a;
//     localStorage.setItem("num", a);
//     num.innerText = localStorage.getItem("num");
// });

// minus.addEventListener("click", ()=> {
//     a = num.innerText;
//     if (a > 1) {
//         a--;
//         a = (a < 10) ? "0" + a : a;
//         localStorage.setItem("num", a);
//         num.innerText = localStorage.getItem("num");
//     }
// });
// //-------feedback form--------//
// function toggle_visibility() {
//     var e = document.getElementById('feedback-main');
//     if(e.style.display == 'block')
//        e.style.display = 'none';
//     else
//        e.style.display = 'block';
//  }


