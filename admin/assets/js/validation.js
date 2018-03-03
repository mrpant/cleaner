
function ValidatingControls(This, e, InputType, MaxLength) {


    var ASCIIKey = (e.which != null) ? e.which : e.keyCode;
    if (This.value.length == MaxLength) {
        if (e.preventDefault != null) {
            e.preventDefault();
        }
        else {
            e.returnValue = false;
        }
    }

    var IsCtrlKey = false;
    if (ASCIIKey == 8 || ASCIIKey == 46) {
        IsCtrlKey = true;
    }

    if (InputType == "Numeric") {
        if (!((ASCIIKey >= 47 && ASCIIKey <= 57) || IsCtrlKey == true)) {
            if (e.preventDefault != null) {
                e.preventDefault();
            }
            else {
                e.returnValue = false;
                return;
            }
        }
    }
    else if (InputType == "Alphabet") {
        if (!((ASCIIKey >= 65 && ASCIIKey <= 90) || (ASCIIKey >= 97 && ASCIIKey <= 122) || ASCIIKey == 32 || IsCtrlKey == true)) {
            if (e.preventDefault != null) {
                e.preventDefault();
            }
            else {
                e.returnValue = false;
                return;
            }
        }
    }
    else if (InputType == "AlphaNumeric") {
        var IsAlphabet = false;
        var IsNumeric = false;

        if ((ASCIIKey >= 65 && ASCIIKey <= 90) || (ASCIIKey >= 97 && ASCIIKey <= 122) || ASCIIKey == 32) {
            IsAlphabet = true;
        }
        if (ASCIIKey >= 47 && ASCIIKey <= 56) {
            IsNumeric = true;
        }

        if ((IsAlphabet == false && IsNumeric == false) && IsCtrlKey == false) {
            if (e.preventDefault != null) {
                e.preventDefault();
            }
            else {
                e.returnValue = false;
                return;
            }
        }

    }
}
function CheckIsNaN(CtrlId) {
    if (isNaN(CtrlId.value) == true) {
        alert('Only Numeric Values Are Allowed');
        CtrlId.value = "";
        CtrlId.focus();
        return;
    }
}

