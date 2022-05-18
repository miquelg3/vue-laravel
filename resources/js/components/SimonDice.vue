<template>
    <div>
        <button style="border-radius: 0% !important" type="button" class="btn btn-secondary" onclick="window.location.href='dashboard'">
            &#8249; Atrás
        </button>
    </div>

<section>
    <div>
        <h1 class="game--title" id="titol">Simon says!</h1>
        <h2 class="game--level" id="level"></h2>
        <h3 class="game--fail" id="fallo">Game over!!</h3>
        <div class="game--container" id="div1">
            <div id="0" class="cell" @click="cl(0)"></div>
            <div id="1" class="cell" @click="cl(1)"></div>
            <div id="2" class="cell" @click="cl(2)"></div>
            <div id="3" class="cell" @click="cl(3)"></div>
            <div id="4" class="cell" @click="cl(4)"></div>
            <div id="5" class="cell" @click="cl(5)"></div>
            <div id="6" class="cell" @click="cl(6)"></div>
            <div id="7" class="cell" @click="cl(7)"></div>
        </div>
        <!-- Template per a veure el ranking -->
        <template v-if="rank">
            <div class="row justify-content-center">
                <table class="table table-light" style="width: 50%">
                    <thead>
                        <th scope="col">ID Player</th>
                        <th scope="col">Record</th>
                        <th scope="col">Name</th>
                    </thead>
                    <tbody>
                        <tr v-for="record in records" :key="record.id">
                            <td scope="row">{{record.idjugador}}</td>
                            <td>{{record.record}}</td>
                            <td>{{record.idname}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
        <h2 class="game--status"></h2>
        <button class="btn game--start" id="emp" @click="start();">Start game</button>
        <button class="btn game--ranking" id="rank" @click="ranking();">Ranking</button>
        <button class="btn game--restart" id="res" onclick="location.reload()">Restart Game</button>
    </div>
</section>


</template>

<script>

    export default {
        name: "App",
        data: () => ({
            // Axios
            records: [],
            puntuacion: {joc: '', record: ''} ,
            // Variables per al joc
            juego: false,
            cpu: [],
            persona: [],
            touch: false,
            counttouch: 0,
            rand: 0,
            movs: 0,
            delay: 0,
            delay1: 0,
            rank: false
        }),
        mounted(){
            this.getRecords()
        },
        methods: {
            start() {
                document.getElementById('div1').style.display = "grid";
                document.getElementById('emp').style.display = "none";
                this.juego = true;
                this.touch = false;
                document.getElementById('level').style.display = "grid";
                document.getElementById('res').style.display = "inline";
                this.cpujoc();
            },

            colores(color) {
                if (color == 0) {
                    function changecolor1(){
                        document.getElementById('0').style.backgroundColor = "rgb(92, 175, 92)";
                    }
                    //this.Delay per a que mentre s'ensenyen els colors anteriors, este no s'ensenye al mateix temps
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('0').style.backgroundColor="green";
                    }
                    setTimeout(changecolor2,this.delay1);
                }
                if (color == 1) {
                    function changecolor1(){
                        document.getElementById('1').style.backgroundColor = "rgb(94, 94, 255)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('1').style.backgroundColor="blue";
                    }
                    setTimeout(changecolor2,this.delay1);
                }

                if (color == 2) {
                    function changecolor1(){
                        document.getElementById('2').style.backgroundColor = "rgb(247, 92, 92)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('2').style.backgroundColor="red";
                    }
                    setTimeout(changecolor2,this.delay1);
                }

                if (color == 3) {
                    function changecolor1(){
                        document.getElementById('3').style.backgroundColor = "rgb(255, 255, 152)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('3').style.backgroundColor="yellow";
                    }
                    setTimeout(changecolor2,this.delay1);
                }

                if (color == 4) {
                    function changecolor1(){
                        document.getElementById('4').style.backgroundColor = "rgb(255, 138, 95)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('4').style.backgroundColor="orangered";
                    }
                    setTimeout(changecolor2,this.delay1);
                }

                if (color == 5) {
                    function changecolor1(){
                        document.getElementById('5').style.backgroundColor = "rgb(255, 108, 255)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('5').style.backgroundColor="fuchsia";
                    }
                    setTimeout(changecolor2,this.delay1);
                }

                if (color == 6) {
                    function changecolor1(){
                        document.getElementById('6').style.backgroundColor = "rgb(101, 70, 122)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('6').style.backgroundColor="indigo";
                    }
                    setTimeout(changecolor2,this.delay1);
                }

                if (color == 7) {
                    function changecolor1(){
                        document.getElementById('7').style.backgroundColor = "rgb(106, 255, 106)";
                    }
                    setTimeout(changecolor1,this.delay);
                    if(this.movs<10){
                        this.delay1 = this.delay + 1000;
                    }else{
                        this.delay1 = this.delay + 500;
                    }
                    function changecolor2(){
                        document.getElementById('7').style.backgroundColor="lime";
                    }
                    setTimeout(changecolor2,this.delay1);
                }
            },
            doscolors1() {
                document.getElementById('4').style.display="block";
                document.getElementById('5').style.display="block";
            },
            doscolors2() {
                document.getElementById('6').style.display="block";
                document.getElementById('7').style.display="block";
            },
            cl(num) {
                if(this.touch == false) {
                    //Si està mostrant els colors, no es pot tocar res
                    window.alert("No puedes tocar nada");
                }else{
                    if (this.conttouch <= this.movs) {
                        if (num==this.cpu[this.conttouch]){
                            this.colores(num);
                            this.conttouch++;
                            if (this.conttouch == this.movs) {
                                this.persona.push(num);
                                setTimeout(this.touchfalse,1500);
                            }
                        }else{
                            // Game over
                            //Quan t'equivoques, que desaparega el quadrat i que només estiga el botó de restartgame
                            document.getElementById('div1').style.display = "none";
                            document.getElementById('fallo').style.display = "grid";
                            // Guardem la puntuació
                            this.puntuacion = {joc: "simondice", record: this.movs};
                            this.guardarRecord();
                        }
                    }
                }
            },
            //Creem les funcions de touch
            touchfalse(){
                this.touch = false;
                this.cpujoc();
            },
            touchtrue() {
                this.touch = true;
            },
            cpujoc() {
                if (this.touch == false) {
                    //Mostrar la ronda en la que estem
                    document.getElementById('level').innerHTML = "Ronda " + (this.movs+1);
                    //Si arribem a la ronda 15 o 20, la variable random també ens ha de mostrar en un rango de dos números més
                    if(this.movs<15){
                        this.rand = Math.floor(Math.random()*4);
                    }else if (this.movs>=15 && this.movs<20){
                        this.rand = Math.floor(Math.random()*6);
                    }else if (this.movs>=20){
                        this.rand = Math.floor(Math.random()*8);
                    }
                    //Cridem la funció per a que es mostren els nous colors
                    if(this.movs==15){
                        this.doscolors1();
                    }
                    if(this.movs==20){
                        this.doscolors2();
                    }
                    this.cpu.push(this.rand);
                    for(var n=0; n<=this.movs; n++) {
                        var numerocpu=this.cpu[n];
                        this.colores(numerocpu);
                        //Quan arribem a la ronda 10 que puge la velocitat
                        if(this.movs < 10){
                            this.delay = this.delay + 1000;
                        }else{
                            this.delay = this.delay + 500;
                        }
                    }
                    //Per a que no podam tocar res
                    setTimeout(this.touchtrue,this.delay);
                    this.delay = 0;
                    this.delay1 = 0;
                    this.conttouch = 0;
                    this.movs++;
                }
            },
            // Per a veure el ranking
            ranking() {
                if (this.rank == false){
                    this.rank = true;
                }else{
                    this.rank = false;
                }
            },
            // Mètode per a saber el rècord
            getRecords(){
                axios.get('listar_records').then(res=> {
                    this.records = res.data;
                    // Creem funció per a que l'array s'ordene de millor puntuació a pijor puntuació
                    this.records.sort(function (a,b){return b.record - a.record;})
                })
            },
            // Mètode per a guardar el rècord
            guardarRecord() {
                axios.post('guardar_record', this.puntuacion).then(res=>{
                    this.guardar = res.data;
                })
            }
        },
        computed: {
            
        }
    }

</script>


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

    .game--ranking {
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