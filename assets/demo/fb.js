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
      timer: 8000,
      placement: {
        from: from,
        align: align
      }
    });
}