function IsValidEmail(strEmail) {
    if (strEmail.length > 0) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(strEmail)) {
            return (true);
        }
        return (false);
    }
}

function IsValidWebAddress(strWebAddress) {
    if (strWebAddress.length > 0) {
        var regEx = "http(s)?://([\w-]+\.)+[\w-]+(/[\w- ./?%&=]*)?";
        if (regEx.test(strWebAddress)) {
            return (true);
        }
        return (false);
    }
}

function checkSpecialKeys(e) {
    if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40)
        return false;
    else
        return true;
}

function checkTextAreaMaxLength(textBox, e, length) {
    var mLen = textBox["MaxLength"];
    if (null == mLen)
        mLen = length;

    var maxLength = parseInt(mLen);
    if (!checkSpecialKeys(e)) {
        if (textBox.value.length > maxLength - 1) {
            if (window.event)//IE
            {
                textBox.value = textBox.value.substring(0, maxLength - 1);
                e.returnValue = false;
            }
            else//Firefox
                e.preventDefault();
        }
    }
}

function RemoveExtraText(textBox) {
    var mLen = textBox["MaxLength"];
    if (null != mLen) {
        var maxLength = parseInt(mLen);
        if (!checkSpecialKeys(e)) {
            if (textBox.value.length > maxLength - 1) {
                textBox.value = textBox.value.substring(0, maxLength - 1);
            }
        }
    }
}

function ValidateTextAreaMaxLength(textBox, length) {
    var mLen = textBox["MaxLength"];
    if (null == mLen)
        mLen = length;
    var maxLength = parseInt(mLen);
    if (textBox.value.length > maxLength - 1) {
        //         Please enter no more than {0} characters. You've currently entered {1} characters
        alert("Please enter not more than " + maxLength - 1 + "characters. You've currently entered " + textBox.value.length + "characters");
        // focus(textBox);
    }
}

function IsValidAlphaNumericText(str) {
    if (str.length > 0) {
        var strInvalidCharacters = "~,`,!,@,#,$,%,^,&,*"; // invalied characters in CSV format.
        var strInvaildCahrs = strInvalidCharacters.split(',');
        for (var i = 0; i < strInvaildCahrs.length; i++) {
            if (strInvaildCahrs[i] != "") {
                if (str.indexOf(strInvaildCahrs[i]) >= 0) {
                    return (false);
                    break;
                }
            }
        }
        return (true);
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

function isNumeric(e, obj, allowdecimal, allowCheck) {
    var k = e.which ? e.which : e.keyCode
    if (parseInt(k) != 46 && parseInt(k) != 8 && parseInt(k) != 9 && parseInt(k) != 116 && parseInt(k) != 46 && parseInt(k) < 48 || parseInt(k) > 57) {
        return false;
    }
    else {
        if (allowCheck == 'Y') {
            vl = obj.value + String.fromCharCode(k);
            if (parseInt(vl) > 100) {
                return false;
            }
        }
        if (parseInt(k) == 46 && allowdecimal == 'N') {
            return false;
        }
        else {
            if (parseInt(k) == 46) {
                if (obj.value.split('.').length > 1) {
                    return false;
                }
            }
        }
    }
    return true;
}

function isAlphbet(e) {
    var k = e.which ? e.which : e.keyCode
    if (parseInt(k) != 46 && parseInt(k) != 8 && parseInt(k) != 9 && parseInt(k) != 116 && parseInt(k) != 46 && (parseInt(k) < 97 || parseInt(k) > 122) && parseInt(k) != 32 && parseInt(k) != 15 && (parseInt(k) < 65 || parseInt(k) > 90)) {
        return false;
    }

    return true;
}
