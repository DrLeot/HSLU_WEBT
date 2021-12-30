function checknumbereven(){
    let category = document.getElementById('category').value;
    let numberofservants = document.getElementById('amountpeople').value;

    if(numberofservants%2 !== 0 && category === 'Hauptgang'){
        alert("Anzahl Personen muss aus Umrechnungsgründen beim Hauptgang eine gerade Zahl sein. ");
        return false;
    }else{
        return true;
    }
}
