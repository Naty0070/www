let cenakolo = 0; let pocet = 1; let x=0; let dny=0; let cyklonosic=0; let prubeznaCena=0;
function spocitejCenuKol() {
    cenakolo = 0;

    if (document.f1.elements[0].checked) {
        x=parseInt(document.f1.elements[0].value);
        pocet=document.f1.elements[1].value;
        cenakolo += x*pocet;;
    }
    if (document.f2.elements[0].checked) {
        x=parseInt(document.f2.elements[0].value);
        pocet=document.f2.elements[1].value;
        cenakolo += x*pocet;
    }
    if (document.f3.elements[0].checked) {
        x=parseInt(document.f3.elements[0].value);
        pocet=document.f3.elements[1].value;
        cenakolo += x*pocet;
    }
    if (document.f4.elements[0].checked) {
        x=parseInt(document.f4.elements[0].value);
        pocet=document.f4.elements[1].value;
        cenakolo += x*pocet;
    }

    dny=parseInt(document.f5.dobaZapujceni.value);

    cyklonosic= document.f6.rad.value
    prubeznaCena=cenakolo*dny;
    let procenta=parseFloat(cyklonosic/100);
    prubeznaCena=prubeznaCena*procenta+prubeznaCena;
    
    let uzivatel=document.f7.predstava.value;
    if(prubeznaCena >uzivatel){
        document.querySelector("#realita").textContent=('Vaše představa je nereálná!');
    }else{
        document.querySelector("#realita").textContent=('Udaná cena odpovídá požadavku.');

    }
    document.querySelector('#cena').textContent = prubeznaCena+" ,- Kč";
}

function Odesli(){
    let zadane=document.f9.mail.value;
        if(zadane.includes('@')){
            document.querySelector('#odeslano').textContent="Odesláno.";
        }else
            document.querySelector('#odeslano').textContent="Není odesláno!";
        document
}
