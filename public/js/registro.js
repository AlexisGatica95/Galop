let sel_genero = new SlimSelect({
    select: '#sel_genero',
    hideSelectedOption: true,
    showSearch: false
});
let sel_ano_nacimiento = new SlimSelect({
    select: '#sel_ano_nacimiento',
    hideSelectedOption: true,
    showSearch: false
});
let sel_pais_residencia = new SlimSelect({
    select: '#sel_pais_residencia',
    hideSelectedOption: true
});
let sel_dir_trabajo_pais = new SlimSelect({
    select: '#sel_dir_trabajo_pais',
    hideSelectedOption: true
});
let sel_especialidad = new SlimSelect({
    select: '#sel_especialidad',
    hideSelectedOption: true
});
let sel_organizaciones = new SlimSelect({
    select: '#sel_organizaciones',
    hideSelectedOption: true,
    addable: function (value) {
        // return false or null if you do not want to allow value to be submitted
        if (0) {return false}
    
        // Return the value string
        return value; // Optional - value alteration // ex: value.toLowerCase()
    
        // Optional - Return a valid data object. See methods/setData for list of valid options
        return {
          text: value,
          value: value.toLowerCase()
        }
      }
});

let info = {
    nombre: "Jorge",
    apellido: "Nuñez",
    mail: "jorge1@nodorojo.com",
    genero: "otro",
    ciudad_residencia: "Ciudad de ejemplo",
    hospital: "Hospital de ejemplo",
    interes: "Retinoblastoma,Psicosocial,Transplante de progenitores hematopoyéticos",
    cargo: "Director gneral",
    dir_trabajo_calle: "ENtre rios",
    dir_trabajo_pais: "Argentina",
    dir_trabajo_ciudad: "CABA",
    dir_trabajo_numero: 456,
    dir_trabajo_CP: 21234,
    contrasena: "45689jujuju",
    contrasena2: "45689jujuju",
    ano_nacimiento: 1995,
    pais_residencia: "Argentina",
    especialidad: "Radioterapia"
};
function fill(obj){
let l = Object.keys(obj);
for (var i = 0; i < l.length; i++) {
    let key = l[i];
    let val = obj[key];
    if ($("input[name="+key+"]").length == 1) {
    $("input[name="+key+"]").val(val).trigger("change");
    } else if($("input[name='"+key+"[]']").length > 1) {
    // console.log("tengo que agarrar este input: input[name="+key+"] y asignarle este valor: "+val);
    let val_arr = val.toString().split(",");
    for (let k = 0; k < val_arr.length; k++) {
        // console.log("tengo que agarrar este input: input[name="+key+"[]][value="+val_arr[k]+"] y cambiarle la pro checked a true");
        $("input[name='"+key+"[]'][value='"+val_arr[k]+"']").prop("checked",true).trigger("change");
    }
    } else {
    // $("select[name="+key+"]").val(val).trigger("change");
    // let v = "sel_"+key;
    // console.log(v);
    // window[v].set(val);
    } 
}
}
fill(info);

$(document).on("change keyup","label.error input, label.error select",function(){
    $(this).closest("label[for]").removeClass("error");
    let t = $(this).closest("label[for]").attr("for");
    // console.log("saco "+t);
    errores.remove(t);
    if (errores.length < 1) {
      $("form .errores_form").html("");
    }
});

let errores = [];
// enviar formulario
$(document).on("click tap","#send_form",function(e){
    // chequeo los requeridos de texto
    let req_text = ['nombre','apellido','ciudad_residencia','hospital','cargo','dir_trabajo_calle','dir_trabajo_numero','dir_trabajo_CP','dir_trabajo_ciudad','contrasena','contrasena2'];
    req_text.forEach(field => {
        if($("[name="+field+"]").val() == ""){
            errores.push(field);
        }
    });
    // chequeo los requeridos select
    let req_sel = ['genero','ano_nacimiento','pais_residencia','dir_trabajo_pais','especialidad'];
    req_sel.forEach(field => {
        if($("[name="+field+"]").val() == "" || $("[name="+field+"]").val() == null){
            errores.push(field);
        }
    });
    // chequeo que hayan puesto al menos un interes
    let hay_interes = 0;
    let intereses = [];
    $("[name='interes[]']").each(function(){
        if($(this).prop("checked")){
            intereses.push($(this).val());
            hay_interes = 1;
        }
    });
    if(!hay_interes) {
        // errores.push("interes");
    }
    if(errores.length > 0) {
        errores.forEach(field => {
            $("[for="+field+"]").addClass("error");
        });
        $("form .errores_form").html("Por favor, completá los campos requeridos.");
    } else {
        // enviar
        $("#form-reg").submit();
    }
});