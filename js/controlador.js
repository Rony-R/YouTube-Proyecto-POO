
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
    }
	else
	{
    	correo.classList.remove("is-valid");
        correo.classList.add("is-invalid");
        document.getElementById("div-validacion").innerHTML = "Correo Invalido.";
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

    validar();

    if($("#txt-email").val() == "")
    {
        $("#btn-siguiente").attr("href", "#"); //cambiando la propiedad href del anchor
        $("#div-validacion").html("No puedes dejar este campo vacio.");
    }
    else
    {
        $("#btn-siguiente").attr("href", "contrasena-inicio-google.html");
    }

});