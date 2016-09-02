var elem = document.getElementById('zm_b');
 
  function backg(n){
    
    switch(n){
      case 1:elem.style.backgroundImage="url(imag/fon.jpeg)";  elem.style.backgroundPosition="66.5% 0%"; elem.style.backgroundSize="410% 125%"; break;
      case 2:elem.style.backgroundImage="url(imag/fon.jpeg)"; elem.style.backgroundPosition="0% 0%"; elem.style.backgroundSize="410% 125%"; break;
      case 3:elem.style.backgroundImage="url(imag/fon.jpeg)"; elem.style.backgroundPosition="99.5% 0%"; elem.style.backgroundSize="410% 125%"; break;
     

    }
    //setTimeout(function () {elem.style.background="url(imag/GTR1.jpg) no-repeat"}, 100);
  }

  elem.addEventListener("mouseover",  function () {elem.style.backgroundImage="url(imag/fon.jpeg)";
                                                    elem.style.backgroundPosition="33% 0%";
                                                     elem.style.backgroundSize="410% 125%";});
