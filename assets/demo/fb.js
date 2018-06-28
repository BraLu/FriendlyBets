/*Function On Loading*/
function fbShowLoading() {
  // body...
  $(".modal-fbloading").css("display","block");
  //$("#loading").modal({backdrop: 'static', keyboard: false});
}

function fbHideLoading() {
  // body...
  $(".modal-fbloading").css("display","none");
  //$("#loading").modal('hide');
}


/*Function KeyPress "Enter a Button"*/
 function fbOnClick(idInput,idButton) {
   // body...
    $( "#" + idInput).keypress(function(e) {
        if (e.keyCode === 13 && !e.shiftKey) {
            $("#" + idButton).click();
        }
    });
 }

/*Function Alert*/
 function fbNotify(from,align,color,msg) {
    
    var fbIcon = "";

    if (color=="danger") { fbIcon="fa fa-times"; }
      else if (color=="success") { fbIcon="fa fa-check"; }
        else if (color=="info") { fbIcon="fa fa-info"; }
          else if (color=="warning") { fbIcon="fa fa-exclamation"; }
            else { color="fa fa-check"; }

    $.notify({
      icon: fbIcon,
      message: msg
    }, {
      type: color,
      timer: 1000,
      placement: {
        from: from,
        align: align
      }
    });

}
