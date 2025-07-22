document.addEventListener('DOMContentLoaded', ()=>{

})
function qpm_increment( btn ){
    const parent = btn.closest('.quantity')
    let originQty = parent.querySelector('input.qty')
    let value = parseInt(originQty.value)
    originQty.value = value +1;
}
function qpm_decrement(btn){
    const parent = btn.closest('.quantity')
    let originQty = parent.querySelector('input.qty')
    let value = parseInt(originQty.value)
    if(value > 1){
        originQty.value = value - 1
    }
}
console.log('After decrement')
