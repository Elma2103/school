function clickMe() {
    alert('well done!');
}

let clickMeButton = document.getElementById('click-me');
//clickMeButton.onclick = clickMe;

clickMeButton.addEventListener('click', clickMe);
clickMeButton.addEventListener('mouseenter', function() {
    console.log('enter button');
});

clickMeButton.addEventListener('mouseleave', function() {
    console.log('leave button');
});

/*******************************************
 Inch to CM Converter
 *******************************************/
const inch2cm = 2.54;

function convertInchesToCm(event) {
    let inches = document.getElementById('inches').value;
    let result = inches * inch2cm;
    document.getElementById('conversion-result').innerText = `Zentimeter: ${result}`;
    
    // Absenden des Formulars und damit verbundens Neuladen der Seite verhindern
    event.preventDefault();
}

let convertInchToCmButton = document.getElementById('convert-inch-to-cm-form');
convertInchToCmButton.addEventListener('submit', convertInchesToCm);

let inchesInput = document.getElementById('inches');
inchesInput.addEventListener('keyup', convertInchesToCm);

document.addEventListener('scroll', function() {
    console.log(new Date());
});

/*******************************************
 Registration Validation
 *******************************************/

document.getElementById('registration-form').addEventListener('submit', function(event) {
    console.log(event);

    let firstName = document.getElementById('first-name');
    let lastName = document.getElementById('last-name');
    let email = document.getElementById('email');

    let isValid = true;

    // Überprüfen des Vornames
    if (firstName.value.length < 2) {
        let firstNameError = null;
        isValid = false;

        // Suche nach einem span-Element mit der Klasse 'error-message' innerhalb des divs vom Eingabefeld
        for (let child of firstName.parentNode.children) {
            if (child.classList.contains('error-message')) {
                firstNameError = child;
                break;
            }
        }

        // wenn kein Element gefunden wurde (firstNameError ist NULL), dann lege ein neues Element an
        if (firstNameError == null) {
            firstNameError = document.createElement('span');
            firstNameError.innerText = 'Bitte geben Sie mind. 2 Zeichen ein';
            firstNameError.classList.add('error-message');
            firstName.parentNode.appendChild(firstNameError);
        }
    } else {
        for (let child of firstName.parentNode.children) {
            if (child.classList.contains('error-message')) {
                firstName.parentNode.removeChild(child);
            }
        }
    }

    // Überprüfen des Nachname
    if (lastName.value.length < 2) {
        let lastNameError = null;
        isValid = false;

        // Suche nach einem span-Element mit der Klasse 'error-message' innerhalb des divs vom Eingabefeld
        for (let child of lastName.parentNode.children) {
            if (child.classList.contains('error-message')) {
                lastNameError = child;
                break;
            }
        }

        // wenn kein Element gefunden wurde (lastNameError ist NULL), dann lege ein neues Element an
        if (lastNameError == null) {
            lastNameError = document.createElement('span');
            lastNameError.innerText = 'Bitte geben Sie mind. 2 Zeichen ein';
            lastNameError.classList.add('error-message');
            lastName.parentNode.appendChild(lastNameError);
        }
    } else {
        for (let child of lastName.parentNode.children) {
            if (child.classList.contains('error-message')) {
                lastName.parentNode.removeChild(child);
            }
        }
    }

    // Überprüfen des Email
    const emailRegex = /[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z0-9]+/g;

    if (!email.value.match(emailRegex)) {
        let emailError = null;
        isValid = false;

        // Suche nach einem span-Element mit der Klasse 'error-message' innerhalb des divs vom Eingabefeld
        for (let child of email.parentNode.children) {
            if (child.classList.contains('error-message')) {
                emailError = child;
                break;
            }
        }

        // wenn kein Element gefunden wurde (emailError ist NULL), dann lege ein neues Element an
        if (emailError == null) {
            emailError = document.createElement('span');
            emailError.innerText = 'Bitte geben Sie eine gültige E-Mail Adresse ein ein';
            emailError.classList.add('error-message');
            email.parentNode.appendChild(emailError);
        }
    } else {
        for (let child of email.parentNode.children) {
            if (child.classList.contains('error-message')) {
                email.parentNode.removeChild(child);
            }
        }
    }

    if (!isValid) {
        // Absenden des Formulars und damit verbundens Neuladen der Seite verhindern
        event.preventDefault();
    }
});