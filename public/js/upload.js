function formatBytes(a,b){if(0==a)return"0 Bytes";var c=1024,d=b||2,e=["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"],f=Math.floor(Math.log(a)/Math.log(c));return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]}

var filelist = new Array();
var filesize = new Array();

updateList = function () {
    $('#zipList').empty();
    $('#msg').empty();
    var input = document.getElementById('fileUploader');
    var output = document.getElementById('zipList');


    var HTML = "";
    for (var i = 0; i < input.files.length; ++i) {
       filelist[i]=input.files.item(i).name;
       filesize[i]=formatBytes(input.files.item(i).size);
       HTML += "<div id = \"item\"><div id=\"del\" class=\"bin\" onclick=\"$(this).closest('#item').remove();\"></div><div class=\"progress\" style=\"margin-left:24px\"><div>" + filelist[i] + "<span class=\"fileSize\"> " + filesize[i] + "</span></div></div></div>";
    }
    output.innerHTML += HTML;
}

$(document).on("dragover drop", function(e) {
    e.preventDefault();  // allow dropping and don't navigate to file on drop
}).on("drop", function(e) {
    $("input[type='file']")
        .prop("files", e.originalEvent.dataTransfer.files)  // put files into element
        .closest("form")
});