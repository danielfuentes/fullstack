document.body.onload = () => {
const { signupForm } = document.forms

  signupForm.onsubmit = function onFormSubmit(ev) {
    ev.preventDefault()

    if (validateSignupForm()) {
      signupUser()
    }
  }

  function validateSignupForm() {
    const { email, password, passwordRepeat,
     username, termsCondition } = signupForm.elements

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

  const validatePasswordRepeat = (password, repeat) => {
    if (password === repeat) return true

    swal('Error', 'Las contraseñas no son iguales', 'error')
    return false
  }

  function validateUsername(username) {
    if (username.length > 0) return true

    swal('Error', 'Ingrese un nombre de usuario', 'error')
    return false
  }

  function validateTermsCondition(termsConditionChecked) {
    if (termsConditionChecked) return true

    swal('Error', 'Debe aceptar los términos y condiciones', 'error')
    return false
  }

  function signupUser() {
    hacerRequest(requestEnd)

    function requestEnd() {
      swal('Bienvenido', 'Ya eres parte de JavaScript', 'success')
    }
  }

  function hacerRequest(callback) {
    const API_URL = 'https://api.lyrics.ovh/v1'
    const xmlHttp = new XMLHttpRequest()

    xmlHttp.onreadystatechange = function () {
      if (xmlHttp.readyState === 4) {
        // Se termina el request
        callback()
      }
    }

    xmlHttp.open('GET', API_URL,true)
    xmlHttp.send()
  }

}
