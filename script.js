<script type="text/javascript">
adImages = Array("TCMC Images Docs/events/ACVCnewlogo.gif","TCMC Images Docs/events/Allegro600.png","TCMC Images Docs/events/Allegro600BB.png")
thisAd = 0
imgCt = adImages.length
function rotate() {
if (document.images) {
thisAd++
if (thisAd == imgCt) {
thisAd = 0
}
document.adBanner.src=adImages[thisAd]
setTimeout("rotate()", 1 * 1000)
}
}
</script>
