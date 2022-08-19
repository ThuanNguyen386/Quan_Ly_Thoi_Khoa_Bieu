
    const input = document.querySelector('.from-from__group-input');
    const preview = document.querySelector('.preview');
    const image = document.querySelector('.from-from__group-image img');
    console.log(preview.children[0].tagName)
    input.addEventListener('change', updateImageDisplay);
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function updateImageDisplay() {
        

        const curFiles = input.files;
            
        for(const file of curFiles) {
        
        console.log(file)
        if(validFileType(file)) {
            image.src=""
            preview.children[0].textContent = `File name ${file.name}.`;
            
            image.src = URL.createObjectURL(file);
            
        
        } else {
            preview.children[0].textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
            
        }

        }
        // }
    }

// https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
        'image/apng',
        'image/bmp',
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/svg+xml',
        'image/tiff',
        'image/webp',
        `image/x-icon`
    ];

    function validFileType(file) {
    return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
    if(number < 1024) {
        return number + 'bytes';
    } else if(number > 1024 && number < 1048576) {
        return (number/1024).toFixed(1) + 'KB';
    } else if(number > 1048576) {
        return (number/1048576).toFixed(1) + 'MB';
    }
    }
    $(document).ready(function(){
        
    $('input[type="file"]').on("change", function(e) {
        var target = e.target || e.srcElement;
        console.log(target,"changed");
        console.log(e);
        if ($(target).val().length == 0) {
            console.log("Suspect Cancel was hit, no files selected.");
            $("#browser-text").val("");
            $("#tmp").val("");
            $("#avatar").removeAttr('src');
            if (numFile == target.files.length) {
                cancelButton.click();
            }        
        } 
        else {
        console.log("File selected: ", target.value);
        numFile = target.files.length;
        var geekss = e.target.files[0].name;
        $("#browser-text").val(geekss);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#tmp").val(e.target.result);
                $("#avatar").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
    });
});

