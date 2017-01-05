

$(function numerDropDown(class_selector){
    var $select = $(".class_selector");
    for (i=1;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});​