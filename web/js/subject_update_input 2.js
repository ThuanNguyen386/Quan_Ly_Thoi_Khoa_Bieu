$(document).ready(function() {
    $('#school_year').multiselect({
        columns: 1,
        placeholder: ''
    });

    // $('input[type="file"]').change(function(e) {
    //     var geekss = e.target.files[0].name;
    //     $('#browser-text').val(geekss);
        // $('#tmp').val(URL.createObjectURL(e.target.files[0]));
    // });

    // $('body').onchange(function() {
    //     var img = new Image();
    //     img.src = localStorage.theImage;
    //     $('#avatar').attr('src', img.src);
    // });

    // $('input[type="file"]').change(function(e) {
    //     if (this.files && this.files[0]) {
    //         if(this.files.length>0) {
    //             var reader = new FileReader();
    //             reader.onload = function (e) {
    //                 // var img = new Image();
    //                 // img.src = reader.result;
    //                 // localStorage.theImage = reader.result;
    //                 $('#tmp').val(e.target.result);
    //                 $('#avatar').attr('src', e.target.result);
    //             }
    //             reader.readAsDataURL(this.files[0]);
    //         }
    //     }
    // });

    var numFile = 0;
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

    $('.myPopup').addClass('show').click(function() {
        $('.show').hide();
    });
});
