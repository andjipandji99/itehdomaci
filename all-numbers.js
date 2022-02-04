function allnumeric(inputtxt) {
    var numbers = /^[0-9]+$/;
    if (inputtxt.value.match(numbers)) {
       document.form1.mesta.focus();
       return true;
    }
    else {
       alert('Molimo Vas da u polje za mesta unesete brojeve!');
       document.form1.mesta.focus();
       return false;
    }
 }