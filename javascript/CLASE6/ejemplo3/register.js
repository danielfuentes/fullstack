window.onload=function(){
  //Aquí guardo el formulario con sus elementos
  var registerForm = document.forms[0]
  //Aquí armo mi función para que se ejecute una vez que el usuario envie ó de enter en cada input
  registerForm.onsubmit = function onFormSubmit(evento) {
    //Aquí evito que por defecto se envie el formulario
    //Si el formulario pasa las validaciones doy el ingreso al usuario
    if (!validateRegisterForm()) {
      evento.preventDefault()
    }else{
      registerForm.submit}
  }
  //Esta es la función que valida todos los campos del formulario
  function validateRegisterForm() {
    //Esta manera de programarlo en ECMA6
    var { email, password, passwordRepeat,
    username, termsCondition } = registerForm.elements
    //De esta forma se programaba antes del 2015
    //email = registerForm.elements.email
    //password = registerForm.elements.password
    //Y así con cada una de las variables
    //Esta es una forma mas corta de hacer un if simple  
    if (!validateEmail(email.value)) return false
    if (!validatePassword(password.value)) return false
    if (!validatePasswordRepeat(password.value, passwordRepeat.value)) return false
    if (!validateUsername(username.value)) return false
    if (!validateTermsCondition(termsCondition.checked)) return false
         return true
    }
    
    function validateEmail(email) {
      var re = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
      if (re.test(email)) return true
  
      swal('Error', 'Ingrese un email válido', 'error')
      return false
    }
  
    function validatePassword(password) {
      const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/
      if (re.test(password)) return true
  
      swal('Error', 'Ingrese una contraseña válida', 'error')
      return false
    }
  
    function validatePasswordRepeat(password,repeat){
      if (password === repeat) return true
  
      swal('Error', 'Las contraseñas no son iguales', 'error')
      return false
    }
  
    function validateUsername(username) {
      if (username.length >= 6) return true
  
      swal('Error', 'Ingrese un nombre de usuario válido', 'error')
      return false
    }
  
    function validateTermsCondition(termsConditionChecked) {
      if (termsConditionChecked) return true
  
      swal('Error', 'Debe aceptar los términos y condiciones', 'error')
      return false
    }
    
    
    
    
}   

