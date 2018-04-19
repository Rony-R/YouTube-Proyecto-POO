
function validarContrasena(etiqueta)
{
	if (etiqueta.value.length<8)
	{
		etiqueta.classList.remove("is-valid");
		etiqueta.classList.add("is-invalid");
	}
	else
	{
		etiqueta.classList.remove("is-invalid");
		etiqueta.classList.add("is-valid");
	}
}

function validarEmail(correo) 
{
    var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (patron.test(String(correo.value).toLowerCase()))
	{
    	correo.classList.remove("is-invalid");
        correo.classList.add("is-valid");
        document.getElementById("div-validacion").innerHTML = "Correo valido.";
        return true;
    }
	else
	{
    	correo.classList.remove("is-valid");
        correo.classList.add("is-invalid");
        document.getElementById("div-validacion").innerHTML = "Correo Invalido.";
        return false;
    }
}

function validar()
{
	var resultado = true;
	validarCampoVacio("txt-nombre");
	validarCampoVacio("txt-apellido");
    validarCampoVacio("txt-email");
    validarCampoVacio("txt-password1");
    validarCampoVacio("txt-password2");
    validarCampoVacio("slc-sexo");
    validarCampoVacio("txt-telefono");
    validarCampoVacio("dia");
    validarCampoVacio("mes");
    validarCampoVacio("agno");
}

var validarCampoVacio = function(id)
{

    if(id == "slc-sexo")
    {
        if($("#"+id).val() == "Selecciona tu género")
        {
            $("#"+id).removeClass('is-valid');
		    $("#"+id).addClass('is-invalid');
		    return false;   
        }
        else
        {
            $("#"+id).removeClass('is-invalid');
		    $("#"+id).addClass('is-valid');
		    return true;
        }
    }
    else
    {
        if(id == "dia")
        {
            if($("#"+id).val() == "Día")
            {
                $("#"+id).removeClass('is-valid');
		        $("#"+id).addClass('is-invalid');
		        return false;   
            }
            else
            {
                $("#"+id).removeClass('is-invalid');
		        $("#"+id).addClass('is-valid');
		    return true;
            }
        }
        else
        {
            if(id == "mes")
            {
                if($("#"+id).val() == "Mes")
                {
                    $("#"+id).removeClass('is-valid');
		            $("#"+id).addClass('is-invalid');
		            return false;   
                }
                else
                {
                    $("#"+id).removeClass('is-invalid');
		            $("#"+id).addClass('is-valid');
		            return true;
                }
            }
            else
            {
                if(id == "agno")
                {
                    if($("#"+id).val() == "Año")
                    {
                        $("#"+id).removeClass('is-valid');
                        $("#"+id).addClass('is-invalid');
                        return false;   
                    }
                    else
                    {
                        $("#"+id).removeClass('is-invalid');
                        $("#"+id).addClass('is-valid');
                        return true;
                    }
                }
                else
                {
                    if ($("#"+id).val() == "")
	                {
		                $("#"+id).removeClass('is-valid');
		                $("#"+id).addClass('is-invalid');
		                return false;
	                }
	                else
	                {
		                $("#"+id).removeClass('is-invalid');
		                $("#"+id).addClass('is-valid');
		                return true;
                    }
                }
            }
        }
    }
};

$("#btn-sig-paso").click(function(){
    validar();
    $("#btn-sig-paso").attr("disabled","disabled");

    $("#btn-sig-paso").attr("disabled",false);
});

$("#btn-siguiente").click(function(){

    //validar();
    var mail = $("#txt-email").val();

    if($("#txt-email").val() == "")
    {
        $("#txt-email").removeClass('is-valid');
		$("#txt-email").addClass('is-invalid');
        $("#div-validacion").html("No puedes dejar este campo vacio.");
    }
    else
    {
        $("#nombre-usuario").html($("#txt-email").val());

        $("#Pagina-inicio").removeClass('display-block');
        $("#Pagina-inicio").addClass('display-none');

        $("#Pagina-Contrasena").removeClass('display-none');
        $("#Pagina-Contrasena").addClass('display-block');
    }

    console.log(mail);
    console.log($("#div-validacion").html());
});

$("#infoBasica").click(function(){
    $("#pagina1").removeClass('display-none');
    $("#pagina1").addClass('display-run-in')

    $("#pagina2").removeClass('display-run-in');
    $("#pagina2").addClass('display-none')

    $("#pagina3").removeClass('display-run-in');
    $("#pagina3").addClass('display-none')
});

$("#traducciones").click(function(){
    $("#pagina2").removeClass('display-none');
    $("#pagina2").addClass('display-run-in')

    $("#pagina1").removeClass('display-run-in');
    $("#pagina1").addClass('display-none')

    $("#pagina3").removeClass('display-run-in');
    $("#pagina3").addClass('display-none')
});

$("#configAvanzada").click(function(){
    $("#pagina3").removeClass('display-none');
    $("#pagina3").addClass('display-inline')

    $("#pagina1").removeClass('display-run-in');
    $("#pagina1").addClass('display-none')

    $("#pagina2").removeClass('display-run-in');
    $("#pagina2").addClass('display-none')
});

/**************************************************/

$("#infoBasica2").click(function(){
    $("#pagina1").removeClass('display-none');
    $("#pagina1").addClass('display-run-in')

    $("#pagina2").removeClass('display-run-in');
    $("#pagina2").addClass('display-none')

    $("#pagina3").removeClass('display-run-in');
    $("#pagina3").addClass('display-none')
});

$("#traducciones2").click(function(){
    $("#pagina2").removeClass('display-none');
    $("#pagina2").addClass('display-run-in')

    $("#pagina1").removeClass('display-run-in');
    $("#pagina1").addClass('display-none')

    $("#pagina3").removeClass('display-run-in');
    $("#pagina3").addClass('display-none')
});

$("#configAvanzada2").click(function(){
    $("#pagina3").removeClass('display-none');
    $("#pagina3").addClass('display-inline')

    $("#pagina1").removeClass('display-run-in');
    $("#pagina1").addClass('display-none')

    $("#pagina2").removeClass('display-run-in');
    $("#pagina2").addClass('display-none')
});

/***************************************************/

$("#infoBasica3").click(function(){
    $("#pagina1").removeClass('display-none');
    $("#pagina1").addClass('display-run-in')

    $("#pagina2").removeClass('display-run-in');
    $("#pagina2").addClass('display-none')

    $("#pagina3").removeClass('display-run-in');
    $("#pagina3").addClass('display-none')
});

$("#traducciones3").click(function(){
    $("#pagina2").removeClass('display-none');
    $("#pagina2").addClass('display-run-in')

    $("#pagina1").removeClass('display-run-in');
    $("#pagina1").addClass('display-none')

    $("#pagina3").removeClass('display-run-in');
    $("#pagina3").addClass('display-none')
});

$("#configAvanzada3").click(function(){
    $("#pagina3").removeClass('display-none');
    $("#pagina3").addClass('display-inline')

    $("#pagina1").removeClass('display-run-in');
    $("#pagina1").addClass('display-none')

    $("#pagina2").removeClass('display-run-in');
    $("#pagina2").addClass('display-none')
});