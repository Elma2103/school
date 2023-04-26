// Funktion die ausgeführt wird, wenn das Fenster fertig geladen wurde.
// window.onload = function() {
//     let elem = document.getElementById("headline");
//     console.log(elem);
// }

let headline = document.getElementById("headline");

// Ändern des Textes im Element
headline.innerText += ' Test';

// Ändern des HTML Codes innerhalb des Elements
headline.innerHTML += ' <span>Test</span>';

// Style-Eigenschaften über das style-Attribut ändern
// headline.style.background = 'cornflowerblue';
// headline.style.color = 'white';
// headline.style.padding = '15px';
// headline.style.borderRadius = '5px';

// Hinzufügen einer CSS Klasse zu einem Element
headline.classList.add('blue');


let paragraphs = document.getElementsByTagName('p');
console.log(paragraphs);

for (let i = 0; i < paragraphs.length; i++) {
    if (i % 2 == 0) {
        paragraphs[i].classList.add('odd');
    } else {
        paragraphs[i].classList.add('even');
    }
}

// for (let i = 0; i < paragraphs.length - 1; i += 2) {
//     paragraphs[i].classList.add('odd');
//     paragraphs[i+1].classList.add('even');
// }

// let isOdd = true;
// for (let paragraph of paragraphs) {
//     paragraph.classList.add(isOdd ? 'odd' : 'even');
//     isOdd = !isOdd;
// }

let replaceContentElements = document.getElementsByClassName('replace-content');
for (const elem of replaceContentElements) {
    elem.innerHTML = 'JavaScript & HTML Elemente';
}


let specialElements = document.querySelectorAll('div.special p');
console.log(specialElements);
for (const elem of specialElements) {
    elem.style.marginLeft = '50px';
}

const specialWrapper = document.getElementsByClassName('special')[0];
//specialElements = specialWrapper.querySelectorAll('p');

for (const elem of specialWrapper.children) {
    console.log(elem);
}


// Alle Elemente mit der CSS-Klasse delete-me löschen -> Achtung mit while, da ansonsten nicht alle gelöscht werden können
const deleteElements = document.getElementsByClassName('delete-me');
console.log(deleteElements);
while (deleteElements.length > 0) {
    const delElem = deleteElements[0];
    delElem.parentNode.removeChild(delElem);
}

// Neues Element erstellen und im Body Element anfügen
let footerElem = document.createElement('footer');
footerElem.innerHTML = '&copy; by App Coding';

//let bodyElem = document.getElementsByTagName('body')[0];
document.body.appendChild(footerElem);