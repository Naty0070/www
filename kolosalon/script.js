$(document).ready(function(){
    let cenakolo = 0; let pocet = 1; let dny=5; let cyklonosic=0; let prubeznaCena=0; let procenta=0; let hlaska="";
    let druhArray=document.getElementsByName('druhy[]');
    let pocetArray=document.getElementsByName('pocet[]');

    
    $('.druh').click(function(){
       spocitej();
       predstavaUzivatel();
    });
    $('.poc').change(function(){
       spocitej();
       predstavaUzivatel();

    });
    $('#dobaZapujceni').change(function(){
        dny=parseInt(this.value);
        spocitej();
        predstavaUzivatel();
     });

    
     $('.nosic').click(function(){
        spocitej();
        radiob();
       
     });

     $('#predstava').change(function(){
        spocitej();
        predstavaUzivatel();
     });
    

    $('#celkovaCena').click(function(){
       spocitej(); 
       radiob();
        predstavaUzivatel();
        $('#cena').text("Celková cena "+cenakolo+" ,- Kč");
        $("#realita").text(hlaska);

    });

    $('#odesli').click(function(){
        let zadane=$('#mail').val();
        if(zadane.includes('@')){
            $('#odeslano').text('Odesláno!');
        }else
        $('#odeslano').text('Není odesláno!');

    });

    function spocitej() {
        cenakolo = 0; pocet=1;
        for (let i = 0; i < druhArray.length; i++) {
            if (druhArray[i].checked) {
                pocet = pocetArray[i].value;
                cenakolo += parseInt(druhArray[i].value * pocet*dny);
            }
        }
    };
    
    function predstavaUzivatel() {
        let uzivatel = parseInt($('#predstava').val());
        if (cenakolo>uzivatel) {
            hlaska='Vaše představa je nereálná!';

        } else {
            hlaska='Udaná cena odpovídá požadavku.';
        };
    };

    function radiob(){
        prubeznaCena = 0; procenta = 0; cyklonosic = 0;
        cyklonosic = $('.nosic:checked').val();
        procenta = parseFloat(cyklonosic / 100);
        prubeznaCena = cenakolo;
        cenakolo = parseInt(prubeznaCena * procenta + prubeznaCena);
    }

   
});




