
//funkcia pre generovanie qr codu
function generateQrCode(projektId) {
    console.log(QRCode);
    //nastavovanie linkou

    let localDomen = "http://192.168.1.10/spetna-vezba/www";
    let hostingDomen = "http://oliver-chalupka.sk/spetna-vezba/";
    
    let url = localDomen + "/feetback/feetback?projektId=" + projektId;
    
    document.getElementById("url-text").innerHTML += url;
    //vygenerovanie qrCodu
    let qrCodeCanvas = document.getElementById("qrCode-canvas");
    QRCode.toCanvas(qrCodeCanvas, url, {
        type: "svg",
        width: 600
    },function(error){
        if(error) console.log(error);
        document.querySelector("#download-button").href = qrCodeCanvas.toDataURL("image/png");

    });
    //pridanie štýlov na výšku a šírku, gôli prebiťiu width qrcode pôvodné nastavené štýli
    qrCodeCanvas.style.width = "60vh";
    qrCodeCanvas.style.height = "60vh";
}