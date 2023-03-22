const startBtn = document.querySelector('#start');
const screens = document.querySelectorAll('.screen');
const timeBtn = document.querySelector('#time-list');
const timeEl = document.querySelector('#time');
const board = document.querySelector('#board');
const errorsScreen = document.querySelector('#errors');
let time = 0;
let score = 0;
let errors = 0;
let errorsArr = [];
let gameInterval;
const question = document.createElement('div');
question.classList.add('primary');
const answersSection = document.createElement('div');
answersSection.classList.add('answers-section');

startBtn.addEventListener('click', (event) => {
    event.preventDefault();
    screens[0].classList.add('up');
});

function playMore() {
    location.reload();
}


timeBtn.addEventListener('click', event => {
    if(event.target.classList.contains('time-btn')) {
        time = parseInt(event.target.getAttribute('data-time'));
        screens[1].classList.add('up');
        startGame();
    }
});


function startGame() {
    createMultiplication();
    gameInterval = setInterval(tick, 1000);
    setTime(time);
}

function tick() {
    if(time === 0){
        clearInterval(gameInterval);
        finishGame();
    }else{
        let current = --time;
        if(current < 10){
            current = `0${current}`;
        }
        setTime(current);
    }
}

function setTime(value) {
    timeEl.innerHTML = `00:${value}`;
}

function finishGame() {
    timeEl.parentElement.remove();
    console.log(errorsArr);
    board.innerHTML = `<h2>Correct: <span class="primary">${score}</span> / Errors: <span class="primary">${errors}</span></h2>`;
    if(errorsArr.length > 0) {
        errorsScreen.style.display = 'block';
        errorsScreen.innerHTML += '<h4> Errors </h4>';
        errorsScreen.innerHTML += '<div>';
        errorsArr.forEach((item) => {
            errorsScreen.innerHTML += `<p class="game-errors">${item[0]} * ${item[1]} = <s>${item[2]}</s> <b>${item[3]}</b></p>`;
        });
        errorsScreen.innerHTML += '</div>';
    }
    board.innerHTML += '<button class="btn-default" onclick="playMore()">One more time</button>';
}
function checkAnswer(multiplierOne, multiplierTwo, answerCorrect){
    if(event.target.dataset.correct == 1){
        score++;
        answersSection.innerHTML = '';
        createMultiplication();
    }else{
        errorsArr.push([multiplierOne, multiplierTwo, event.target.textContent, answerCorrect]);
        errors++;
        answersSection.innerHTML = '';
        createMultiplication();
    }
}
function createMultiplication() {

    const multiplierOne = getRandomNumber(1,9);
    const multiplierTwo = getRandomNumber(1,9);
    question.innerHTML = `<p style='font-size: 30px; font-weight: 800;'>${multiplierOne} * ${multiplierTwo}</p>`;
    const answerCorrect = multiplierOne * multiplierTwo;
    const answerCorrectDiv = document.createElement('div');
    answerCorrectDiv.innerText = `${answerCorrect}`;
    answerCorrectDiv.setAttribute('data-correct', '1');
    answerCorrectDiv.classList.add('answer');
    answerCorrectDiv.addEventListener('click', function (){
        checkAnswer(multiplierOne, multiplierTwo, answerCorrect);
    });
    const answerFalseOne = document.createElement('div');
    answerFalseOne.innerText = `${getRandomNumber(1, 81, answerCorrect)}`;
    answerFalseOne.setAttribute('data-correct', '0');
    answerFalseOne.classList.add('answer');
    answerFalseOne.addEventListener('click', function (){
        checkAnswer(multiplierOne, multiplierTwo, answerCorrect);
    });
    const answerFalseTwo = document.createElement('div');
    answerFalseTwo.innerText = `${getRandomNumber(1, 81, answerCorrect)}`;
    answerFalseTwo.setAttribute('data-correct', '0');
    answerFalseTwo.classList.add('answer');
    answerFalseTwo.addEventListener('click', function (){
        checkAnswer(multiplierOne, multiplierTwo, answerCorrect);
    });
    const answersArr = [answerCorrectDiv, answerFalseOne, answerFalseTwo];
    shuffle(answersArr);
    answersArr.forEach((answer) => {
        answersSection.append(answer);
    });
    board.append(question);
    board.append(answersSection);
}
function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function createRandomCircle() {
    const circle = document.createElement('div');
    const size = getRandomNumber(10, 60);
    const {width, height} = board.getBoundingClientRect();
    const x = getRandomNumber(0, width-size);
    const y = getRandomNumber(0, height-size);
    const color = getRandomColor();
    circle.classList.add('circle');
    circle.style.width = `${size}px`;
    circle.style.height = `${size}px`;
    circle.style.top = `${y}px`;
    circle.style.left = `${x}px`;
    circle.style.background = `${color}`;
    board.append(circle);
}

function getRandomColor(){
    const index = Math.floor(Math.random() * colors.length);
    return colors[index];
}

function getRandomNumber(min, max, exclude = null) {
    let number = Math.round(Math.random() * (max-min) + min);
    if(exclude != number) {
        return number;
    }
    return number + 1;
}