window.addEventListener('DOMContentLoaded', function() {
    var linksScroll = document.querySelectorAll('a[href^="#"]');
    for (var i = 0; i < linksScroll.length; i++) {
      linksScroll[i].addEventListener('click', scrollParaDestino);
    }
  
    function scrollParaDestino(event) {
      event.preventDefault();
      var destinoID = this.getAttribute('href');
      var destinoElemento = document.querySelector(destinoID);
      var posicaoDestino = destinoElemento.offsetTop;
  
      window.scrollTo({
        top: posicaoDestino,
        behavior: "smooth"
      });
    }
  });

  
  