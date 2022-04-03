
var juego = false;
var cpu = new Array();
var persona = new Array();
var touch = false;
var conttouch = 0;
var num = 0;
var rand = 0;
var movs = 0;
var delay = 0;
var delay1 = 0;



//Quan fem click en start
function start() {
    var record = 0;
    document.getElementById('div1').style.display = "grid";
    document.getElementById('emp').style.display = "none";
    juego = true;
    touch = false;
    document.getElementById('level').style.display = "grid";
    cpujoc();
}

//Funció per a canviar de color una vegada tingam el número
function colores(color) {
    if (color == 0) {
        function changecolor1(){
            document.getElementById('0').style.backgroundColor = "rgb(92, 175, 92)";
        }
        //Delay per a que mentre s'ensenyen els colors anteriors, este no s'ensenye al mateix temps
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('0').style.backgroundColor="green";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 1) {
        function changecolor1(){
            document.getElementById('1').style.backgroundColor = "rgb(94, 94, 255)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('1').style.backgroundColor="blue";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 2) {
        function changecolor1(){
            document.getElementById('2').style.backgroundColor = "rgb(247, 92, 92)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('2').style.backgroundColor="red";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 3) {
        function changecolor1(){
            document.getElementById('3').style.backgroundColor = "rgb(255, 255, 152)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('3').style.backgroundColor="yellow";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 4) {
        function changecolor1(){
            document.getElementById('4').style.backgroundColor = "rgb(255, 138, 95)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('4').style.backgroundColor="orangered";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 5) {
        function changecolor1(){
            document.getElementById('5').style.backgroundColor = "rgb(255, 108, 255)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('5').style.backgroundColor="fuchsia";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 6) {
        function changecolor1(){
            document.getElementById('6').style.backgroundColor = "rgb(101, 70, 122)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('6').style.backgroundColor="indigo";
        }
        setTimeout(changecolor2,delay1);
    }

    if (color == 7) {
        function changecolor1(){
            document.getElementById('7').style.backgroundColor = "rgb(106, 255, 106)";
        }
        setTimeout(changecolor1,delay);
        if(movs<10){
            delay1 = delay + 1000;
        }else{
            delay1 = delay + 500;
        }
        function changecolor2(){
            document.getElementById('7').style.backgroundColor="lime";
        }
        setTimeout(changecolor2,delay1);
    }
}

//Funció que mostra els nous colors
function doscolors1(){
    document.getElementById('4').style.display="block";
    document.getElementById('5').style.display="block";
}

function doscolors2(){
    document.getElementById('6').style.display="block";
    document.getElementById('7').style.display="block";
}

function cl(num) {
    if(touch == false) {
        //Si està mostrant els colors, no es pot tocar res
        window.alert("No puedes tocar nada");
    }else{
        console.log(cpu + " (cpu)");
        console.log(num + " (num)");
        console.log(delay + " (delay)");
        if (conttouch <= movs) {
            if (num==cpu[conttouch]){
                colores(num);
                conttouch++;
                if (conttouch == movs) {
                    persona.push(num);
                    function touchfalse(){
                        touch = false;
                        cpujoc();
                    }
                    setTimeout(touchfalse,1500);
                }
            }else{
                //Quan t'equivoques, que desaparega el quadrat i que només estiga el botó de restartgame
                document.getElementById('div1').style.display = "none";
                document.getElementById('fallo').style.display = "grid";
            }
        }
        console.log(conttouch + " (conttouch)");
        console.log(movs + " (movs)");
        console.log(persona + " (persona)");
        console.log("");
    }
}

function cpujoc(){
    if (touch == false) {
        //Mostrar la ronda en la que estem
        document.getElementById('level').innerHTML = "Ronda " + (movs+1);
        //Si arribem a la ronda 15 o 20, la variable random també ens ha de mostrar en un rango de dos números més
        if(movs<15){
            rand = Math.floor(Math.random()*4);
        }else if (movs>=15 && movs<20){
            rand = Math.floor(Math.random()*6);
        }else if (movs>=20){
            rand = Math.floor(Math.random()*8);
        }
        //Cridem la funció per a que es mostren els nous colors
        if(movs==15){
            doscolors1();
        }
        if(movs==20){
            doscolors2();
        }
        cpu.push(rand);
        for(n=0;n<=movs;n++) {
            numerocpu=cpu[n];
            colores(numerocpu);
            //Quan arribem a la ronda 10 que puge la velocitat
            if(movs < 10){
                delay = delay + 1000;
            }else{
                delay = delay + 500;
            }
        }
        console.log(delay + " (delay)");
        function touchtrue() {
            console.log(touch);
            touch = true;
        }
        //Per a que no pugam tocar res
        setTimeout(touchtrue,delay);
        delay = 0;
        delay1 =0;
        conttouch = 0;
        movs++;
    }
}

