window.addEventListener("scroll", function () {
    let value = window.scrollY;
    if(value >= 280) {
       const tag = document.querySelector('#menuMain');
       tag.style.position = 'fixed';
       tag.style.top = '0';
       tag.style.left = '0';
       tag.style.width = '100%';
       tag.style.zIndex = '1209';
       tag.style.backgroundColor = '#f7f0e8';
       tag.style.padding = '20px 0';
       
    } else {
        const tag = document.querySelector('#menuMain');
        tag.style.position = 'unset';
    }
})

