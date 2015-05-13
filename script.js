// JavaScript Document<script type="text/javascript">
adImages = Array("image1.png","image2.png","image3.png")
thisAd = 0
imgCt = adImages.length
function rotate() {
if (document.images) {
thisAd++
if (thisAd == imgCt) {
thisAd = 0
}
document.adBanner.src=adImages[thisAd]
setTimeout("rotate()", 3 * 1000)
}
}
