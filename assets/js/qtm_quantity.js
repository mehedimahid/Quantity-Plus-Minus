function triggerChange(input) {
    const event = new Event('change', { bubbles: true });
    input.dispatchEvent(event);
}
function qpm_increment(btn) {
    const parent = btn.closest('.quantity')
    let originQty = parent.querySelector('input.qty')
    let value = parseInt(originQty.value)
    // let addToCardBtn = parent.parentElement.querySelector('.add_to_cart_button ')
    originQty.value = value + 1;
    let addToCardBtn = parent.closest('.product')?.querySelector('.add_to_cart_button');
    if (addToCardBtn) {
        addToCardBtn.setAttribute('data-quantity', value + 1)
    }
     triggerChange(originQty);
}

function qpm_decrement(btn) {
    const parent = btn.closest('.quantity')
    let originQty = parent.querySelector('input.qty')
    let value = parseInt(originQty.value)
    let addToCardBtn = parent.closest('.product')?.querySelector('.add_to_cart_button');
    if (addToCardBtn){
        addToCardBtn.setAttribute('data-quantity', value - 1)
    }
    if ( value > 1) {
        originQty.value = value - 1
    }
    triggerChange(originQty);

}
