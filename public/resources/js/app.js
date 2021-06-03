if (window.location.pathname.includes("/cart")) {
    setAllEvent();
}
let element = null;
async function leaveComponent(event, price) {
    let elem = $(event.target);
    let parent = $(event.target.parentElement);
    await elem.replaceWith(`<span class="qte">${elem.val()}</span>`);
    parent = parent.parent();
    $.post( "/changeCart", { qte:price } );
    let unit = parseInt(parent.find(`.unit`).text());
    price = unit*price;
    parent.find(`.total`).text(`${price}`)
    $(`.subtotal`).text(`${price*0.8}€`);
    $(`.tva`).text(`${price*0.2}€`);
    $(`.totalMain`).text(`${price}€`);
    setAllEvent();
}
function setAllEvent() {
    $(`.qte`).on("click", async(e) => {
        let elem = $(e.target);
        let parent = $(e.target.parentElement);
        await elem.replaceWith($(`<input type="number" name="qte" class="editing" min="1" max="99" value="${parseInt($(e.target).text())}">`))
        elem = parent.find('.editing');
        await $(".editing").trigger('focus');
        let editing = $(`.editing`);
        await editing.on("focusout", (e) => {
            let price = elem.val();
            leaveComponent(e, price);
        })
        await editing.on("keypress", (e) => {
            if(e.keyCode === 13) {
                let price = elem.val();
                leaveComponent(e, price);
            }
        })
    })
}