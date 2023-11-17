let carts = document.querySelectorAll('.add-cart');

let products = [
    {
        name: 'Pizza',
        price: '3500',
        inCart:0
    },
    {
        name: 'Pizza',
        price: '3500',
        inCart:0
    },
    {
        name: 'Pizza',
        price: '3500',
        inCart:0
    }
]
for (let i=0; i < carts.length; i++){
    carts[i].addEventListener('click', () => {
        cartNumbers();
    })
}

function onLoadCartNumber(){
    let productNumbers = localStorage.getItem('cartNumbers');

    if(productNumbers){
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');

    productNumbers = parseInt(productNumbers);
    if(productNumbers){
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }
    
}
onLoadCartNumber();