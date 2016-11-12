function openGame1() {
    window.location.href = "game1.html";
}

function openGame2() {
    window.location.href = "game2.html";
}

function openGame3() {
    window.location.href = "game3.html"; 
}

function openGame4() {
    window.location.href = "game4.html";
}

// function openTest() {
//     window.location.href = "test.html";
// }

function showTip() {
    initTips();

    g_nTipStep = 0;
    var item = document.getElementById('divTip');
    if(item) {
        item.style.visibility = 'visible';
    } 

    item = document.getElementById('btnOk');
    if(item) {
        item.disabled = 'disabled';
        item.innerHTML = "开始测试";
    } 
  
    g_timerTip = setInterval("startTips()", 5000);  
    stopGame();
}

function closeTip() {
    clearInterval(g_timerTip);

    initTips();
    g_nTipStep = 0;

    var item = document.getElementById('divTip');
    if(item) {
        item.style.visibility = 'hidden';
    } 

    item = document.getElementById('btnOk');
    if(item) {
        item.removeAttribute('disabled');
    } 
}

// function openBeforeTip() {
//     if(g_nTipStep >0 ){
//         g_nTipStep--; 
//         startTips();   
//     }
// }

// function openNextTip() {
//     if(g_nTipStep >0 ){
//         g_nTipStep--; 
//         startTips();   
//     }
// }