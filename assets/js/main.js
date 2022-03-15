$(document).ready(function(){
    // copy link
    $('.copy-link').click(function(){
        var copyText = document.getElementById("link");
        navigator.clipboard.writeText(copyText.value);
        document.querySelector('.copy-link').innerHTML='<i class="fa-solid fa-clipboard-check"></i>'
    })
    // typing script
    var typed = new Typed(".typing", {
        strings: ["Participation","Apperication"],
        typeSpeed: 100,
        backSpeed: 100,
        loop: true
    });
})
