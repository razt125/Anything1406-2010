// JavaScript Document
<!-- Hide from old browsers
adImages = Array("images/rotating banner/image1.jpg","images/rotating banner/image2.jpg","images/rotating banner/image3.jpg")
thisAd = 0
imageCount = adImages.length
function rotate() {
	console.log(document.getElementById("adBanner") + " " + thisAd);
	if (document.images) {
		thisAd++
		if (thisAd == imageCount) {
			thisAd = 0
		}
	}
	document.adBanner.src=adImages[thisAd]
}
setInterval("rotate()", 3 * 1000)
// End hide script from old browsers -->
//http://www.tutorialcode.com/javascript/rotating-banners
