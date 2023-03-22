<?php
/** @var yii\web\View $this */
?>
<div class="screen">
    <h1>Multiplication Table Training</h1>
    <a href="#" class="start" id="start">Start</a>
</div>

<div class="screen">
    <h1>Choose a time</h1>
    <ul class="time-list" id="time-list">
        <li>
            <button class="time-btn" data-time="30">
                30 sec
            </button>
        </li>
        <li>
            <button class="time-btn" data-time="60">
                1 min
            </button>
        </li>
        <li>
            <button class="time-btn" data-time="90">
                1.5 min
            </button>
        </li>
        <li>
            <button class="time-btn" data-time="120">
                2 min
            </button>
        </li>
    </ul>
</div>

<div class="screen last">
    <div class="inner">
        <h3>Time <span id="time">00:00</span></h3>
        <div class="board" id="board"></div>
    </div>
    <div id="errors" class="errors"></div>
</div>
