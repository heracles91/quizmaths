var input = document.getElementById('photo');
var photo = document.getElementById('pfp');
input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
	var curFiles = input.files;
	if(curFiles.length > 0) {
		photo.src = window.URL.createObjectURL(curFiles[0]);
	}
}