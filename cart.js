let bagItems;
let bagItemsStr = localStorage.getItem('bagItems');
bagItems = bagItemsStr ? JSON.parse(bagItemsStr) : [];
displayBagItemCount();


function addToCart(id) {
    bagItems.push(id);
    localStorage.setItem('bagItems', JSON.stringify(bagItems));
    displayBagItemCount();
}

function displayBagItemCount() {
    let bagItemCountElement = document.querySelector('.cart-count');
    if (bagItems.length > 0) {
        bagItemCountElement.style.visibility = 'visible';
        bagItemCountElement.innerText = bagItems.length;
    } else {
        bagItemCountElement.style.visibility = 'hidden';
    }

}
// localStorage.removeItem('bagItems'); //Removing product