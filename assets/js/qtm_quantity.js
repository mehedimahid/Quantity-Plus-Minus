document.addEventListener('DOMContentLoaded', ()=>{

})
function data_quantity(){

}
function qpm_increment( btn ){
    const parent = btn.closest('.quantity')
    let originQty = parent.querySelector('input.qty')
    let value = parseInt(originQty.value)
    // let addToCardBtn = parent.parentElement.querySelector('.add_to_cart_button ')
    originQty.value = value +1;
    let addToCardBtn = parent.closest('.product')?.querySelector('.add_to_cart_button');
    if(addToCardBtn){
        addToCardBtn.setAttribute('data-quantity', value + 1)
    }
}
function qpm_decrement(btn){
    const parent = btn.closest('.quantity')
    let originQty = parent.querySelector('input.qty')
    let value = parseInt(originQty.value)
    let addToCardBtn = parent.parentElement.querySelector('.add_to_cart_button ')

    if(addToCardBtn && value > 1){
        originQty.value = value - 1
        addToCardBtn.setAttribute('data-quantity', value - 1)

    }
}
