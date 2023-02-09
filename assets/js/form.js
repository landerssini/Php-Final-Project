const signUpForm = document.getElementById('sign-form');
const signUpInputs = document.querySelectorAll('#sign-form input');

const condition = {
	name: /^[a-zA-Z0-9\_\-]{4,16}$/, 
	password: /^.{4,12}$/, 
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
}

const fields = {
	name: false,
	password: false,
	email: false,
}

const validateForm = (e) => {
	switch (e.target.name) {
		case "name":
			validateField(condition.name, e.target, 'name');
		break;
		case "password":
			validateField(condition.password, e.target, 'spassword');
			validatePassword2();
		break;
		case "password2":
			validatePassword2();
		break;
		case "email":
			validateField(condition.email, e.target, 'email');
		break;
	}
}

const validateField = (condition, input, field) => {
    console.log(field);
	if(condition.test(input.value)){
        
		document.getElementById(`group__${field}`).classList.remove('form__incorrect-group');
		document.getElementById(`group__${field}`).classList.add('form__correct-group');
		document.querySelector(`#group__${field} i`).classList.add('fa-check-circle');
		document.querySelector(`#group__${field} i`).classList.remove('fa-times-circle');
		document.querySelector(`#group__${field} .form__input-error`).classList.remove('form__input-error-active');
		fields[field] = true;
	} else {
		document.getElementById(`group__${field}`).classList.add('form__incorrect-group');
		document.getElementById(`group__${field}`).classList.remove('form__correct-group');
		document.querySelector(`#group__${field} i`).classList.add('fa-times-circle');
		document.querySelector(`#group__${field} i`).classList.remove('fa-check-circle');
		document.querySelector(`#group__${field} .form__input-error`).classList.add('form__input-error-active');
		fields[field] = false;
	}
}

const validatePassword2 = () => {
	const inputPassword1 = document.getElementById('spassword');
	const inputPassword2 = document.getElementById('spassword2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`group__password2`).classList.add('form__incorrect-group');
		document.getElementById(`group__password2`).classList.remove('form__correct-group');
		document.querySelector(`#group__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#group__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#group__password2 .form__input-error`).classList.add('form__input-error-active');
		fields['spassword'] = false;
	} else {
		document.getElementById(`group__password2`).classList.remove('form__incorrect-group');
		document.getElementById(`group__password2`).classList.add('form__correct-group');
		document.querySelector(`#group__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#group__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#group__password2 .form__input-error`).classList.remove('form__input-error-active');
		fields['spassword'] = true;
	}
}

signUpInputs.forEach((input) => {
	input.addEventListener('keyup', validateForm);
	input.addEventListener('blur', validateForm);
});

signUpForm.addEventListener('submit', (e) => {
	e.preventDefault();

	const terms = document.getElementById('terms');
	if(fields.name && fields.password && fields.email && terms.checked ){
		signUpForm.reset();

		document.getElementById('form__succes-message').classList.add('form__succes-message-active');
		setTimeout(() => {
			document.getElementById('form__succes-message').classList.remove('form__succes-message-active');
		}, 5000);

		document.querySelectorAll('.form__correct-group').forEach((icon) => {
			icon.classList.remove('form__correct-group');
		});
	} else {
		document.getElementById('form__message').classList.add('form__message-active');
    }
});