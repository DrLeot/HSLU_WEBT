function checknumbereven(){
    let numberofservants = document.getElementById('amountpeople').value;

    if(numberofservants%2 !== 0){
        alert("Anzahl Personen muss aus Umrechnungsgründen eine gerade Zahl sein. ");
    }

    return numberofservants%2 === 0;
}
