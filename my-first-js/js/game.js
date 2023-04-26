const gameBoardElem = document.getElementById('game-board');
const gameBoardWidth = gameBoardElem.offsetWidth;
const gameBoardHeight = gameBoardElem.offsetHeight;

const clickMeElem = document.getElementById('click-me');
const clickMeLength = 75;

const counterElem = document.getElementById('counter');
const secondsRemainingElem = document.getElementById('remaining-seconds');

const startBtnElem = document.getElementById('start-game');
const resetBtnElem = document.getElementById('reset-game');

const gameHistoryElem = document.getElementById('game-history');

const newHistoryEntryForm = document.getElementById('new-history-entry-form');

const initSecondsRemaining = 15;

let points = 0;
let secondsRemaining;
let secondsRemainingInterval;
let lastClickTimestamp;

function randomPosition() {
    let xMax = gameBoardWidth - clickMeLength;
    let yMax = gameBoardHeight - clickMeLength;

    let posX = Math.round(Math.random() * xMax);
    let posY = Math.round(Math.random() * yMax);

    clickMeElem.style.left = `${posX}px`;
    clickMeElem.style.top = `${posY}px`;
}

function stopGame() {
    clearInterval(secondsRemainingInterval);
    clickMeElem.style.display = 'none';
    resetBtnElem.setAttribute('disabled', '');
    startBtnElem.removeAttribute('disabled');
}

function showModal() {
    document.body.classList.add('show-modal');
}

function hideModal() {
    if (document.body.classList.contains('show-modal')) {
        document.body.classList.remove('show-modal');
    }
}

function reloadHistory() {
    let history = localStorage.getItem('history');
    if (history != null) {
        history = JSON.parse(history);

        let historyTableBody = '';

        for (let i = 0; i < history.length; i++) {
            historyTableBody += 
                `<tr>
                    <td>${i + 1}</td>
                    <td>${history[i].name}</td>
                    <td>${history[i].points}</td>
                </tr>`;
        }

        let historyHtml = 
            `<h1>Game Highscore</h1>
            <table>
                <thead>
                    <tr>
                        <th>POS</th>
                        <th>Name</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    ${historyTableBody}
                </tbody>
            </table>
            <button type="button" id="clear-game-history">Clear history</button>
            `;

        gameHistoryElem.innerHTML = historyHtml;

        // Event-Listener für Game History Löschen
        document.getElementById('clear-game-history').addEventListener('click', function() {
            localStorage.removeItem('history');
            gameHistoryElem.innerHTML = '';
        });
    }
}

clickMeElem.addEventListener('click', function() {
    const currentTimestamp = (new Date()).getTime();
    const diff = currentTimestamp - lastClickTimestamp;
    lastClickTimestamp = currentTimestamp;

    switch (true) {
        case (diff < 500):
            points += 3
            break;
        case (diff < 750):
            points += 2
            break;
        case (diff < 1000):
            points++;
            break;
        case (diff < 1500):
            break;
        default:
            points--;
    }
    
    randomPosition();
    counterElem.innerText = `Points: ${points}`;
});

startBtnElem.addEventListener('click', function() {
    points = 0;
    secondsRemaining = initSecondsRemaining;

    randomPosition();
    clickMeElem.style.display = 'block';

    counterElem.innerText = `Points: ${points}`;
    secondsRemainingElem.innerText = `Time: ${secondsRemaining}`;

    startBtnElem.setAttribute('disabled', '');
    resetBtnElem.removeAttribute('disabled');

    lastClickTimestamp = (new Date()).getTime();

    secondsRemainingInterval = setInterval(
        function() {
            secondsRemaining--;
            secondsRemainingElem.innerText = `Time: ${secondsRemaining}`;
            if (secondsRemaining <= 0) {
                stopGame();
                showModal();
            }
        },
        1000
    );
});

resetBtnElem.addEventListener('click', function() {
    stopGame();
    points = 0;
    counterElem.innerText =  `Points: ${points}`;
});

newHistoryEntryForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;

    let newHistoryEntry = {
        name: name,
        email: email,
        points: points
    };

    let history = localStorage.getItem('history');
    // Überprüfung ob noch kein Eintrag in der localStorage existiert
    if (history === null) {
        // wenn nein, dann lege ein neues Array an
        history = [];
    } else {
        // wenn ja, dann wandle den String vom localStorage in ein Array/Objekt um
        history = JSON.parse(history);
    }

    history.push(newHistoryEntry);

    history.sort(function(a, b) {
        return b.points - a.points;
    });

    // history in der localStorage speichern
    localStorage.setItem('history', JSON.stringify(history));

    // modal Window schließen
    hideModal();

    reloadHistory();
});

// History initial anzeigen
reloadHistory();