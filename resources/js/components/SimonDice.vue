<template>

<section>
    <h1 class="game--title" id="titol">Simon says!</h1>
    <h2 class="game--level" id="level"></h2>
    <h3 class="game--fail" id="fallo">¡¡Game over!!</h3>
    <div class="game--container" id="div1">
        <div id="0" class="cell" onclick="cl(0)"></div>
        <div id="1" class="cell" onclick="cl(1)"></div>
        <div id="2" class="cell" onclick="cl(2)"></div>
        <div id="3" class="cell" onclick="cl(3)"></div>
        <div id="4" class="cell" onclick="cl(4)"></div>
        <div id="5" class="cell" onclick="cl(5)"></div>
        <div id="6" class="cell" onclick="cl(6)"></div>
        <div id="7" class="cell" onclick="cl(7)"></div>
    </div>
    <h2 class="game--status"></h2>
    <button class="btn game--start" id="emp" onclick="start()">Start game</button>
    <button class="game--restart" onclick="location.reload()">Restart Game</button>
</section>


</template>

<script src="../simondice.js"></script>


<style scoped>
    

    section {
        text-align: center;
    }

    .game--title {
        font-size: 100px;
        color: #d7a62f;
        margin: 10px auto;
    }

    .game--level {
        display: none;
        font-size: 50px;
        color: #007c4d;
        margin: 10px auto;
    }


    .game--container {
        display: none;
        grid-template-columns: repeat(2, auto);
        width: 205px;
        margin: 10px auto;
        background-color: #11213a;
        color: #04c0b2;
    }

    .game--fail {
        display: none;
        font-size: 50px;
        color: #c90000;
        margin: 10px auto;
    }

    [id='0'] {
        background-color: green;
        /*background-color: rgb(92, 175, 92);*/
    }

    [id='1'] {
        background-color: blue;
        /*background-color: rgb(94, 94, 255);*/
    }

    [id='2'] {
        background-color: red;
        /*background-color: rgb(247, 92, 92);*/
    }

    [id='3'] {
        background-color: yellow;
        /*background-color: rgb(255, 255, 152);*/
    }

    [id='4'] {
        display: none;
        background-color: orangered;
        /*background-color: rgb(255, 138, 95);*/
    }

    [id='5'] {
        display: none;
        background-color: fuchsia;
        /*background-color: rgb(255, 108, 255);*/
    }

    [id='6'] {
        display: none;
        background-color: indigo;
        /*background-color: rgb(101, 70, 122);*/
    }

    [id='7'] {
        display: none;
        background-color: lime;
        /*background-color: rgb(106, 255, 106);*/
    }

    .cell {
        font-family: "Permanent Marker", cursive;
        width: 100px;
        height: 100px;
        box-shadow: 2px 2px 2px 2px #ecd7ba;
        border: 2px solid #ecd7ba;
        cursor: pointer;
        line-height: 100px;
        font-size: 60px;
    }

    .game--start {
        background-color: #f7e4ac;
        width: 200px;
        height: 50px;
        font-size: 25px;
        color: #5586e2;
        box-shadow: 2px 2px 2px 2px #d86c23;
        border: 2px solid #d86c23;
    }

    .game--restart {
        display: none;
        background-color: #f7e4ac;
        width: 200px;
        height: 50px;
        font-size: 25px;
        color: #5586e2;
        box-shadow: 2px 2px 2px 2px #d86c23;
        border: 2px solid #d86c23;
    }

    /* .game--ranking {
        display: none;
        font-size: 50px;
        color: #fc8f00;
        margin: 10px auto;
    } */
</style>